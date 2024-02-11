<!-- Footersectie -->
<footer class="bg-indigo-500 shadow mt-8 ">
    <div class="w-full p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-slate-100 sm:text-center ">© 2023 <a href="{{ url('/') }}" class="hover:underline">Sneaks™</a>. Alle Rechten Voorbehouden.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-slate-100  sm:mt-0">
            <li>
                <a href="{{url('/over_ons')}}" class="mr-4 hover:underline md:mr-6 ">Over ons</a>
            </li>
            <li>
                <a href="{{url('/voorwaarden')}}" class="mr-4 hover:underline md:mr-6">Algemene voorwaarden</a>
            </li>
            <li>
                <a href="{{url('/privacy')}}" class="mr-4 hover:underline md:mr-6">Privacy Beleid</a>
            </li>

        </ul>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>

<script>
    // Selecteer de navigatielinks en het icoon
    const navLinks = document.querySelector('.nav-links');
    const icon = document.querySelector('ion-icon');

    // Functie voor het schakelen van het menu
    function onToggleMenu() {
    // Wissel de 'hidden'-klasse om het menu te tonen/verbergen
    const isMenuOpen = navLinks.classList.toggle('hidden');
    // Pas het icoon aan op basis van de menustatus
    icon.name = isMenuOpen ? 'menu-outline' : 'close-outline';
    }
</script>