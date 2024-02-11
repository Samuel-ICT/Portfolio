<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie Toevoegen</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>

<body class="bg-black">

    <!-- Inclusie van de header van het admin-gedeelte -->
    @include('admin.header')

    <div class="p-10 sm:ml-64">
        <!-- Flex-container voor titel en knop voor terugkeren -->
        <div class="flex justify-between">
            <!-- Titel van de pagina -->
            <h1 class="text-white text-2xl font-bold uppercase py-12">Voeg Categorie Toe</h1>
            <!-- Knop voor het terugkeren naar de categoriepagina -->
            <div class="pt-11">
                <a href="{{ url('admin/categorie') }}">
                    <button class="bg-indigo-600 dark:hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">
                        <span class="pr-3"><i class="fa-solid fa-arrow-left"></i></span>Terug
                    </button>
                </a>
            </div>
        </div>

        <!-- Formulier voor het toevoegen van een categorie -->
        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="{{ url('admin/categorie') }}" method="post">
                <!-- CSRF-token -->
                @csrf
                <!-- Invoerveld voor categorie-naam -->
                <div>
                    <label for="naam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Naam</label>
                    <input type="text" name="naam" id="naam"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                    <!-- Weergave van foutmelding bij ongeldige categorie-naam -->
                    @error('naam')
                    <small class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">{{ $message }}</small>
                    @enderror
                </div>
                <!-- Invoerveld voor categorie-slug -->
                <div>
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                    <input type="slug" name="slug" id="slug"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                </div>

                <!-- Knop voor het verzenden van het formulier -->
                <button type="submit"
                    class="w-25% text-white bg-indigo-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-blue-800">
                    Voeg toe
                </button>
            </form>
        </div>
    </div>

</body>

</html>
