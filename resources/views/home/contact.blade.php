<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script type="module"
        src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>

    <!-- Vite voor CSS-bundeling -->
    @vite('resources/css/app.css')
</head>

<body class="font-[Poppins]">
    @include('home.header')

    <!-- Contactsectie -->
    <section class="bg-white">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <!-- Titel en inleidende tekst -->
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">Contact Ons</h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 sm:text-xl">Heeft u vragen
                of opmerkingen, wilt u een afspraak maken of wilt u meer weten over onze producten? Neem dan
                contact met ons op via onderstaand formulier
            </p>

            <!-- Toon succesbericht als session('message') bestaat -->
            @if(session('message'))
            <div id="alert-3"
                class="flex items-center mt-5 p-4 mb-4 text-green-800 rounded-lg bg-green-50"
                role="alert">
                <!-- Succesicoon en bericht -->
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session('message') }}
                </div>
                <!-- Sluitknop -->
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#alert-3" aria-label="Sluiten">
                    <span class="sr-only">Sluiten</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif

            <!-- Contactformulier -->
            <form action="{{ url('/contact') }}" class="space-y-8" method="post">
                @csrf
                <!-- E-mail invoer -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                        placeholder="naam@gmail.com" required>
                </div>

                <!-- Onderwerp selectie -->
                <div>
                    <label for="onderwerp" class="block mb-2 text-sm font-medium text-gray-900">Onderwerp</label>
                    <select name="onderwerp" id="onderwerp"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option disabled selected>Kies een onderwerp uit</option>
                        <option value="v&b">Verzending & Bezorging</option>
                        <option value="retourneren">Retourneren</option>
                        <option value="bestellingen">Bestellingen</option>
                        <option value="productinfo">Productinformatie</option>
                    </select>
                </div>

                <!-- Bericht tekstvak -->
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Bericht</label>
                    <textarea name="bericht" id="message" rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Laat hier uw bericht achter..."></textarea>
                </div>

                <!-- Verzendknop -->
                <button type="submit" name="submit"
                    class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-indigo-500 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300">Verzend
                    bericht</button>
            </form>
        </div>
    </section>

    <!-- Inclusie van de footer vanuit home.footer -->
    @include('home.footer')
</body>

</html>
