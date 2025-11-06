<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('hozzavalo.index') }}" class="logo"><strong>CRUD Menü</strong> - Hozzávalók</a>
    </x-slot>

    <section>
        <header class="major">
            <h2>Hozzávalók Kezelése</h2>
        </header>
        
        @if (session('success'))
            <div class="box success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12 text-right">
                <ul class="actions">
                    <li><a href="{{ route('hozzavalo.create') }}" class="button primary">Új Hozzávaló Felvitele</a></li>
                </ul>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Név</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hozzavalok as $hozzavalo)
                        <tr>
                            <td>{{ $hozzavalo->id }}</td>
                            <td>{{ $hozzavalo->nev }}</td>
                            <td class="actions-cell">
                                <ul class="actions small">
                                    {{-- Szerkesztés gomb --}}
                                    <li>
                                        <a href="{{ route('hozzavalo.edit', $hozzavalo) }}" class="button small">Szerkesztés</a>
                                    </li>
                                    {{-- Törlés gomb (form használata a POST/DELETE miatt) --}}
                                    <li>
                                        <form action="{{ route('hozzavalo.destroy', $hozzavalo) }}" method="POST" onsubmit="return confirm('Biztosan törölni szeretnéd a(z) {{ $hozzavalo->nev }} nevű hozzávalót?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button small">Törlés</button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nincsenek hozzávalók az adatbázisban.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</x-app-layout>