<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'My Website')</title>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

    {{-- @vite(['resources/assets/website/scss/website.scss', 'resources/assets/website/js/website.js']) --}}
    @vite(['resources/front/scss/website.scss', 'resources/front/js/website.js'])

</head>

<body class="d-flex flex-column min-vh-100">

    <div class="container-fluid py-1">
        @include('website.layout.navbar.nav')
    </div>

    <!-- Main Content -->
    <main class="flex-fill" style="background-color: #fffdfa;">
        @yield('content')
    </main>

    @include('website.layout.footer')

</body>

</html>
