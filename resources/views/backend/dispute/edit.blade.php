@extends('layouts.master')
@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin-dispute.index') }}" class="btn btn-sm btn-info back-button">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>
                @endslot
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="mb-3">
                        <div class="address-card">
                            <div class="agent-info">
                                <div class="personal-info mx-2 my-4">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-header"></i>
                                                {{__('Title :')}}
                                            </span>
                                            {{$dispute->title}}
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fa fa-play-circle"></i>
                                                {{__('Dispute Status :')}}
                                            </span>
                                            <span class="badge d-inline {{config('commonconfig.dispute_status.' . ( !is_null($dispute) ? $dispute->dispute_status : '' ) . '.color_class')}}">{{ config('commonconfig.dispute_status.' . ( !is_null($dispute) ? $dispute->dispute_status : '' ) . '.text')}}</span>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fa fa-id-badge"></i>
                                                {{__('Reference ID :')}}
                                            </span>
                                            <span class="badge d-inline">{{!is_null($dispute) ? $dispute->ref_id : ''}}</span>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fa fa-cog"></i>
                                                {{__('Dispute Type :')}}
                                            </span>
                                            <span class="badge d-inline {{config('commonconfig.dispute_type.' . ( !is_null($dispute) ? $dispute->dispute_type : '' ) . '.color_class')}}">{{ config('commonconfig.dispute_type.' . ( !is_null($dispute) ? $dispute->dispute_type : '' ) . '.text')}}</span>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fa fa-align-right"></i>
                                                {{__('Description :')}}
                                            </span>
                                            {{$dispute->description}}
                                        </li>
                                        <li class="mt-3">
                                            <span>
                                                <i class="fa fa-link"></i>
                                                {{__('Link :')}}
                                            </span>
                                            @if($dispute->dispute_type == DISPUTE_TYPE_AUCTION_ISSUE)
                                                <a href="{{route('auction.show',$disputed_link->id)}}">{{__('Click Here To View')}}</a>
                                            @endif
                                            @if($dispute->dispute_type == DISPUTE_TYPE_SELLER_ISSUE)
                                                <a href="{{route('seller-profile.show',$disputed_link->id)}}">{{__('Click Here To View')}}</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    @if($dispute->images != null)
                    <div id="app">
                        <div v-viewer class="images clearfix">
                            <div class="my-2">
                                <template v-for="image in images">
                                    <img :src="image" class="image p-3" :key="image">
                                </template>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="py-4">
                        @if($dispute->dispute_status != DISPUTE_STATUS_SOLVED)
                            <a class="btn btn-info confirmation d-inline-block" data-alert="{{__('Are you sure?')}}"
                               data-form-id="urm-{{$dispute->id}}" data-form-method='put'
                               href="{{ route('admin-change-dispute-status.update', $dispute->id) }}">
                                <i class="fa fa-check-circle-o"></i> {{ $dispute->dispute_status == DISPUTE_STATUS_PENDING ? 'On Investigation' : 'Solved'}}
                            </a>
                        @endif
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

        .bg-custom-gray {
            background-color: #ececec;
        }

        .bg-blue {
            background-color: #007bff;
        }

        .bg-indigo {
            background-color: #6610f2;
        }

        .bg-purple {
            background-color: #6f42c1;
        }

        .bg-pink {
            background-color: #e83e8c;
        }

        .bg-teal {
            background-color: #20c997;
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

        .agent-info .personal-info ul li span {
            width: 200px;
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
                    @if($dispute->images != null)
                    images: [
                        '{{dispute_image($dispute->images[0])}}',
                        '{{!empty($dispute->images[1]) ? dispute_image($dispute->images[1]) : null }}'
                    ]
                    @endif
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
