<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('diagram.index') }}" class="logo"><strong>Diagram Menü</strong> - Adatbázis Séma</a>
    </x-slot>

    <section>
        <header class="major">
            <h2>Recept Adatbázis Séma (Fizikai Tervezés)</h2>
        </header>
        
        <p>Ez a kép bemutatja a három fő tábla (Etel, Hozzavalo, Kategoria) és a Hasznalt összekötő tábla közötti kapcsolatokat.</p>
        
        {{-- E/1. A diagram kép beillesztése a public/images mappából --}}
        <span class="image fit">
            <img src="{{ asset('images/adatbazis_sema.png') }}" alt="Az adatbázis fizikai sémája" />
        </span>
        
    </section>

</x-app-layout>