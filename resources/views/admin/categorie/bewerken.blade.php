<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie Bewerken</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/533bbf524f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</head>

<body class="bg-black">

    <!-- Inclusie van de header van het admin-gedeelte -->
    @include('admin.header')

    <div class="p-10 sm:ml-64">
        <div class="flex justify-between">
            <h1 class="text-white text-2xl font-bold uppercase py-12">Update Categorie</h1>

            <div class="pt-11">
                <a href="{{ url('admin/categorie') }}">
                    <button class="bg-indigo-600 text-white px-5 py-2 rounded-lg">
                        <span class="pr-3"><i class="fa-solid fa-arrow-left"></i></span>Terug
                    </button>
                </a>
            </div>
        </div>

        <div class="w-full p-4   border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-lg shadow sm:p-6 md:p-8">
            <!-- Formulier voor het updaten van de categorie -->
            <form class="space-y-6" action="{{url('admin/categorie/updaten',$data->id)}}" method="post">
                @csrf
                <div>
                    <label for="naam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Naam</label>
                    <input type="text" name="naam" id="naam" class="bg-gray-50 border border-gray-300 text-gray-900 dark:text-white dark:bg-gray-800 dark:border-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" value="{{$data->naam}}">
                </div>
                <div>
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                    <input type="slug" name="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  dark:text-white dark:bg-gray-800 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" value="{{$data->slug}}">
                </div>

                <!-- Knop voor het updaten van de categorie -->
                <button type="submit" class="w-25% text-white bg-indigo-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Updaten</button>

            </form>
        </div>
    </div>
</body>

</html>