<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Receptgyűjtemény</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        
    </head>
    
    <body>

        <div id="wrapper">

            <div id="main">
                <div class="inner">

                    @isset($header)
                        <header id="header">
                            {{ $header }}
                        </header>
                    @endisset

                    <main>
                        {{ $slot }}
                    </main>

                </div>
            </div>

            <div id="sidebar">
                <div class="inner">

                    <nav id="menu">
                        <header class="major">
                            <h2>Menü</h2>
                        </header>
                        <ul>
                            {{-- JAVÍTVA: Hozzáadva a class="button small" --}}
                            <li><a href="{{ route('dashboard') }}" class="button small">Főoldal (Dashboard)</a></li>

                            {{-- JAVÍTVA: Hozzáadva a class="button small" --}}
                            <li><a href="{{ route('adatbazis.index') }}" class="button small">Adatbázis Menü</a></li>
                            
                            {{-- DIAGRAM: Hozzáadva a class="button small" --}}
                            <li><a href="{{ route('diagram.index') }}" class="button small" data-instant-nav="true">Diagram Menü</a></li>
                            
                            <li><a href="{{ route('hozzavalo.index') }}" class="button small" data-instant-nav="true">CRUD Menü (Hozzávalók)</a></li>
                            
                            <li><a href="#">Kapcsolat</a></li>
                        </ul>
                    </nav>

                    <section>
                        <header class="major">
                            <h2>Fiók</h2>
                        </header>
                        <div class="mini-posts">
                            @auth
                                <article>
                                    <p>Bejelentkezve: <strong>{{ Auth::user()->name }}</strong></p>
                                    <ul class="actions stacked">
                                        <li><a href="{{ route('profile.edit') }}" class="button">Profil szerkesztése</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="button">Kijelentkezés</button>
                                            </form>
                                        </li>
                                    </ul>
                                </article>
                            @else
                                <article>
                                    <p>Ön látogató. Lépjen be vagy regisztráljon.</p>
                                    <ul class="actions">
                                        <li><a href="{{ route('login') }}" class="button">Bejelentkezés</a></li>
                                        <li><a href="{{ route('register') }}" class="button">Regisztráció</a></li>
                                    </ul>
                                </article>
                            @endauth
                        </div>
                    </section>

                    <footer id="footer">
                        <p class="copyright">&copy; Web2 Beadandó - Molnár Máté.<br>Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                    </footer>

                </div>
            </div>

        </div>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/browser.min.js') }}"></script>
        <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/util.js') }}"></script>
        
        <script src="{{ asset('assets/js/main.js?v=3') }}"></script>
        
        {{-- @vite(['resources/js/app.js']) --}}

    </body>
</html>