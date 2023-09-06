<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User</title>

    <!--Tailwind CSS-->
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="py-3 px-5 bg-primary">
        <h1>Dashboard</h1>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
