@extends('layouts.headerless')
@section('title', __('Under Maintenance'))
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
                            <h2 class="text-center">{{ __('Under Maintenance')  }}</h2>
                            <h1 class="text-center">503</h1>
                            <p class="text-justify">{{ __("The website is still under maintenance mode. send us an email anytime :email",['email' => settings('admin_receive_email')])}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
