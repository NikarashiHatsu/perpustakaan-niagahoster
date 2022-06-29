<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="wrapper d-flex flex-column min-vh-100">
        <aside class="navbar navbar-vertical navbar-expand-lg navbar-transparent" x-data>
            <div class="container-fluid">
                @include('layouts.header-mobile')

                @include('layouts.sidebar')
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="container-xl">
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        {{ $headerLeft ?? "" }}

                        {{ $headerRight ?? "" }}
                    </div>
                </div>
            </div>

            <div class="page-body">
                {{ $slot }}
            </div>

            @include('layouts.footer')
        </div>
    </div>

    <script src="{{ asset('./dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
</body>

</html>
