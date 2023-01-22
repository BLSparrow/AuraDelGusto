<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="icon" href="{{asset('storage/logo_for_restoran.png')}}" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/navbarMobile.css')}}">
    <link rel="stylesheet" href="{{asset('/css/table.css')}}">

</head>
<body class="antialiased">

<section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
        <i class="bi bi-phone d-flex align-items-center"><span>+7(919) 137-15-65</span></i>
        <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Пн-Вс: 11:00 - 23:00</span></i>
    </div>
</section>
@if(!request()->routeIs('admin.*'))
    @include('inc.navbar')
@endif
@yield('content')

@include('inc.footer')
<script src="{{asset('/js/jquery-2.1.1.js')}}">
</script>
<script src="{{asset('/js/velocity.min.js')}}"></script>
<script src="{{asset('/js/main-navbar.js')}}"></script>

<script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('/js/main.js')}}"></script>
@stack('scripts')
</body>
</html>
