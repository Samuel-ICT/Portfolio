<!-- Headersectie  -->
<header class="bg-white relative">
    <!-- Navigatiebalk -->
    <nav class="flex justify-between items-center w-[92%] mx-auto mt-2">
        <!-- Logo met link naar de startpagina -->
        <div>
            <a href="{{ url('/') }}"><img class="w-36" src="images/sneaks-logo.png" alt=""></a>
        </div>

        <!-- Navigatielinks met een verborgen mobiel menu -->
        <div class="nav-links duration-500 absolute md:min-h-fit min-h-[40vh] left-0 top-full md:w-auto w-full flex items-center px-5 bg-gray-800 text-white py-4 z-10">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="hover:text-indigo-600" href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a class="hover:text-indigo-600" href="{{ url('/heren') }}">Heren</a>
                </li>
                <li>
                    <a class="hover:text-indigo-600" href="{{ url('/dames') }}">Dames</a>
                </li>
                <li>
                    <a class="hover:text-indigo-600" href="{{ url('/kids') }}">Kids</a>
                </li>
                <li>
                    <a class="hover:text-indigo-600" href="{{ url('/contact') }}">Contact</a>
                </li>
            </ul>
        </div>

        <div class="flex items-center gap-6">
            <!-- Controleer of de gebruiker is ingelogd -->
            @if (Route::has('login'))
                @auth
                    <!-- Winkelwagenpictogram en gebruikersmenu voor ingelogde gebruikers -->
                    <a href="{{ url('kart_overzicht') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                    <x-app-layout></x-app-layout>
                    <!-- Hamburgerpictogram voor mobiele weergave -->
                    <ion-icon onclick="onToggleMenu()" name="menu-outline" class="text-3xl cursor-pointer md:hidden"></ion-icon>
                @else
                    <!-- Winkelwagenpictogram en aanmeldings-/registratieknoppen voor niet-ingelogde gebruikers -->
                    <a href="{{ url('kart_overzicht') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="{{ route('login') }}"><button class="bg-indigo-600 text-white px-5 py-2 rounded-full">Aanmelden</button></a>
                    <a href="{{ route('register') }}"><button>Registreren</button></a>
                    <!-- Hamburgerpictogram voor mobiele weergave -->
                    <ion-icon onclick="onToggleMenu()" name="menu-outline" class="text-3xl cursor-pointer md:hidden"></ion-icon>
                @endauth
            @endif
        </div>
    </nav>
</header>

<!-- CSS voor navigatielinks op breder scherm -->
<style>
    @media (min-width: 768px) {
        .nav-links {
            position: static;
            background-color: white;
            color: black;
            display: flex;
        }
    }
</style>
