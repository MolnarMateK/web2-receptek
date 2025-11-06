<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('adatbazis.index') }}" class="logo"><strong>Adatbázis</strong> - Kategóriák</a>
    </x-slot>

    <div class="posts">
        <p>Itt látod az összes receptkategóriát. Kattints egyre a benne lévő ételek megtekintéséhez.</p>
        
        @forelse ($kategoriak as $kategoria)
            <article>
                <a href="{{ route('adatbazis.kategoria', $kategoria) }}" class="image">
                    <img src="{{ asset('images/pic01.jpg') }}" alt="{{ $kategoria->nev }}" />
                </a>
                <h3>{{ $kategoria->nev }}</h3>
                <p>Kattints a kategóriában lévő ételek listázásához.</p>
                <ul class="actions">
                    <li><a href="{{ route('adatbazis.kategoria', $kategoria) }}" class="button">Ételek mutatása</a></li>
                </ul>
            </article>
        @empty
            <p>Nincsenek kategóriák az adatbázisban.</p>
        @endforelse
    </div>

</x-app-layout>