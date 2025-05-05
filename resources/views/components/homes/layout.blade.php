<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="data warga">
    <meta name="author" content="Vinsensius Alvianto">

    <!-- tailwindcss-->
    @vite('resources/css/app.css', 'resources/js/app.js')

    <!-- alpine js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Rutada | {{ $title }}</title>
</head>
<body class="h-full">
    <div class="min-h-full">
        <x-homes.navbar></x-homes.navbar>
        <x-homes.header>{{ $title }}</x-homes.header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
              <!-- Main content -->
              {{ $slot }}
            </div>
          </main>
    </div>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/9dfd87037d.js" crossorigin="anonymous"></script>

  </body>
</html>