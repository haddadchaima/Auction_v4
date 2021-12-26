@extends('layouts.headerless')
@section('title', __('Financial Suspension'))
@section('content')
    <div class="centralize-wrapper make-account">
        <div class="centralize-inner">
            <div class="centralize-content">
                <div class="laraframe-login mx-lg-5 p-b-100">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <img src="{{ asset('images/error.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center">{{ __('Financially Suspended!')  }}</h2>
                            <h1 class="text-center">401</h1>
                            <p class="text-justify">{{ __('Please contact administrator to get back your financial access.') }}</p>
                            <a href="{{ route('home') }}" class="btn btn-info btn-block">{{ __('Go Home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
