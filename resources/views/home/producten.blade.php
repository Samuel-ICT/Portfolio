<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle Producten</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>

<body class="font-[Poppins]">
    @include('home.header')

    <!-- Titel -->
    <div class="max-w-7xl mx-28 mt-16">
        <h1 class="text-4xl font-bold uppercase">Alle Producten</h1>
    </div>

    <!-- Productsectie -->
    <section>
        <div class="max-w-6xl px-5 mx-auto mt-28 text-center">
            <div class="grid md:grid-cols-4 gap-6 sm:grid-cols-2 gap-6">
                @foreach($producten as $product)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:border-indigo-600">
                    <!-- Productlink met afbeelding -->
                    <a href="{{url('product', $product->slug)}}">
                        <img class="rounded-t-lg" src="/product/{{$product->foto}}" alt="product image" />
                    </a>

                    <!-- Productdetails -->
                    <div class="px-5 pb-5">
                        <!-- Productnaam -->
                        <a href="{{url('product', $product->slug)}}">
                            <h5 class="text-lg font-semibold tracking-tight text-gray-900 mt-2">{{$product->naam}}</h5>
                        </a>

                        <!-- Beoordeling en waardering -->
                        <div class="flex items-center mt-2.5 mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <!-- Beoordelingspictogrammen -->
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <!-- Gemiddelde beoordeling -->
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ms-3">4.3</span>
                            </div>
                        </div>

                        <!-- Prijsinformatie -->
                        <div class="flex items-center justify-between">
                            @if($product->korting_prijs != null)
                            <!-- Prijs met korting -->
                            <span class="text-3xl font-bold text-gray-900 ">€{{$product->korting_prijs}}</span>
                            <!-- Oorspronkelijke prijs (doorstreept) -->
                            <span class="text-3xl font-bold text-red-600 line-through decoration-red-600">€{{$product->prijs}}</span>
                            @else
                            <!-- Standaardprijs zonder korting -->
                            <span class="text-3xl font-bold text-gray-900">€{{$product->prijs}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('home.footer')
</body>

</html>