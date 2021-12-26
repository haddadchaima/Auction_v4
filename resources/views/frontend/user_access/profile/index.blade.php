@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <div class="p-b-50 pt-5">
        <div class="container">
            @include('frontend.user_access.profile.profile_main_nav')
            <div class="row">

                <div class="col-12">
                    <div class="card custom-border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 align-self-center">
                                    <!-- Profile Image -->
                                    <img src="{{ get_avatar(auth()->user()->avatar) }}" alt="{{ __('Profile Image') }}" class="img-rounded img-fluid">
                                </div>
                                <div class="col-xl-8 clearfix">
                                    <h3 class="font-weight-bold d-inline-block">{{auth()->user()->profile->full_name}}</h3>
                                    <a class="btn text-center bg-custom-gray fz-14 float-right d-inline-block custom-btn border-0" href="{{route('user-manage-profile.index')}}">{{__('Manage Profile')}}</a>
                                    <div class="mt-2 border-bottom pb-3">
                                        <span class="fz-14 color-999">{{is_null($defaultAddress) ? '' : view_html('<i class="fa fa-map-marker fz-20 color-999 mr-2"></i>' . $defaultAddress->address )}}</span>
                                    </div>
                                    @if(!is_null($defaultAddress))
                                        <div class="mt-4">
                                            <span class="color-666">
                                                {{$defaultAddress->description}}
                                            </span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-10">

                                                <!-- Start: personal information -->
                                                <div class="agent-info mb-5">
                                                    <div class="personal-info mt-4">
                                                        <ul>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-map-marker"></i>
                                                                    location :
                                                                </span>
                                                                {{$defaultAddress->city . ',' }}
                                                                {{$defaultAddress->country->name }}
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-phone"></i>
                                                                    phone :
                                                                </span>
                                                                {{$defaultAddress->phone_number}}
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-envelope"></i>
                                                                    post code :
                                                                </span>
                                                                {{$defaultAddress->post_code }}
                                                            </li>
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    Verification Status :
                                                                </span>
                                                                <span class="badge d-inline-block w-auto badge-pill pr-2 text-white font-weight-normal {{config('commonconfig.verification_status.' . ( is_null($defaultAddress) ? VERIFICATION_STATUS_UNVERIFIED  : $defaultAddress->is_verified) . '.color_class')}}"> {{( is_null($defaultAddress->address) ? '' : verification_status($defaultAddress->is_verified) )}} </span>
                                                            </li>
                                                            @if($defaultAddress && $defaultAddress->is_verified == VERIFICATION_STATUS_UNVERIFIED )
                                                                <li>
                                                                    <div class="mt-3 w-auto d-inline-block color-999"> <i class="fa fa-dot-circle-o text-secondary mr-2" aria-hidden="true"></i>
                                                                        To verify your account click :
                                                                        <a class="badge d-inline-block mx-1 text-white bg-info" href="{{route('profile-verification-with-address.store')}}">{{__('here')}}</a></div>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- End: personal information -->

                                            </div>
                                        </div>
                                    @else
                                        <div class="m-t-50 text-center">
                                            <h4 class="font-weight-normal color-666 mb-2">{{__('You have not submitted your address yet')}}</h4>
                                            <a class="btn mt-2 text-center bg-warning text-white border-0" href="{{route('user-address.create')}}">{{__('Submit Address')}}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">

                    @include('frontend.user_access.profile.profile_auction_content_nav')

                    <div class="tab-content profile-content" id="profileTabContent">
                        <div class="tab-pane fade {{is_current_route(['user-profile.index','user-profile-won-auction.index'], 'show active')}}">
                            <div class="row">

                                <div class="col-12">
                                    @component('components.card',['class' => ' border-top-0'], ['type' => 'info'])
                                        @slot('header')
                                            {{  $list['search'] }}
                                        @endslot

                                        @component('components.table',['class'=> 'cm-data-table'])
                                            @foreach($list['items'] as $key=>$auction)

                                                <!-- Start: card-->
                                                <div class="col-12">
                                                    <div class="card mt-4">
                                                        <div class="row no-gutters">
                                                            <div class="col-xl-3 align-self-center">
                                                                <div class="card-view">
                                                                    <a href="@if($auction->is_winner){{route('shipping-description.create', $auction->auction_id)}} @else {{route('auction.show', $auction->auction_id)}} @endif">
                                                                        <img class="img-fluid" src="{{auction_image($auction->images[0])}}" alt="Card image cap">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-5">
                                                                <div class="card-body py-5">
                                                                    <a href="@if($auction->is_winner){{route('shipping-description.create', $auction->auction_id)}} @else {{route('auction.show', $auction->auction_id)}} @endif">
                                                                        <h6 class="card-title font-weight-bold color-333">{{$auction->title}}</h6>
                                                                    </a>
                                                                    <div class="mb-2 fz-12">
                                                                        <i class="fa fa-user-o fz-12 mr-1" aria-hidden="true"></i> by
                                                                        <a href="{{route('seller-profile.show', $auction->seller_id)}}"
                                                                           class="text-secondary">{{$auction->seller->name}}</a>
                                                                    </div>
                                                                    <p class="card-text fz-12 color-666 text-justify">{{$auction->description}}</p>
                                                                    <p class="mt-3 text-muted">Initial Price : <span class="fz-16 ml-2 badge badge-success text-white font-weight-bold"> {{$auction->bid_initial_price}} USD </span> </p>
                                                                    <div class="mt-2">
                                                                        <!-- Start: countdown -->
                                                                        <div class="count-down">
                                                                            <div class="timer d-inline-block">
                                                                                <Timer
                                                                                    starttime="{{\Carbon\Carbon::parse($auction->started_date)->format('M d\\, Y h:i:s')}}"
                                                                                    endtime="{{\Carbon\Carbon::parse($auction->ending_date)->format('M d\\, Y h:i:s')}}"
                                                                                    trans='{
                                                                                        "day":"J",
                                                                                        "hours":"H",
                                                                                        "minutes":"M",
                                                                                        "seconds":"S",
                                                                                        "expired":"Evénement expiré.",
                                                                                        "running":"Jusqu`à la fin de l`événement.",
                                                                                        "upcoming":"Jusqu`au début de l`événement.",
                                                                                        "status": {
                                                                                            "expired":"Expiré",
                                                                                            "running":"En cours",
                                                                                            "upcoming":"Future"
                                                                                        }
                                                                                        }'
                                                                                ></Timer>
                                                                            </div>
                                                                        </div>
                                                                        <!-- End: countdown -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 winner-parent">
                                                                <div class="py-5 px-3">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item color-999 fz-13 px-0 d-flex justify-content-between align-items-center">
                                                                            Auction Type :
                                                                            <span class="badge font-weight-light text-white fz-12 {{config('commonconfig.auction_type.' . ( !is_null($auction) ? $auction->auction_type : 'Not Defined' ) . '.color_class')}}">{{ auction_type($auction->auction_type) }}</span>
                                                                        </li>
                                                                        <li class="list-group-item color-999 fz-13 px-0 d-flex justify-content-between align-items-center">
                                                                            Starting Date :
                                                                            <span class="badge color-333 border font-weight-light fz-12">{{ $auction->starting_date!==null? date('Y-m-d', strtotime($auction->starting_date)):'' }}</span>
                                                                        </li>
                                                                        <li class="list-group-item color-999 fz-13 px-0 d-flex justify-content-between align-items-center">
                                                                            Ending Date :
                                                                            <span class="badge color-333 border font-weight-light fz-12">{{ $auction->ending_date!==null? date('Y-m-d', strtotime($auction->ending_date)):'' }}</span>
                                                                        </li>
                                                                        <li class="list-group-item color-999 fz-13 px-0 d-flex justify-content-between align-items-center">
                                                                            Status :
                                                                            <span class="badge {{config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : AUCTION_STATUS_COMPLETED ) . '.color_class')}}">{{ config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : AUCTION_STATUS_COMPLETED ) . '.text')}}</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                @if($auction->is_winner)
                                                                <div class="winner-image position-absolute">
                                                                    <a href="{{route('shipping-description.create', $auction->auction_id)}}">
                                                                        <img class="img-fluid" src="{{asset('images/winner-badge.png')}}" alt="" >
                                                                    </a>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End: card-->

                                            @endforeach

                                        @endcomponent
                                        @slot('footer')
                                            {{ $list['pagination'] }}
                                        @endslot
                                    @endcomponent
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('layouts.includes.list-js')
    <script>
        new Vue({
            el:'#app'
        });
    </script>
@endsection

@section('style-top')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap4-datetimepicker/css/bootstrap-datetimepicker.css') }}">

    <style>
        .winner-parent {
            position: relative;
            overflow: hidden;
        }
        .winner-image {
            top: -10px;
            right: 40px;
            width: 60px;
            z-index: 999;
        }
    </style>
@endsection
