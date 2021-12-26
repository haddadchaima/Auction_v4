@extends('layouts.headerless')

@section('title', company_name())

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
                            <h2 class="text-center">{{ (isset($exception) && $exception->getMessage()) ? $exception->getMessage() : __('Not Found!')  }}</h2>
                            <h1 class="text-center">404</h1>
                            <p class="text-justify">{{ __('The page you are looking for might be changed, removed or not exists. Go back and try other links') }}</p>
                            <a href="{{ route('home') }}" class="btn btn-info btn-block">{{ __('Go Home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
