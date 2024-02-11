<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Toevoegen</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</head>

<body class="bg-black">

    @include('admin.header')

    <div class="p-10  sm:ml-64">
        <!-- Formulier kopsectie -->
        <div class="flex justify-between">
            <h1 class="text-white text-2xl font-bold uppercase py-12">Voeg Product toe</h1>

            <!-- Terugknop naar productoverzicht -->
            <div class="pt-11">
                <a href="{{ url('admin/product') }}">
                    <button class="bg-indigo-600 text-white px-5 py-2 rounded-lg">
                        <span class="pr-3"><i class="fa-solid fa-arrow-left"></i></span>Terug
                    </button>
                </a>
            </div>
        </div>

        <!-- Foutmeldingen sectie -->
        @if($errors->any())
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <!-- Product Formulier  -->
            <form class="space-y-6" action="{{ url('admin/product') }}" enctype="multipart/form-data" method="post">
                @csrf

                <!-- Rijen met inputvelden -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <!-- Naam van het product -->
                    <div>
                        <label for="naam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Naam</label>
                        <input type="text" name="naam" id="naam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" required>
                    </div>

                    <!-- Slug van het product -->
                    <div>
                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                        <input type="text" name="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" required>
                    </div>

                    <!-- Hoeveelheid van het product -->
                    <div>
                        <label for="hoeveelheid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hoeveelheid</label>
                        <input type="number" name="hoeveelheid" id="hoeveelheid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                    </div>

                    <!-- Merk van het product -->
                    <div>
                        <label for="merk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk</label>
                        <input type="text" name="merk" id="merk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" required>
                    </div>
                </div>

                <!-- Categorie van het product -->
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorie</label>
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" name="categorie" required>
                        <option selected>Kies een categorie</option>
                        @foreach($categorie as $categorie)
                        <option value="{{$categorie->naam}}">{{$categorie->naam}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Beschrijving van het product -->
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beschrijving</label>
                    <textarea id="beschrijving" name="beschrijving" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"></textarea>
                </div>

                <!-- Prijs en kortingprijs van het product -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <!-- Prijs van het product -->
                    <div>
                        <label for="prijs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prijs</label>
                        <input type="text" name="prijs" id="prijs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" required>
                    </div>

                    <!-- Kortingprijs van het product -->
                    <div>
                        <label for="korting_prijs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kortingprijs</label>
                        <input type="text" name="korting_prijs" id="korting_prijs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                    </div>
                </div>

                <!-- Foto uploaden -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto">Foto</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500  p-1.5" id="foto" name="foto" type="file">
                </div>

                <!-- Trending checkbox -->
                <div class="flex items-center mb-4">
                    <input id="trending" type="checkbox" value="on" name="trending" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    <label for="trending" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Trending</label>
                </div>

                <!-- Knop om product toe te voegen -->
                <button type="submit" class="w-25% text-white bg-indigo-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Voeg
                    toe</button>
            </form>
        </div>
    </div>


</body>

</html>