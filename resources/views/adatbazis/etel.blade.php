<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('adatbazis.kategoria', $etel->kategoria) }}" class="logo"><strong>{{ $etel->kategoria->nev }}</strong> - {{ $etel->nev }}</a>
    </x-slot>

    <section>
        <header class="major">
            <h2>Hozzávalók a(z) {{ $etel->nev }} elkészítéséhez</h2>
        </header>
        
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Hozzávaló</th>
                        <th>Mennyiség</th>
                        <th>Egység</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hozzavalok as $hozzavalo)
                        <tr>
                            <td>{{ $hozzavalo->nev }}</td>
                            <td>{{ $hozzavalo->pivot->mennyiseg ?? '-' }}</td>
                            <td>{{ $hozzavalo->pivot->egyseg ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nincsenek hozzávalók megadva ehhez az ételhez.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</x-app-layout>