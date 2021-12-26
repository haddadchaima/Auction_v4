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
                            <h2 class="text-center">{{ __('Be right back.') }}</h2>
                            <h1 class="text-center">503</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

