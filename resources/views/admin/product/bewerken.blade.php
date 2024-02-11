<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Bewerken</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>

<body class="bg-black">

    @include('admin.header')

    <div class="p-10 sm:ml-64">
        <!-- Hoofdtitel en terugknop -->
        <div class="flex justify-between">
            <h1 class="text-white text-2xl font-bold uppercase py-12">Update Product</h1>

            <div class="pt-11">
                <!-- Terugknop naar productlijst -->
                <a href="{{ url('admin/product') }}">
                    <button class="bg-indigo-600 dark:hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">
                        <span class="pr-3"><i class="fa-solid fa-arrow-left"></i></span>Terug
                    </button>
                </a>
            </div>
        </div>

        <!-- Formulier voor het updaten van een product -->
        <div
            class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="{{url('admin/product/updaten',$product->id)}}" enctype="multipart/form-data"
                method="post">
                @csrf
                <!-- Grid voor het organiseren van de inputvelden -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <!-- Naam van het product -->
                        <label for="naam"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Naam</label>
                        <input type="text" name="naam" id="naam" value="{{$product->naam}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <!-- Slug van het product -->
                    <div>
                        <label for="slug"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{$product->slug}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <!-- Hoeveelheid van het product -->
                    <div>
                        <label for="hoeveelheid"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hoeveelheid</label>
                        <input type="number" name="hoeveelheid" value="{{$product->hoeveelheid}}" id="hoeveelheid"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <!-- Merk van het product -->
                    <div>
                        <label for="merk"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Merk</label>
                        <input type="text" name="merk" id="merk" value="{{$product->merk}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                </div>
                <!-- Categorie van het product -->
                <div>
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorie</label>
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="categorie">
                        <!-- Huidige categorie als standaardoptie -->
                        <option selected value="{{$product->categorie}}">{{$product->categorie}}</option>
                        <!-- Opties voor andere categorieën -->
                        @foreach($categorie as $category)
                        <option value="{{$category->naam}}">{{$category->naam}}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Beschrijving van het product -->
                <div>
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beschrijving</label>
                    <textarea id="beschrijving" name="beschrijving" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$product->beschrijving}}</textarea>
                </div>
                <!-- Prijs en kortingprijs van het product -->
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="prijs"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prijs</label>
                        <input type="text" name="prijs" id="prijs" value="{{$product->prijs}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for="korting_prijs"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kortingprijs</label>
                        <input type="text" name="korting_prijs" id="korting_prijs" value="{{$product->korting_prijs}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                </div>
                <!-- Huidige foto van het product -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto">Huidige
                        Foto</label>
                    <img style="height: 200px;" src="/product/{{$product->foto}}" alt="">
                </div>
                <!-- Nieuwe foto voor het product -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="foto">Foto</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="foto" name="foto" type="file">
                </div>
                <!-- Trending checkbox -->
                <div class="flex items-center mb-4">
                    <input id="trending" type="checkbox" value="on" name="trending"
                        {{ $product->trending ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="trending"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Trending</label>
                </div>
                <!-- Knop voor het updaten van het product -->
                <button type="submit"
                    class="w-25% text-white bg-indigo-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-blue-800">Update</button>
            </form>
        </div>
    </div>

</body>

</html>
