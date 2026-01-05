<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 text-gray-800">

    <main>
        @yield('content')
    </main>

</body>
</html>
