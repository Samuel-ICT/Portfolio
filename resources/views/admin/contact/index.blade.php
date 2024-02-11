<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>

<body class="bg-black">
    @include('admin.header')

    <section>
        <!-- Gedeelte voor het weergeven van de titel en eventuele meldingen -->
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold uppercase ml-64 py-20 text-white">Contact</h1>
        </div>

        <!-- Controle op de aanwezigheid van een sessiemelding -->
        @if(session('message'))
        <!-- Weergave van een melding -->
        <div id="alert-3" class="flex items-center mt-5 p-4 mb-4 ml-64 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <!-- Pictogram en tekst voor de melding -->
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <!-- Meldingstekst -->
            <div class="ml-3 text-sm font-medium">
                {{ session('message') }}
            </div>
            <!-- Knop voor het sluiten van de melding -->
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <!-- Sluitpictogram -->
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif

        <!-- Gedeelte voor het weergeven van de contactinformatie in een tabel -->
        <div class="flex items-center sm:rounded-lg md:ml-64">
            <table class="text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-6">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-6">
                            Onderwerp
                        </th>
                        <th scope="col" class="px-6 py-6">
                            Bericht
                        </th>
                        <th scope="col" class="px-6 py-6">
                            Actie
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($berichten as $bericht)
                    <!-- Weergave van individuele berichten -->
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $bericht->email }}
                        </th>
                        <td class="px-4 py-4">
                            {{ $bericht->onderwerp }}
                        </td>
                        <td class="px-4 py-4">
                            {{ $bericht->bericht }}
                        </td>
                        <!-- Verwijderknop met bevestiging -->
                        <td class="px-6 py-4">
                            <a href="{{ url('admin/contact/verwijderen', $bericht->id) }}" onclick="return confirmDelete();" class="font-medium text-red-600 dark:text-red-500 hover:underline">Verwijderen</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Externe JavaScript-bibliotheek voor front-end functionaliteit -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

    <!-- JavaScript-functie voor bevestiging van het verwijderen -->
    <script>
        function confirmDelete() {
            return confirm('Ben je zeker of je dit wilt verwijderen?');
        }
    </script>
</body>


</html>