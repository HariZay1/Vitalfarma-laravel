<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="FarmaZay" />

    <title>FarmaZay - @yield('title')</title>

    <!-- Estilos CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktWYBpLl7C1lJbjT5s2IkB06ztHXyjt2gFELzv22" crossorigin="anonymous">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset('alert') ?>/themes/alertify.core.css" />
    <link rel="stylesheet" href="<?php echo asset('alert') ?>/themes/alertify.default.css" />

    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo asset('alert') ?>/lib/alertify.js"></script>
</head>

<body class="sb-nav-fixed">

    <!-- Navigation Header -->
    <x-navigation-header />

    <div id="layoutSidenav" class="d-flex">

        <!-- Navigation Menu -->
        <x-navigation-menu />

        <div id="layoutSidenav_content" class="flex-grow-1">

            <main>
                @yield('content')
            </main>

            <!-- Footer -->
            <x-footer />

        </div>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    @stack('js')
</body>

</html>
