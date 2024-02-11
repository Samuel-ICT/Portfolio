<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>
    <base href="/public">

    @vite('resources/css/app.css')
</head>
<body class="font-[Poppins]">
    @include('home.header')
    
    <div class="container flex flex-col px-4 mx-auto mt-10 space-y-12 md:space-y-0 md:flex-row">
        
        <!-- Productafbeelding -->
        <div class="flex flex-col space-y-12 md:w-1/2">
            <img src="/product/{{$product->foto}}" alt="">
        </div>
        
        <!-- Productinformatie en bestel sectie -->
        <div class="flex flex-col space-y-8 md:w-1/2">
            
            <!-- Productinformatie -->
            <div class="md:mx-8 shadow-lg px-2">
                <!-- Naam en categorie -->
                <div>
                    <h1 class="text-2xl font-bold">{{$product->naam}}</h1><br>
                    <h4 class="uppercase">{{$product->categorie}}</h4>
                </div>
                
                <!-- Prijs en korting (indien van toepassing) -->
                <div class="flex items-center justify-between mt-8">
                    @if($product->korting_prijs!=null)
                        <span class="text-3xl font-bold text-gray-900 ">€{{$product->korting_prijs}}</span>
                        <span class="text-3xl font-bold text-red-600  line-through decoration-red-600">€{{$product->prijs}}</span>
                    @else
                        <span class="text-3xl font-bold text-indigo-600 ">€{{$product->prijs}}</span>
                    @endif
                </div>
                
                <!-- Beschrijving van het product -->
                <div class="mt-8">
                    <h2>{{$product->beschrijving}}</h2>
                </div>

                <!-- Bestelformulier -->
                <form action="{{url('kart',$product->id)}}" method="post">
                    @csrf
                    <!-- Aantal inputveld -->
                    <div  class="mt-3" >
                        <input type="number" name="aantal" id="" value="1" min="1">
                    </div>
                    
                    <!-- Knop om aan winkelmandje toe te voegen -->
                    <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center me-2 mt-8 mb-4">
                        <!-- Winkelwagenpictogram -->
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                        </svg>
                        Voeg toe aan winkelmandje
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    @include('home.footer')
</body>

</html>