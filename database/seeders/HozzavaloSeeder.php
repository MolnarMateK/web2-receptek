<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hozzavalo;

class HozzavaloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // E/1. Javítás: A DatabaseSeeder végzi a truncate()-et, ezért itt nem kell.
        // Hozzavalo::truncate(); 

        // E/1. Javítás: Robusztus fájlkezelés file() és storage_path() használatával
        $rows = file(storage_path('app/seed_data/hozzavalo.txt'), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        if (empty($rows)) {
            return;
        }

        // Átugorjuk a fejléc sort: "id;nev"
        array_shift($rows); 

        foreach ($rows as $row) {
            
            $trimmedRow = trim($row);

            if (!empty($trimmedRow)) {
                
                $data = explode(';', $trimmedRow); 

                if (count($data) >= 2) { 
                    Hozzavalo::create([
                        'id' => (int)trim($data[0]), 
                        'nev' => trim($data[1])
                    ]);
                }
            }
        }
    }
}