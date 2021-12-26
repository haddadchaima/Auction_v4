@extends('frontend.layouts.master')
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

                        @component('components.card', ['type' => 'info', 'class'=> 'border-top-0'])
                            {{ Form::open(['route'=>['profile-verification-with-address.store'],'class'=>'form-horizontal edit-profile-form','files' => true]) }}
                            @method('post')
                            @basekey
                                <div class="row justify-content-center">
                                    @include('frontend.layouts.includes.address_preview')
                                    <div class="col-md-12 my-3">
                                        <div id="identification">

                                            <div class="form-group boot-select mb-4">
                                                <label for="{{ fake_field('identification_type') }}" class="{{fake_field('form-control-label mb-3')}}">{{ __('Identification With :') }}</label>

                                                {{ Form::select(fake_field('identification_type'), identification_type_with_address(), old('identification_type'), ['class'=> 'custom-select', 'id' => fake_field('identification_type'), 'v-on:change'=> "onChange(".'$event'.")",'placeholder' => __('Choose a method') ]) }}

                                            </div>

                                            <div>

                                                <div v-if="nextSelect == {{IDENTIFICATION_TYPE_WITH_ADDRESS_BANK_STATEMENT}} || nextSelect == {{IDENTIFICATION_TYPE_WITH_ADDRESS_UTILITY_BILL}} ">

                                                    <div class="row">

                                                        {{-- Start: front image --}}
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <div class="fileinput-new img-thumbnail mb-3">
                                                                                <img class="img" src="{{know_your_customer_images('preview.png')}}"  alt="">
                                                                            </div>
                                                                            <div class="fileinput-preview fileinput-exists mb-3 img-thumbnail"></div>
                                                                            <div>
                                                                        <span class="btn btn-sm btn-outline-success btn-file">
                                                                            <span class="fileinput-new">Select</span>
                                                                            <span class="fileinput-exists">Change</span>
                                                                            {{ Form::file('front_image', [old('front_image'),'class'=>'multi-input', 'id' => fake_field('front_image'),])}}
                                                                        </span>
                                                                                <a href="#" class="btn btn-sm btn-outline-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 class="font-weight-bold border-bottom pb-3">Front Image</h4>
                                                                    <p class="text-muted mt-4">Take an image of your id card from the front side and upload it here. Which you will not be able to edit or change once you upload it till admin review</p>
                                                                    <p class="mt-3 mb-0 color-333"> - Maximum Image Size : <span class="font-weight-bold">5MB</span></p>
                                                                    <p class="mt-1 color-333">- Maximum Image Dimension : <span class="font-weight-bold">1600x1200</span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- End: front image --}}

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="mt-5">
                                                <div v-if="nextSelect != ''" class="d-inline-block float-right ml-3">
                                                    <div class="form-group">
                                                        {{ Form::submit(__('Submit'),['class'=>'btn text-center bg-info fz-14 d-inline-block custom-btn border-0']) }}
                                                    </div>
                                                </div>
                                                <a href="{{ route('seller-verification.index') }}"
                                                   class="btn text-center float-right fz-14 d-inline-block custom-btn border-0">{{ __('Go Back') }}</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style-top')
    <link rel="stylesheet" href="{{asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <style>
        .fileinput-new{width: 200px; height: 180px;}
        .fileinput-preview {max-width: 200px; max-height: 180px;}
    </style>
@endsection

@section('script')
    <script>
        var app = new Vue({
            el: '#identification',
            data: {
                nextSelect: '',
            },

            methods: {
                onChange: function (event) {
                    this.nextSelect = event.target.value;
                }
            },
        })
    </script>

    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.edit-profile-form').cValidate();
        });
    </script>
@endsection
