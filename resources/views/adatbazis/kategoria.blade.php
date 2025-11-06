<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('adatbazis.index') }}" class="logo"><strong>Adatbázis</strong> - {{ $kategoria->nev }}</a>
    </x-slot>

    <section>
        <header class="major">
            <h2>Ételek ebben a kategóriában: {{ $kategoria->nev }}</h2>
        </header>
        <div class="posts">
            @forelse ($etels as $etel)
                <article>
                    <a href="{{ route('adatbazis.etel', $etel) }}" class="image">
                        <img src="{{ asset('images/pic02.jpg') }}" alt="{{ $etel->nev }}" />
                    </a>
                    <h3>{{ $etel->nev }}</h3>
                    <p>Feltöltve: {{ $etel->felirdatum }}<br>
                       Első elkészítés: {{ $etel->elsodatum ?? 'Még nem készült el' }}
                    </p>
                    <ul class="actions">
                        <li><a href="{{ route('adatbazis.etel', $etel) }}" class="button">Recept mutatása</a></li>
                    </ul>
                </article>
            @empty
                <p>Nincsenek ételek ebben a kategóriában.</p>
            @endforelse
        </div>
    </section>

</x-app-layout>