<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app.name", "Scholarly")}} </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light-bg text-dark-text dark:bg-dark-bg dark:text-light-text">
    <main>
        <div class="min-h-screen">
            {{ $slot }} 
        </div>
    </main>
</body>
</html>
