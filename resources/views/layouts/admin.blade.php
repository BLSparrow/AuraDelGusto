<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="icon" href="{{asset('storage/img/logo_for_restoran.png')}}" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

</head>
<body class="antialiased">

@include('inc.admin.header')

<div class="container-fluid">
    <div class="row">
        @include('inc.admin.sidebar')
        @include('inc.admin.main')
    </div>
</div>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/js/workWithFile.js')}}"></script>
@stack('scripts')
</body>
</html>
