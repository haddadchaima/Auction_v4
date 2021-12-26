<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name=”robots” content=”noindex, follow”>
    <!-- Essential Css -->
    <link rel="icon" href="{{asset('images/laraframe-logo.png') }}">
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">

    <!-- Template Css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

    <!-- Data table sheet -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap4-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{asset('vendor/mcustomscrollbar/jquery.mCustomScrollbar.min.css')}}">

    @yield('style-top')

    <title>
        {{company_name()}}
    </title>
</head>
<body>

<!-- =========== Start: loader =========== -->
<div class="spinner-box">
    <div class="lds-facebook">
        <div class="configure-border-1">
            <div class="configure-core"></div>
        </div>
        <div class="configure-border-2">
            <div class="configure-core"></div>
        </div>
    </div>
</div>
<!-- =========== End: loader ============= -->
