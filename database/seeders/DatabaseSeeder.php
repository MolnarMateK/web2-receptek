<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Facades\DB; // DB facade hozzáadása az SQL parancshoz
use App\Models\Kategoria; // Szükséges a Model::truncate()-hez
use App\Models\Etel;       // Szükséges a Model::truncate()-hez
use App\Models\Hozzavalo;  // Szükséges a Model::truncate()-hez
use App\Models\Hasznalt;   // Szükséges a Model::truncate()-hez

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // E/1. Törlés és Előkészítés: Itt töröljük az adatokat, egy helyen,
        //      így garantáljuk, hogy ez a kulcsellenőrzések kikapcsolása KÖZÖTT történik.
        
        // 1. Erősített MySQL Kulcs Ellenőrzés Kikapcsolása (A CRASH JAVÍTÁSA!)
        // Ez a parancs MySQL szinten is biztosítja, hogy a TRUNCATE lefut.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2. Táblák Törlése (fontos a sorrend: gyermek táblától a szülő felé)
        Hasznalt::truncate(); // 1. Kapcsolótábla
        Etel::truncate();     // 2. Etel (hivatkozik Kategóriára)
        Hozzavalo::truncate(); // 3. Hozzavalo
        Kategoria::truncate(); // 4. Kategoria (amire mindenki hivatkozik)

        // 3. MySQL Kulcs Ellenőrzés Visszakapcsolása
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        // E/1. Seederek Futtatása (A táblák betöltése)

        // 4. Szülő táblák betöltése
        $this->call([
            KategoriaSeeder::class, 
            HozzavaloSeeder::class, 
        ]);

        // 5. Gyermek táblák betöltése
        $this->call([
            EtelSeeder::class, 
        ]);
        
        // 6. Kapcsolótábla betöltése
        $this->call([
            HasznaltSeeder::class,
        ]);
    }
}