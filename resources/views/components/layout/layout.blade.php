<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config("app.name", "Scholarly")}} </title>
    @stack("css")
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light-dp0 text-dark-text dark:bg-dark-dp0 dark:text-light-text">
    <div class="flex min-h-screen">
        {{ $slot }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack("scripts")
</body>
</html>
