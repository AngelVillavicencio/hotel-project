<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div style="display: flex; flex-direction: row; gap: 20px">

        @auth
            <div id="MenuApp" 
                 data-customer-index="{{ route('customer.index') }}"
                 data-product-index="{{ route('product.index') }}"
                 data-room-index="{{ route('room.index') }}"
                 data-booking-create="{{ route('booking.create') }}"
                 data-logout={{ route('logout') }}
                 data-login={{ route('login') }}>
            </div>
        @endauth

        <main>
            <div>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            @yield('content')
        </main>

    </div>
</body>
</html>
