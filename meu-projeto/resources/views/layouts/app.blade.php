<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIGAC') </title>
    @vite(['resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>



<body>
    @include('layouts.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>

</html>