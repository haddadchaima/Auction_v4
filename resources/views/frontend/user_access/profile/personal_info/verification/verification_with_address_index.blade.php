@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <div class="p-b-100 p-t-50">
        <div class="container">
            @include('frontend.user_access.profile.personal_info.title_nav')
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    @include('frontend.user_access.profile.personal_info.avatar')
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        @include('frontend.user_access.profile.personal_info.profile_nav')

                        @component('components.card', ['type' => 'info', 'class'=> 'border-top-0 py-4'])
                            <div class="row">

                                {{--Start: verify with address--}}
                                <div class="col-lg-12">
                                    @if(!is_null($addressVerifications))
                                        @foreach($addressVerifications as $addressVerification)
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between py-4">
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-3 text-secondary">{{__('Verification Status :')}}</h6>
                                                        </div>
                                                        <div class="d-inline-block w-auto">
                                                            <span class="badge float-right text-white {{config('commonconfig.verification_status.' . ( !is_null($addressVerification) ? $addressVerification->status : VERIFICATION_STATUS_UNVERIFIED ) . '.color_class')}}">{{ config('commonconfig.verification_status.' . ( !is_null($addressVerification) ? $addressVerification->status : VERIFICATION_STATUS_UNVERIFIED ) . '.text')}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="card border-0">
                                                        <div class="card-body pt-0 address-card">
                                                            <div class="agent-info">
                                                                <div class="personal-info mx-2 my-4">
                                                                    <ul>
                                                                        <li>
                                                                                <span>
                                                                                    <i class="fa fa-user"></i>
                                                                                    name :
                                                                                </span>
                                                                            {{!is_null($addressVerification->address) ? $addressVerification->address->name : ''}}
                                                                        </li>
                                                                        <li>
                                                                                <span>
                                                                                    <i class="fa fa-map-marker"></i>
                                                                                    location :
                                                                                </span>
                                                                            {{!is_null($addressVerification->address) ? $addressVerification->address->city : ''}}
                                                                            {{!is_null($addressVerification->address) ? $addressVerification->address->country->name : ''}}
                                                                        </li>
                                                                        <li>
                                                                                <span>
                                                                                    <i class="fa fa-phone"></i>
                                                                                    phone :
                                                                                </span>
                                                                            {{!is_null($addressVerification->address) ? $addressVerification->address->phone_number : ''}}
                                                                        </li>
                                                                        <li>
                                                                                <span>
                                                                                    <i class="fa fa-envelope"></i>
                                                                                    post code :
                                                                                </span>
                                                                            {{!is_null($addressVerification->address) ? $addressVerification->address->post_code : ''}}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h6 class="mb-3 text-secondary">Utility Image :</h6>
                                                    <div class="d-flex">
                                                        <img class="img-fluid mx-auto mt-3 front-img" src="{{know_your_customer_images($addressVerification->front_image)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mb-3 font-weight-bold color-666">Verification with Address :</h5>
                                            <a href="{{ route('profile-verification-with-address.create')}}"
                                               class="btn text-center bg-custom-gray fz-14 d-inline-block custom-btn border-0">{{ __('Verify Your Address') }}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style-top')
    <style>
        .front-img{max-height: 300px}
    </style>
@endsection
