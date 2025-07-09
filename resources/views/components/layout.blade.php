<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app.name", "Scholarly")}} </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main>
        <div class="flex items-center min-h-screen bg-light-bg dark:bg-dark-bg p-6">
            {{ $slot }}
        </div>
    </main>
</body>
</html>
