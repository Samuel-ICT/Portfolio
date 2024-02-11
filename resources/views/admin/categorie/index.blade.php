<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>

<body class="bg-black">

    @include('admin.header')
    <div class="p-10 sm:ml-64">
        <!-- Melding bij succesvolle actie -->
        @if(session('message'))
        <div id="alert-3"
            class="flex items-center mt-5 p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <!-- Succespictogram -->
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <!-- Weergave van meldingstekst -->
            <div class="ml-3 text-sm font-medium">
                {{ session('message') }}
            </div>
            <!-- Knop voor het sluiten van de melding -->
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <!-- Sluitpictogram -->
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif

        <div class="flex justify-between">
            <!-- Hoofdtitel -->
            <h1 class="text-white text-3xl font-bold uppercase py-12">Categorie</h1>

            <div class="pt-11">
                <!-- Knop voor het toevoegen van een categorie -->
                <a href="{{ url('admin/categorie/toevoegen') }}">
                    <button class="bg-indigo-600 text-white px-5 py-2 rounded-lg">Voeg Categorie Toe</button>
                </a>
            </div>
        </div>
    </div>

    <div class="flex justify-center overflow-x-auto shadow-md sm:rounded-lg md:ml-40">
        <!-- Tabel voor het weergeven van categoriegegevens -->
        <table class="w-[80%] text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Categorie
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actie
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $category)
                <!-- Weergave van individuele categoriegegevens -->
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->naam }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->slug }}
                    </td>
                    <!-- Bewerkknop -->
                    <td class="px-6 py-4">
                        <a href="{{ url('admin/categorie/bewerken', $category->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Bewerken</a>
                    </td>
                    <!-- Verwijderknop met bevestiging -->
                    <td class="px-6 py-4">
                        <a href="{{ url('admin/categorie/verwijderen', $category->id) }}"
                            onclick="return confirm('Ben je zeker of je dit wilt verwijderen?')"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline ">Verwijderen</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
