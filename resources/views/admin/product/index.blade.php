<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</head>

<body class="bg-black">

    @include('admin.header')

    <div class="p-10 sm:ml-64">
        <!-- Melding weergeven als deze bestaat -->
        @if(session('message'))
        <div id="alert-3"
            class="flex items-center mt-5 p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <!-- Pictogram voor melding -->
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <!-- Tekst van de melding -->
            <div class="ml-3 text-sm font-medium">
                {{ session('message') }}
            </div>
            <!-- Sluitknop voor de melding -->
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
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
            <h1 class="text-white text-3xl font-bold uppercase py-12">Producten</h1>

            <div class="pt-11">
                <!-- Knop om nieuw product toe te voegen -->
                <a href="{{ url('admin/product/toevoegen') }}">
                    <button class="bg-indigo-600 text-white px-5 py-2 rounded-lg">Voeg Product</button>
                </a>
            </div>
        </div>

    </div>

    <div class="flex items-center sm:rounded-lg md:ml-64">
        <!-- Tabel met productinformatie -->
        <table class="text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Slug
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Merk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Beschrijving
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Categorie
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Hoeveelheid
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Prijs
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Kortingprijs
                    </th>
                    <th scope="col" class="px-4 py-3">
                        1=Trending 0 =Niet Trending
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only"></span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop door producten -->
                @foreach($product as $product)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$product->naam}}
                    </th>
                    <td class="px-4 py-4">
                        {{$product->slug}}
                    </td>
                    <td class="px-3 py-4">
                        {{$product->merk}}
                    </td>
                    <td class="px-3 py-4">
                        {{$product->beschrijving}}
                    </td>
                    <td class="px-4 py-4">
                        <img style="height: 100px;" class="foto" src="/product/{{$product->foto}}">
                    </td>
                    <td class="px-3 py-4">
                        {{$product->categorie}}
                    </td>
                    <td class="px-3 py-4">
                        {{$product->hoeveelheid}}
                    </td>
                    <td class="px-3 py-4">
                        {{$product->prijs}}
                    </td>
                    <td class="px-3 py-4">
                        {{$product->korting_prijs}}
                    </td>
                    <td class="px-3 py-4">
                        {{$product->trending}}
                    </td>
                    <!-- Bewerkknop -->
                    <td class="px-6 py-4">
                        <a href="{{url('admin/product/bewerken',$product->id)}}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Bewerken</a>
                    </td>
                    <!-- Verwijderknop met bevestiging -->
                    <td class="px-6 py-4">
                        <a href="{{url('admin/product/verwijderen',$product->id)}}"
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
