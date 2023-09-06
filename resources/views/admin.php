<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!--Tailwind CSS-->
    @vite('resources/css/app.css')
</head>

<body>
    <main class=" h-screen grid place-content-center">
        <div class=" w-72">
            <form action="{{ route('admin.login') }}" method="post" class="flex flex-col gap-2">
                @csrf
                <div>
                    <label for="email">E-mail</label>
                    <input value="{{ old('email') }}" class="w-full rounded-lg" type="email" name="email" id="email" required>
                    <small class="text-red-500">{{ $errors->first('email') }}</small>
                </div>

                <div>
                    <label for="password">Password</label>
                    <input class="w-full rounded-lg" type="password" name="password" id="password" required>
                    <small class="text-red-500">{{ $errors->first('password') }}</small>
                </div>

                <div>
                    <button class="bg-primary py-2 px-7 rounded-lg" type="submit">Login</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
