<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunny - Midone UI</title>
    <link href="{{ Vite::asset('resources/Midone-UI/images/logo.svg') }}" rel="shortcut icon">
    
    @vite('resources/css/app.css')
</head>
<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
    
    @php
        $allMenu = \App\Radiant\Midone\MenuHelper::getAll();
    @endphp

    @include('layouts.components.sidebar.mobile-menu', $allMenu)

    <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
        @include('layouts.components.sidebar.side-menu', $allMenu)

        <div class="content">
            <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                
                @yield('breadcrumb')

                @include('layouts.components.header.search')
                @include('layouts.components.header.notification')
                @include('layouts.components.header.account-menu')

            </div>

            @yield('content')
        </div>
    </div>

    @vite('resources/js/app.js')
    @stack('script')
</body>
</html>