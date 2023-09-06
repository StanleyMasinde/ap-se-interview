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
    <nav class="py-3 px-5 bg-primary flex justify-between">
        <h1>Dashboard</h1>

        <form action="{{ route('user.logout') }}" method="post">
            @csrf
            <button type="submit" class="text-red-500">Logout</button>
        </form>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
