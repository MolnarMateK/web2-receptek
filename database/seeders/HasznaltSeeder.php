<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hasznalt; 

class HasznaltSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // E/1. Javítás: A DatabaseSeeder végzi a truncate()-et, ezért itt nem kell.
        // Hasznalt::truncate();

        // E/1. Javítás: Robusztus fájlkezelés file() és storage_path() használatával
        $rows = file(storage_path('app/seed_data/hasznalt.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        if (empty($rows)) {
            return;
        }

        // Átugorjuk a fejléc sort: "mennyiseg;egyseg;etelid;hozzavaloid"
        array_shift($rows); 
        
        foreach ($rows as $row) {
            
            $trimmedRow = trim($row);

            if (!empty($trimmedRow)) {

                $data = explode(';', $trimmedRow);

                // Legalább 4 adat kell (mennyiseg, egyseg, etelid, hozzavaloid)
                if (count($data) >= 4) {
                    
                    // A mennyiség és egység lehet üres (null)
                    $mennyiseg = !empty(trim($data[0])) ? trim($data[0]) : null;
                    $egyseg = !empty(trim($data[1])) ? trim($data[1]) : null;

                    Hasznalt::create([
                        'mennyiseg' => $mennyiseg,
                        'egyseg' => $egyseg,
                        'etelid' => (int)trim($data[2]),
                        'hozzavaloid' => (int)trim($data[3])
                    ]);
                }
            }
        }
    }
}