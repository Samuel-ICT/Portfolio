<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over Ons</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>


    @vite('resources/css/app.css')
</head>
@include('home.header')

<body class="font-[Poppins]">
    <section class="flex items-center bg-stone-100 xl:h-screen ">
        <div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-6">
            <div class="flex flex-wrap ">
                <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0">
                    <div class="relative lg:max-w-md">
                        <img src="https://i.postimg.cc/rF0MKfBV/pexels-andrea-piacquadio-3760263.jpg" alt="aboutimage"
                            class="relative z-10 object-cover w-full rounded h-96">
                        <div
                            class="absolute bottom-0 right-0 z-10 p-8 bg-white border-4 border-indigo-500 rounded shadow dark:border-indigo-400 lg:-mb-8 lg:-mr-11 sm:p-8 dark:text-gray-300 dark:bg-gray-800 ">
                            <p class="text-lg font-semibold md:w-72">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="absolute top-0 left-0 w-16 h-16 text-indigo-700 dark:text-gray-300 opacity-10"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z">
                                    </path>
                                </svg>
                                 Beste Sneaker webshop van heel Nederland
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Hoofdtitel -->
                <div class="w-full px-6 mb-10 lg:w-1/2 lg:mb-0 ">
                    <div class="pl-4 mb-6 border-l-4 border-indigo-500 ">
                        <span class="text-sm text-gray-600 uppercase ">Wie zijn wij?</span>
                        <h1 class="mt-2 text-3xl font-black  md:text-5xl ">
                            Over Sneaks
                        </h1>
                    </div>
                     <!-- Inleidende tekst over het bedrijf -->
                    <p class="mb-6 text-base leading-7 text-gray-800 ">
                        Welkom bij Sneaks, jouw ultieme bestemming voor de nieuwste en meest stijlvolle sneakers! Bij
                        Sneaks geloven we dat schoenen niet alleen een accessoire zijn, maar een expressie van jouw
                        unieke stijl en persoonlijkheid. Daarom streven we ernaar om een uitgebreide collectie sneakers
                        van de hoogste kwaliteit aan te bieden, zodat je altijd de perfecte kicks kunt vinden die passen
                        bij jouw smaak en levensstijl.
                    </p>

                </div>
            </div>
        </div>
    </section>
</body>
@include('home.footer')

</html>
