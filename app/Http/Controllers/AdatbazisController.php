<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoria; // Behívjuk a Kategoria modellt
use App\Models\Etel;      // Behívjuk az Etel modellt

class AdatbazisController extends Controller
{
    /**
     * 1. szint: Minden kategória listázása
     */
    public function index()
    {
        // Az ORM segítségével lekérjük az összes kategóriát
        $kategoriak = Kategoria::orderBy('nev')->get();

        // Átadjuk az adatokat egy új nézetnek (view)
        return view('adatbazis.index', ['kategoriak' => $kategoriak]);
    }

    /**
     * 2. szint: Egy kategória ételeinek listázása
     * A {kategoria} a Laravel "Route Model Binding"-ját használja,
     * automatikusan megkeresi az ID alapján a Kategoria modellt.
     */
    public function showKategoria(Kategoria $kategoria)
    {
        // Az ORM kapcsolat segítségével (amit az Etel modellben beállítottunk)
        // lekérjük az adott kategóriához tartozó ételeket.
        $etels = $kategoria->etels()->orderBy('nev')->get();

        return view('adatbazis.kategoria', [
            'kategoria' => $kategoria,
            'etels' => $etels
        ]);
    }

    /**
     * 3. szint: Egy étel hozzávalóinak listázása
     */
    public function showEtel(Etel $etel)
    {
        // Az ORM kapcsolat (etel->hozzavalok) segítségével
        // lekérjük a hozzávalókat a 'hasznalt' kapcsolótáblán keresztül.
        $hozzavalok = $etel->hozzavalok;

        return view('adatbazis.etel', [
            'etel' => $etel,
            'hozzavalok' => $hozzavalok
        ]);
    }
}