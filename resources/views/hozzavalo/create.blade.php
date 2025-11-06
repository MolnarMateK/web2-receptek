<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('hozzavalo.index') }}" class="logo"><strong>CRUD Menü</strong> - Új Hozzávaló</a>
    </x-slot>

    <section>
        <header class="major">
            <h2>Új Hozzávaló Hozzáadása</h2>
        </header>

        <ul class="actions">
            <li><a href="{{ route('hozzavalo.index') }}" class="button">Vissza a listához</a></li>
        </ul>

        <form method="POST" action="{{ route('hozzavalo.store') }}">
            @csrf

            <div class="row gtr-uniform">
                <div class="col-12">
                    <label for="nev">Hozzávaló neve</label>
                    <input type="text" name="nev" id="nev" value="{{ old('nev') }}" placeholder="Pl.: Liszt, Tojás" required />
                    @error('nev')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Hozzávaló mentése" class="primary" /></li>
                        <li><input type="reset" value="Mezők törlése" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </section>

</x-app-layout>