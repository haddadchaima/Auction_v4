<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('storage/images/favicon.png') }}">

    @yield('meta')

    <title>
        @hasSection('title')
            {{ config('app.name') }} | @yield('title', config('app.name'))
        @else
            {{ config('app.name') }}
        @endif
    </title>

    @yield('style-top')

<!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/from_inline.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/mcustomscrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('style')

</head>
<body class="hold-transition sidebar-mini">
<div id="app" class="wrapper">
