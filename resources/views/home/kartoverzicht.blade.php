<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kartoverzicht</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="font-[Poppins]">
    @include('home.header')

    <!-- Winkelwagentabel met producten -->
    <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 white:text-gray-400">
            <!-- Titel -->
            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white ">
                Mijn winkelwagen
                <p class="mt-1 text-sm font-normal text-gray-500 white:text-gray-400">Hier staat een overzicht van al uw toegevoegde producten.</p>
            </caption>

            <!-- Tabelkop met kolommen -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 shadow-md">
                <tr>
                    <th scope="col" class="px-16 py-3">
                        <span class="sr-only">Afbeelding</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aantal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prijs
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actie
                    </th>
                </tr>
            </thead>

            <!-- Tabelinhoud met winkelwagenitems -->
            <tbody>
                <?php $totalePrijs = 0 ?>
                <?php $totaalAantal = 0 ?>
                @foreach($kart as $kart)
                <tr class="bg-white border-b  white:border-gray-700 hover:bg-gray-50 white:hover:bg-gray-600" data-prijs="{{$kart->prijs}}">
                    <!-- Kolom voor productafbeelding -->
                    <td class="p-4">
                        <img src="/product/{{$kart->foto}}" class="w-16 md:w-32 max-w-full max-h-full" alt="Productafbeelding">
                    </td>

                    <!-- Kolom voor productnaam -->
                    <td class="px-6 py-4 font-semibold text-gray-900 white:text-white">
                        {{$kart->product_naam}}
                    </td>

                    <!-- Kolom voor het aantal met inputveld -->
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div>
                                <!-- Inputveld voor het aantal producten -->
                                <input type="number" id="aantal" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 input-aantal" value="{{$kart->aantal}}" min="1" required>
                            </div>
                        </div>
                    </td>

                    <!-- Kolom voor de prijs van het product -->
                    <td class="px-6 py-4 totaal-prijs font-semibold text-gray-900 white:text-white">
                        €{{$kart->prijs * $kart->aantal}}
                    </td>

                    <!-- Kolom voor verwijderactie -->
                    <td class="px-6 py-4">
                        <a href="{{url('/verwijder_product',$kart->id)}}" class="font-medium text-red-600 white:text-red-500 hover:underline">Verwijderen</a>
                    </td>
                </tr>

                <!-- Bereken totaalprijs en totaal aantal -->
                <?php
                $totalePrijs += $kart->prijs * $kart->aantal;
                $totaalAantal += $kart->aantal;
                ?>
                @endforeach
            </tbody>

            <!-- Totaal sectie -->
            <tfoot>
                <tr class="font-semibold text-gray-900" id="totaal-rij">
                    <th scope="row" class="px-6 py-3 text-base"></th>
                    <th scope="row" class="px-6 py-5  text-base">Totaal:</th>
                    <td class="px-6 py-3" id="totaal-aantal">{{ $totaalAantal }}</td>
                    <td class="px-6 py-3" id="totaal-bedrag">€{{$totalePrijs}}</td>
                    <td><button class="px-6 py-3">Afrekenen</button></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- JavaScript-script voor dynamische prijsberekening -->
    <script>
        //  een eventlistener  om wijzigingen in het aantal bij te houden
        document.addEventListener("DOMContentLoaded", function() {
            // Selecteer alle invoervelden voor het aantal producten
            var inputAantal = document.querySelectorAll('.input-aantal');

            // Selecteer de rij voor het totaalbedrag en de cellen voor totaalbedrag en totaal aantal
            var totaalRij = document.getElementById('totaal-rij');
            var totaalBedragCel = document.getElementById('totaal-bedrag');
            var totaalAantalCel = document.getElementById('totaal-aantal');

            // Voeg een eventlistener toe aan elk invoerveld voor het aantal producten
            inputAantal.forEach(function(input) {
                input.addEventListener('input', function() {
                    // Haal het aantal op en zet het om naar een geheel getal
                    var aantal = parseInt(this.value);

                    // Haal de prijs per eenheid op en zet het om naar een decimaal getal
                    var prijsPerEenheid = parseFloat(this.closest('tr').getAttribute('data-prijs'));

                    // Bereken het totaalbedrag voor dit product
                    var totaalPrijs = aantal * prijsPerEenheid;

                    // Werk de totaalprijs in de cel bij
                    this.closest('tr').querySelector('.totaal-prijs').textContent = '€' + totaalPrijs.toFixed(2);

                    // Update totaal rij
                    var totaalNieuw = 0;
                    var totaalAantalNieuw = 0;

                    // Loop door alle invoervelden voor het aantal producten
                    inputAantal.forEach(function(input) {
                        // Haal het aantal op en zet het om naar een geheel getal
                        var aantal = parseInt(input.value);

                        // Haal de prijs per eenheid op en zet het om naar een decimaal getal
                        var prijsPerEenheid = parseFloat(input.closest('tr').getAttribute('data-prijs'));

                        // Update totaal bedrag en totaal aantal
                        totaalNieuw += aantal * prijsPerEenheid;
                        totaalAantalNieuw += aantal;
                    });

                    // Werk de totaal bedrag en totaal aantal in de rij bij
                    totaalBedragCel.textContent = '€' + totaalNieuw.toFixed(2);
                    totaalAantalCel.textContent = totaalAantalNieuw;
                });
            });
        });
    </script>

    @include('home.footer')
</body>

</html>