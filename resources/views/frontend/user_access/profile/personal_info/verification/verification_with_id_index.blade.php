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

                                {{-- Start: update with ID--}}
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="mb-3 font-weight-bold color-666">Verification with ID :</h5>
                                            <div class="d-flex justify-content-between py-4">
                                                <div class="d-inline-block">
                                                    <h6 class="mb-3 text-secondary">{{__('Verification Status :')}}</h6>
                                                </div>
                                                <div class="d-inline-block w-auto">
                                                    <span class="badge float-right text-white {{config('commonconfig.verification_status.' . ( !is_null($idVerification) ? $idVerification->status : VERIFICATION_STATUS_UNVERIFIED ) . '.color_class')}}">{{ config('commonconfig.verification_status.' . ( !is_null($idVerification) ? $idVerification->status : VERIFICATION_STATUS_UNVERIFIED ) . '.text')}}</span>
                                                </div>
                                            </div>


                                            @if( !is_null($idVerification) )
                                                <h6 class="mb-3 text-secondary">Front Image :</h6>
                                                <div class="d-flex">
                                                    <img class="img-fluid mx-auto mt-3 front-img" src="{{know_your_customer_images($idVerification->front_image)}}">
                                                </div>
                                                @if(isset($idVerification->back_image))
                                                    <h6 class="mb-3 text-secondary">Back Image :</h6>
                                                    <div class="d-flex">
                                                        <img class="img-fluid mx-auto mt-3 front-img" src="{{know_your_customer_images($idVerification->back_image)}}">
                                                    </div>
                                                @endif
                                            @else
                                                <a href="{{ route('profile-verification-with-id.create') }}"
                                                   class="btn text-center bg-custom-gray fz-14 d-inline-block custom-btn border-0">{{ __('Verify Your Identity') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{--End: update with ID--}}

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
