<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/headerless.css') }}">
    @yield('style')


</head>

<body>

<div class="centralize-wrapper make-account">
    <div class="centralize-inner">
        <div class="centralize-content">
            @yield('content')
        </div>
    </div>
</div>

@include('errors.flash_message')

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@yield('script')
</body>
</html>
