<?php

namespace App\Http\Controllers;

use App\Models\Hozzavalo; // Hozzavalo Model importálása
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; // Átirányításhoz

class HozzavaloController extends Controller
{
    /**
     * Display a listing of the resource. (CRUD: READ - Listázás)
     */
    public function index()
    {
        // Az összes hozzávaló lekérése név szerint rendezve
        $hozzavalok = Hozzavalo::orderBy('nev')->get();

        // A hozzavalo.index view visszatérése az adatokkal
        return view('hozzavalo.index', compact('hozzavalok'));
    }

    /**
     * Show the form for creating a new resource. (CRUD: CREATE - Űrlap mutatása)
     */
    public function create()
    {
        // A hozzavalo.create űrlap visszatérése
        return view('hozzavalo.create');
    }

    /**
     * Store a newly created resource in storage. (CRUD: CREATE - Mentés)
     */
    public function store(Request $request)
    {
        // Validáció: A 'nev' mező kötelező, string, maximum 255 karakter, és egyedi a hozzavalos táblában
        $request->validate([
            'nev' => 'required|string|max:255|unique:hozzavalos',
        ], [
            'nev.required' => 'A hozzávaló neve mező kitöltése kötelező.',
            'nev.unique' => 'Ilyen nevű hozzávaló már létezik.',
        ]);

        // Új hozzávaló létrehozása
        Hozzavalo::create($request->all());

        // Sikeres mentés után átirányítás a listázó oldalra sikerüzenettel
        return Redirect::route('hozzavalo.index')->with('success', 'Hozzávaló sikeresen hozzáadva!');
    }

    /**
     * Display the specified resource. (CRUD: READ - Részletes nézet) - Nem szükséges megvalósítani
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource. (CRUD: UPDATE - Szerkesztő űrlap mutatása)
     * Route Model Binding (Hozzavalo $hozzavalo) automatikusan megkeresi az ID alapján.
     */
    public function edit(Hozzavalo $hozzavalo)
    {
        // A hozzavalo.edit űrlap visszatérése a szerkesztendő Model-lel
        return view('hozzavalo.edit', compact('hozzavalo'));
    }

    /**
     * Update the specified resource in storage. (CRUD: UPDATE - Frissítés)
     */
    public function update(Request $request, Hozzavalo $hozzavalo)
    {
        // Validáció: 'nev' mező kötelező, és egyedi (kivéve az aktuális rekordot)
        $request->validate([
            'nev' => 'required|string|max:255|unique:hozzavalos,nev,'.$hozzavalo->id,
        ], [
            'nev.required' => 'A hozzávaló neve mező kitöltése kötelező.',
            'nev.unique' => 'Ilyen nevű hozzávaló már létezik.',
        ]);

        // Hozzávaló frissítése
        $hozzavalo->update($request->all());

        // Sikeres frissítés után átirányítás a listázó oldalra
        return Redirect::route('hozzavalo.index')->with('success', 'Hozzávaló sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage. (CRUD: DELETE - Törlés)
     */
    public function destroy(Hozzavalo $hozzavalo)
    {
        // Törlés végrehajtása
        $hozzavalo->delete();

        // Átirányítás sikerüzenettel
        return Redirect::route('hozzavalo.index')->with('success', 'Hozzávaló sikeresen törölve!');
    }
}