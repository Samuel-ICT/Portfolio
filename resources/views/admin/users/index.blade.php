<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</head>

<body class="bg-black">

    @include('admin.header')

    <section>
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold uppercase ml-64 py-20 text-white">Users</h1>
        </div>

        <!-- Tabel met gebruikersgegevens -->
        <div class="flex items-center sm:rounded-lg md:ml-64">
            <table class="text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            Naam
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Wachtwoord
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefoonnummer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Adres
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>

                <!-- Tabelinhoud met gebruikersgegevens -->
                <tbody>
                    @foreach($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$user->name}}
                        </th>
                        <td class="px-4 py-4">
                            {{$user->email}}
                        </td>
                        <td class="px-4 py-4">
                            {{$user->password}}
                        </td>
                        <td class="px-3 py-4">
                            {{$user->phone_number}}
                        </td>
                        <td class="px-3 py-4">
                            {{$user->address}}
                        </td>
                        <td class="px-6 py-4">
                            <!-- Verwijderen van gebruiker met bevestigingsprompt -->
                            <a href="{{url('admin/users/verwijderen',$user->id)}}"
                                onclick="return confirm('Ben je zeker of je dit wilt verwijderen?')"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Verwijderen</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>


</body>

</html>
