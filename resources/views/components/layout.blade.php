<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app.name") }} {{ ($title ?? "") }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-zinc-700 min-h-screen">
    <x-header />

    <main class="min-h-dvh pt-24 pb-8">
        <div class="container mx-auto px-4">
            {{ $slot }}
        </div>
    </main>

    <x-footer />
</body>

</html>