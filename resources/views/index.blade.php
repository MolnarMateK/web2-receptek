<x-app-layout>
    <x-slot name="header">
        [cite_start]<a href="{{ route('dashboard') }}" class="logo"><strong>Szakács Tamás</strong> Receptgyűjteménye</a> [cite: 2]
    </x-slot>

    <section id="banner">
        <div class="content">
            <header>
                [cite_start]<h1>Üdvözlünk a Receptgyűjteményben! [cite: 2]</h1>
                [cite_start]<p>Szakács Tamás több száz receptet tartalmazó adatbázisa. [cite: 2, 3]</p>
            </header>
            [cite_start]<p>Ez a weboldal a "Web-programozás II" beadandó feladat részeként készült. [cite: 5] [cite_start]A cél egy Laravel alapú szerver oldali web-alkalmazás létrehozása, [cite: 12] [cite_start]amely egy választott adatbázis adatait kezeli és jeleníti meg. [cite: 13, 24]</p>
            <ul class="actions">
                <li><a href="#" class="button big">Tovább az Adatbázishoz</a></li>
            </ul>
        </div>
        <span class="image object">
            <img src="{{ asset('images/pic10.jpg') }}" alt="Recept kép" />
        </span>
    </section>

    <section>
        <header class="major">
            <h2>A projekt főbb részei</h2>
        </header>
        <div class="features">
            <article>
                <span class="icon solid fa-database"></span>
                <div class="content">
                    <h3>Adatbázis és ORM</h3>
                    [cite_start]<p>A receptek, hozzávalók és kategóriák 4 táblában vannak tárolva, [cite: 3] [cite_start]a kapcsolatokat Eloquent ORM-mel kezeljük. [cite: 25]</p>
                </div>
            </article>
            <article>
                <span class="icon solid fa-id-card"></span>
                <div class="content">
                    <h3>Autentikáció</h3>
                    [cite_start]<p>Az oldal "látogató", "regisztrált látogató" és "admin" szerepköröket kezel a Breeze segítségével. [cite: 20]</p>
                </div>
            </article>
            <article>
                <span class="icon solid fa-pen-to-square"></span>
                <div class="content">
                    <h3>CRUD Funkciók</h3>
                    [cite_start]<p>Egy menüpont alatt megvalósítunk egy teljes CRUD (Create, Read, Update, Delete) funkcionalitást az egyik táblához. [cite: 37]</p>
                </div>
            </article>
            <article>
                <span class="icon solid fa-chart-bar"></span>
                <div class="content">
                    <h3>Diagram</h3>
                    [cite_start]<p>A Chart.js segítségével [cite: 36] [cite_start]egy oldalon diagramot készítünk az adatbázisban tárolt adatok alapján. [cite: 35]</p>
                </div>
            </article>
        </div>
    </section>

</x-app-layout>