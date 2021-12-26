@extends('layouts.master')
@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('verification-with-id.index') }}" class="btn btn-sm btn-info back-button">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>
                @endslot
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if(!is_null($addressVerification->address))
                        <div class="card border-0 mb-3">
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
                    @endif
                </div>
                <div class="col-md-10">
                    <div id="app">
                        <div v-viewer class="images d-flex clearfix">
                            <div class="mx-auto">
                                <template v-for="image in images">
                                    <img :src="image" class="image p-3" :key="image">
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class=" py-4 text-center">

                        @if($knowYourCustomer->status !== VERIFICATION_STATUS_APPROVED)
                            <a class="btn btn-info confirmation d-inline-block" data-alert="{{__('Are you sure?')}}"
                               data-form-id="urm-{{$knowYourCustomer->id}}" data-form-method='put'
                               href="{{ route('verification-status.change', $knowYourCustomer->id) }}">
                                <i class="fa fa-check-circle-o"></i> {{ __('Approve') }}
                            </a>
                        @endif

                        <a class="btn btn-danger confirmation d-inline-block ml-2" data-alert="{{__('Are you sure?')}}"
                           data-form-id="urm-{{$knowYourCustomer->id}}" data-form-method='delete'
                           href="{{ route('verification-status.destroy', $knowYourCustomer->id) }}">
                            <i class="fa fa-trash-o"></i> {{ __('Decline') }}
                        </a>

                    </div>
                </div>
            </div>

            @endcomponent
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('vendor/v-viewer/viewer.css')}}" >
    <link rel="stylesheet" href="{{asset('vendor/mcustomscrollbar/jquery.mCustomScrollbar.min.css')}}">

    <style>
        .custom-control.custom-checkbox {
            margin-bottom: 8px;
            font-size: 16px;
        }
        .custom-control-label {
            cursor: pointer;
        }

        .image-area {
            position: relative;
        }

        .img-thumbnail {
            position: absolute;
            top: 0;
            left: 0;
        }

        .image {
            max-height: 400px;
            cursor: pointer;
            margin: 5px;
            display: inline-block;
        }

        .agent-info .agent-title {
            font-size: 28px;
            font-weight: bold;
            color: #ff214f;
            line-height: 1;
            text-transform: uppercase;
        }
        .agent-info .designation {
            font-size: 18px;
            color: #999;
            display: block;
            margin-top: 5px;
            text-transform: capitalize;
        }
        .agent-info .personal-info {
            font-family: "Poppins", sans-serif;
        }
        .agent-info .personal-info ul li {
            margin-bottom: 10px;
            text-transform: capitalize;
            color: #333 !important;
        }
        .agent-info .personal-info ul li span {
            width: 40%;
            text-align: left !important;
            display: inline-block;
            text-transform: capitalize;
        }
        .agent-info .personal-info ul li span i {
            margin-right: 5px;
            color: #ff214f;
        }
        .agent-info .single-share ul li:first-child {
            font-size: 18px;
            margin-right: 10px;
        }

        ul {
            list-style: none;
        }

    </style>
@endsection

@section('script')
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{asset('vendor/v-viewer/viewer.js')}}"></script>
    <script src="{{asset('vendor/v-viewer/v-viewer.js')}}"></script>
    <script src="{{ asset('vendor/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script>
        Vue.use(VueViewer.default)
        console.log(VueViewer.default)
        var Main = {
            methods: {
                toggle() {

                }
            },
            data() {
                return {
                    images: [
                        '{{know_your_customer_images($knowYourCustomer->front_image)}}',
                        '{{!is_null($knowYourCustomer->back_image) ? know_your_customer_images($knowYourCustomer->back_image) : null }}'
                    ]
                }
            }
        }
        var App = Vue.extend(Main)
        new App().$mount('#app')
    </script>
    <script>
        $(window).on("load",function(){
            $('.m-scroller').mCustomScrollbar();
        });
    </script>
@endsection
