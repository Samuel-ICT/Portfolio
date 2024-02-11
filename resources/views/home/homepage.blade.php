<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="font-[Poppins]">
    <!-- Inclusie van de headersectie -->
    @include('home.header')

    <!-- Hero-sectie met slogan en afbeelding -->
    <section id="hero" class="shadow-lg mt-2 p-2 rounded shadow-indigo-500/50">
        <!-- Container voor flexibele lay-out -->
        <div class="container flex flex-col-reverse md:flex-row items-center px-6 mx-auto mt-10 space-y-0 md:space-y-0">
            <!-- Tekst- en knopgedeelte -->
            <div class="flex flex-col mb-32 space-y-12 md:w-1/2">
                <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left md:leading-relaxed">
                    Boost jouw Stap met Onze Sneaker Selectie
                </h1>
                <div class="flex justify-center md:justify-start">
                    <!-- Knop voor het winkelen -->
                    <a href="{{url('/alle_producten')}}">
                        <button class="bg-indigo-600 text-white text-lg px-5 py-2 rounded-full md:px-8 py-5 md:rounded">Shop nu</button>
                    </a>
                </div>
            </div>
            <!-- Afbeeldingsgedeelte -->
            <div class="md: flex object-cover bg-slate-90">
                <img src="images/nike4.png" alt="">
            </div>
        </div>
    </section>

    <!-- Categorie-sectie -->
    <section id="categorie">
        <div class="max-w-6xl px-5 mx-auto mt-20 text-center">
            <h2 class="text-4xl font-bold text-center">
                Shop per <span class="text-indigo-600">categorie</span>
            </h2>
            <div class="flex flex-col mt-24 sm:flex-row md:space-x-6">
                <!-- Categorieën met afbeeldingen en koppelingen -->
                <div class="flex-flex-col items-center p-6 space-y-6 sm:w-1/3">
                    <a href="{{url('/heren')}}">
                        <img src="images/boy1.jpg" alt="">
                        <h3 class="font-bold text-2xl">Heren</h3>
                    </a>
                </div>
                <div class="flex-flex-col items-center p-6 space-y-6 sm:w-1/3">
                    <a href="{{url('/dames')}}">
                        <img src="images/girl2.jpg" alt="">
                        <h3 class="font-bold text-2xl">Dames</h3>
                    </a>
                </div>
                <div class="flex-flex-col items-center p-6 space-y-6 sm:w-1/3">
                    <a href="{{url('/kids')}}">
                        <img src="images/kid.jpg" alt="">
                        <h3 class="font-bold text-2xl">Kids</h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Trending-sectie -->
    <section id="trending">
        <div class="max-w-6xl px-5 mx-auto mt-32 text-center">
            <h2 class="text-4xl font-bold text-center py-8">Trending deze <span class="text-indigo-600">week</span></h2>

            <!-- Trending producten met afbeeldingen en prijsinformatie -->
            <div class="flex overflow-x-auto gap-6 pt-{-20px}">
                @foreach($trending as $trending)
                <div class="shrink-0 items-center h-[300px]">
                    <a href="{{url('product', $trending->slug)}}">
                        <img class="w-full h-full object-cover mt-[-73px]" src="/product/{{$trending->foto}}" alt="">
                    </a>
                    <h4 class="text-lg font-bold p-2">€{{$trending->prijs}}</h4>
                    <h4 class="text-lg font-medium">{{$trending->naam}} {{$trending->categorie}}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Nieuw-sectie -->
    <section id="nieuw">
        <div class="max-w-6xl px-5 mx-auto mt-32 text-center">
            <h2 class="text-4xl font-bold text-center py-8">Nieuw bij <span class="text-indigo-600">ons</span></h2>

            <!-- Nieuwe producten met afbeeldingen, prijsinformatie en "Nieuw" label -->
            <div class="grid md:grid-cols-4 gap-6 sm:grid-cols-2 gap-6">
                @foreach($nieuw as $product)
                <div class="relative">
                    <!-- "Nieuw" label -->
                    <span class="bg-gray-800 text-white text-sm font-medium absolute top-0 left-0 px-2.5 py-0.5 ">Nieuw</span>
                    <a href="{{url('product', $product->slug)}}">
                        <img src="/product/{{$product->foto}}" alt="">
                    </a>
                    <h4 class="text-lg font-bold p-2">€{{$product->prijs}}</h4>
                    <h4 class="text-lg font-medium">{{$product->naam}} {{$product->categorie}}</h4>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Inclusie van de footersectie -->
    @include('home.footer')
</body>


</html>