<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etel;

class EtelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // E/1. Javítás: A DatabaseSeeder végzi a truncate()-et, ezért itt nem kell.
        // Etel::truncate();

        // Fájl beolvasása robusztus módon
        $filePath = storage_path('app/seed_data/etel.txt');
        $rows = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        if (empty($rows)) {
            return;
        }
        
        // Fejléc sor ("nev;id;kategoriaid...") átugrása
        array_shift($rows); 

        // Adatok feldolgozása
        foreach ($rows as $row) {
            
            $trimmedRow = trim($row);

            if (!empty($trimmedRow)) {
                
                $data = explode(';', $trimmedRow);
                
                // Biztosítjuk, hogy legalább 4 oszlop adat van
                if (count($data) >= 4) {
                    
                    $id = (int)trim($data[1]);
                    $kategoriaid = (int)trim($data[2]);

                    // Csak akkor hozzuk létre, ha van érvényes ID és Kategória ID
                    if ($id > 0 && $kategoriaid > 0) {
                        
                        // Az 'elsodatum' (5. oszlop) opcionális
                        $elsodatum = isset($data[4]) && !empty(trim($data[4])) ? trim($data[4]) : null;

                        Etel::create([
                            'id' => $id, 
                            'nev' => trim($data[0]),
                            'kategoriaid' => $kategoriaid,
                            'felirdatum' => trim($data[3]),
                            'elsodatum' => $elsodatum
                        ]);
                    }
                }
            }
        }
    }
}