@extends('frontend.layouts.master')
@section('content')

    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="p-b-100 p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('layouts.includes.breadcrumb')
                </div>
                <!-- Start: property title details -->
                <div class="col-12">
                    <div class="property-title m-b-50">

                        <!-- Start: property top -->
                        <div class="property-top">

                            <div class="row">
                                <div class="col-lg-8 col-md-12">

                                    <!-- Start: property title -->
                                    <div class="item-name">{{$auction->title}}</div>
                                    <!-- End: property title -->

                                    <!-- Start: property area -->
                                    <div class="property-area">
                                        <i class="fa fa-map-marker"></i>
                                        {{!is_null($auction->seller->user->profile) ? $auction->seller->user->profile->address : ''}}
                                    </div>
                                    <!-- End: property area -->

                                    <div class="property-area text-uppercase">
                                        <i class="fa fa-th-large" aria-hidden="true"></i>
                                        Reference ID :
                                        {{$auction->ref_id}}
                                    </div>

                                    <!-- Start: property overview -->
                                    <div class="property-overview mt-1">
                                        <ul class="nav">
                                            <li class="color-999">
                                                <i class="fa fa-flag"></i>
                                                By <a
                                                    href="{{route('seller-profile.show', $auction->seller_id)}}">{{ !is_null($auction->seller) ? $auction->seller->name : ''}}</a>
                                            </li>
                                            <li class="color-999">
                                                <i class="fa fa-list-alt"></i>
                                                {{ !is_null($auction->category) ? $auction->category->name : ''}}
                                            </li>
                                            <li class="color-999">
                                                <i class="fa fa-money"></i>
                                                {{ !is_null($auction->currency) ? $auction->currency->symbol : ''}}
                                            </li>
                                            <li class="color-999">
                                                <i class="fa fa-clock-o"></i>
                                                <!-- auction session -->
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End: property overview -->

                                </div>

                                <div class="col-lg-4 col-md-12">

                                    <!-- Start: property price -->
                                    <div class="property-price align-self-center">
                                        <h4 class="m-b-10 font-weight-bold text-capitalize">{{__('Bid Start From')}}</h4>
                                        <div class="mb-2 color-999">

                                    @if($auction->aff_prix_reserve>0)
                                        {{$auction->bid_initial_price}} <span>{{empty($auction->currency->symbol) ? '' : $auction->currency->symbol}}</span>
                                    @else
                                         <span>{{empty($auction->currency->symbol) ? '' : $auction->currency->symbol}}</span>
                                    @endif
                                        </div>
                                        <span
                                            class="badge {{config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : AUCTION_STATUS_COMPLETED ) . '.color_class')}}">{{ config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : AUCTION_STATUS_COMPLETED ) . '.text')}}</span>
                                            @if($auction->status == AUCTION_STATUS_UPCOMING)
                                                <span class="text-secondary"> {{$auction->starting_date}} </span>
                                            @endif
                                    </div>
                                    <!-- End: property price -->

                                </div>
                            </div>

                        </div>
                        <!-- End: property top -->

                    </div>
                </div>
                <!-- End: property title details -->

                <!-- Start: blog grid -->
                <div class="col-md-12 col-lg-7 order-lg-0">
                    <div class="m-md-top-50 bg-custom-gray border">

                        <!-- Start: properties slider -->
                        <div class="owl-six position-relative">

                            <!-- Start: main image -->
                            <div id="sync1" class="owl-carousel owl-theme">
                                @include('layouts.includes.slider_image')
                            </div>
                            <!-- End: main image -->

                            <!-- Start: image nav -->
                            <div id="sync2" class="owl-carousel owl-six-2 owl-theme">
                                @include('layouts.includes.slider_image')
                            </div>
                            <!-- End: image nav -->

                            <div class="dispute-link position-absolute">
                                <a class="flex-sm-fill text-sm-center nav-link p-0" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="fa fa-th-list icon-round"></i>
                                </a>
                                <div class="address-dropdown-menu">
                                    <div class="dropdown-menu  drop-menu dropdown-menu-right">
                                        <a class="p-2 d-block"
                                           href="{{route('disputes.specific', [DISPUTE_TYPE_AUCTION_ISSUE, $auction->ref_id])}}">
                                            {{__('Report Auction')}}
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End: properties slider -->

                    </div>
                </div>
                <!-- End: blog grid -->

                <!-- Start: bidding section -->
                <div class="col-md-12 col-lg-5 order-lg-0  ">

                    @if($auction->status == AUCTION_STATUS_RUNNING)
                    @if(isset($auction->ending_date))
                        @if(isset($currentSession->session_date))
                        <div class="s-box mb-3">
                            <!-- Start: header -->
                            <div class="s-box-header">
                                <span> {{__('Ends')}} </span>
                                {{__('In')}}
                            </div>

                            <!-- End: header -->
                            <!-- Start: countdown -->
                            <div class="count-down">
                                <div id="timer" class="timer d-inline-block">
                                    <Timer
                                        starttime="{{\Carbon\Carbon::parse($auction->starting_date)->format('M d\\, Y H:i:s')}}"
                                        endtime="{{\Carbon\Carbon::parse($currentSession->session_date)->format('M d\\, Y H:i:s')}}"
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
                        @elseif(!isset($auction->nbr_stock))
                        <div class="s-box mb-3">
                            <!-- Start: header -->
                            <div class="s-box-header">
                                <span> {{__('Ends')}} </span>
                                {{__('In')}}
                            </div>

                            <!-- End: header -->
                            <!-- Start: countdown -->
                            <div class="count-down">
                                <div id="timer" class="timer d-inline-block">
                                    <Timer
                                        starttime="{{\Carbon\Carbon::parse($auction->starting_date)->format('M d\\, Y H:i:s')}}"
                                        endtime="{{\Carbon\Carbon::parse($auction->ending_date)->format('M d\\, Y H:i:s')}}"
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
                        @endif
                        @elseif(isset($auction->time_waiting_bid))
                        <div class="s-box mb-3"  id="countdown"></div>
                        @endif
                    @endif



                    <!-- Start: bidding section -->
                    <div class="s-box mt-2">
                        <!-- Start: header -->
                        <div class="s-box-header">
                            <span> {{__('Detail')}} </span>
                            {{__('Auction')}}
                        </div>
                        <!-- End: header -->
                        <!-- Start: item list -->
                        <div id="ulAuction" class="popular-cat">
                            <!--<ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        {{__('Auction Type :')}}
                                    </span>
                                    <span
                                        class="badge badge-pill {{config('commonconfig.auction_type.' . ( !is_null($auction) ? $auction->auction_type : ACTIVE_STATUS_ACTIVE ) . '.color_class')}}">{{ config('commonconfig.auction_type.' . ( !is_null($auction) ? $auction->auction_type : ACTIVE_STATUS_ACTIVE ) . '.text')}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        {{__('Multiple Bid Allowed :')}}
                                    </span>
                                    <span
                                        class="badge badge-pill {{config('commonconfig.is_multi_bid_allowed.' . ( !is_null($auction) ? $auction->is_multiple_bid_allowed : ACTIVE_STATUS_ACTIVE ) . '.color_class')}}">{{ config('commonconfig.is_multi_bid_allowed.' . ( !is_null($auction) ? $auction->is_multiple_bid_allowed : ACTIVE_STATUS_ACTIVE ) . '.text')}}</span>
                                </li>
                            </ul>!-->
                            <ul id="liAuction" class="list-group mt-3" >

                                @if($auction->status == AUCTION_STATUS_RUNNING)
                                    @if($auction->auction_type != AUCTION_TYPE_UNIQUE_BIDDER && $auction->auction_type != AUCTION_TYPE_VICKREY_AUCTION)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>
                                                {{__('Bid Increment Difference :')}}
                                            </span>
                                            <span
                                                class="badge badge-primary badge-pill"> {{$auction->bid_increment_dif}} <span class="font-weight-normal"> {{$auction->currency->symbol}}</span></span>
                                        </li>
                                    @endif
                                @endif
                                @if($auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER && settings('bidding_fee_on_highest_bidder_auction') > 0)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            {{__('Bidding Fee :')}}
                                        </span>
                                        <span
                                            class="badge badge-primary badge-pill"><span class="font-weight-normal"> {{$auction->currency->symbol}}</span> {{settings('bidding_fee_on_highest_bidder_auction')}}</span>
                                    </li>
                                @elseif($auction->auction_type == AUCTION_TYPE_BLIND_BIDDER && settings('bidding_fee_on_blind_bidder_auction') > 0)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            {{__('Bidding Fee :')}}
                                        </span>
                                        <span
                                            class="badge badge-primary badge-pill"><span class="font-weight-normal"> {{$auction->currency->symbol}}</span><span class="font-weight-normal"> {{$auction->currency->symbol}}</span> {{settings('bidding_fee_on_blind_bidder_auction')}}</span>
                                    </li>
                                @elseif($auction->auction_type == AUCTION_TYPE_UNIQUE_BIDDER && settings('bidding_fee_on_unique_bidder_auction') > 0)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            {{__('Bidding Fee :')}}
                                        </span>
                                        <span
                                            class="badge badge-primary badge-pill"><span class="font-weight-normal"> {{$auction->currency->symbol}}</span> {{settings('bidding_fee_on_unique_bidder_auction')}}</span>
                                    </li>
                                @elseif($auction->auction_type == AUCTION_TYPE_VICKREY_AUCTION && settings('bidding_fee_on_vickrey_bidder_auction') > 0)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            {{__('Bidding Fee :')}}
                                        </span>
                                        <span
                                            class="badge badge-primary badge-pill"><span class="font-weight-normal"> {{$auction->currency->symbol}}</span><span class="font-weight-normal"> {{$auction->currency->symbol}}</span> {{settings('bidding_fee_on_vickrey_bidder_auction')}}</span>
                                    </li>
                                @endif
                                @if($auction->status == AUCTION_STATUS_RUNNING)
                                    @if(count($auction->bids) > 0 && $auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER)
                                        <li id="liHighestBid" class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>
                                                {{__('Highest Bid Amount:')}}
                                            </span>
                                            <span id="highestBid"
                                                class="badge badge-primary badge-pill"> {{$auction->bids->max('amount')}} <span class="font-weight-normal"> {{$auction->currency->symbol}}</span></span>
                                        </li>
                                    @endif
                                @elseif($auction->status == AUCTION_STATUS_UPCOMING)
                                    @if($auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER)
                                        @if($auction->gratuit != 1)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>
                                                    {{__('Total Inscription :')}}
                                                </span>
                                                <!--TODO  !-->
                                                <span class="badge badge-primary badge-pill">{{$auction->bids->count()}}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>
                                                    {{__('Number of Required Inscription:')}}
                                                </span>
                                                <span
                                                    class="badge badge-primary badge-pill"> {{$auction->nbr_inscripteur_requise}} </span>
                                            </li>

                            <div class="list-group mt-3" id="containerOpen">
                                <div class="list-group-item py-4">

                                    @if($auction->gratuit == 0)
                                        @if (auth()->user()->role_id == USER_ROLE_USER)
                                        <button onclick="location.href = '../login'"
                                            class="btn custom-btn w-100 float-right has-spinner" >{{__('Inscription')}} {{$auction->frais_inscription}} {{$auction->currency != null ? $auction->currency->symbol : ''}}</button>
                                        @endif

                                        @if (auth()->user()->role_id == USER_ROLE_SELLER)
                                            <a href = "{{route('auction.open', $auction->id)}}"
                                            class="btn btn-primary w-100 float-right has-spinner p-2" >{{__('Open Auction')}}</a>
                                        @endif

                                    @endif

                                </div>
                            </div>
                                        @else
                                                <span>
                                                    {{__('This Auction is upcoming ...')}}
                                                </span>
                                        @endif
                                    @endif
                                @endif
                            </ul>
                            @auth
                            @if($auction->status == AUCTION_STATUS_RUNNING)
                                @if(!is_null($userLastBid))
                                    <ul class="list-group mt-3">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>
                                                {{__('Your Last Bid :')}}
                                            </span>
                                            <span id="lastBid" class="badge border color-666 badge-pill"> {{$userLastBid->amount}} <span class="mr-1 font-weight-normal">{{$auction->currency->symbol}}</span></span>
                                        </li>
                                    </ul>
                                @endif
                            @endif
                            @endauth

                            @if($auction->status == AUCTION_STATUS_RUNNING)
                                <ul id="ulNextMinBid" class="list-group mt-3">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="font-weight-bold color-666">
                                                {{__('Next Minimum Bid Amount :')}}
                                            </span>

                                            <span id="minBidAmount" class="badge bg-warning text-white badge-pill">
                                            @if(count($auction->bids) > 0 && $auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER)
                                                {{$highestBid->amount + $auction->bid_increment_dif}} <span class="mr-1 font-weight-normal">{{$auction->currency->symbol}}</span>
                                            @elseif($auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER)
                                                {{$auction->bid_initial_price}} <span class="mr-1 font-weight-normal">{{$auction->currency->symbol}}</span>
                                            </span>
                                            @endif
                                        </li>
                                </ul>
                            @endif

                            @if($auction->auction_type == AUCTION_TYPE_BLIND_BIDDER)
                                <ul class="list-group mt-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold color-666">
                                            {{__('Minimum Bid Amount :')}}
                                        </span>
                                        <span class="badge bg-warning text-white badge-pill"> <span class="mr-1 font-weight-normal">{{$auction->currency->symbol}}</span>{{$auction->bid_initial_price}}</span>
                                    </li>
                                </ul>
                            @endif

                            @if($auction->auction_type == AUCTION_TYPE_UNIQUE_BIDDER)
                                <ul class="list-group mt-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold color-666">
                                            {{__('Minimum Bid Amount :')}}
                                        </span>
                                        <span class="badge bg-warning text-white badge-pill"> <span class="mr-1 font-weight-normal">{{$auction->currency->symbol}}</span>{{$auction->bid_initial_price}}</span>
                                    </li>
                                </ul>
                            @endif

                            @if($auction->auction_type == AUCTION_TYPE_VICKREY_AUCTION)
                                <ul class="list-group mt-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="font-weight-bold color-666">
                                            {{__('Minimum Bid Amount :')}}
                                        </span>
                                        <span class="badge bg-warning text-white badge-pill"> <span class="mr-1 font-weight-normal">{{$auction->currency->symbol}}</span>{{$auction->bid_initial_price}}</span>
                                    </li>
                                </ul>
                            @endif

                        </div>
                        <!-- End: item list -->

                        @auth
                        @if($auction->status == AUCTION_STATUS_RUNNING)

                                <div id="containerAmount" class="list-group mt-3">
                                    <div class="list-group-item py-4">
                                        {{ Form::open(['route'=>['bid.store', $auctionId],'class'=>'form-horizontal cvalidate', 'id'=> 'bidAmountForm']) }}
                                        @method('post')
                                        @basekey

                                        @if(isset($auction->time_waiting_bid))

                                        <div id="bidAmount" class="form-group ">
                                        <ul class="list-group mt-1" >
                                        <li class="list-group-item d-flex justify-content-between align-items-center" >
                                            @if(count($auction->bids) > 0 && $auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER)
                                                <span class="font-weight-bold color-666">{{__('Last Bid :')}}</span>
                                                <span class="badge bg-warning text-white badge-pill"> <span id="amountspan" class="mr-1 font-weight-normal" >
                                                {{$highestBid->amount + $auction->bid_increment_dif }} </span>
                                                {{$auction->currency->symbol}}</span>
                                                <input type="hidden" id="amountHidden" name="{{fake_field('amount')}}"  value="{{$highestBid->amount + $auction->bid_increment_dif }}">
                                            @else
                                                <span class="font-weight-bold color-666"> {{__('First Bid :')}}</span>
                                                <span class="badge bg-warning text-white badge-pill"> <span id="amountspan" class="mr-1 font-weight-normal">
                                                {{$auction->bid_initial_price + $auction->bid_increment_dif }} </span>
                                                {{$auction->currency->symbol}}</span>
                                                <input type="hidden" id="amountHidden" name="{{fake_field('amount')}}"  value="{{$auction->bid_initial_price + $auction->bid_increment_dif }}">
                                            @endif
                                            </li>
                                            </ul>
                                            <div class="mt-2">
                                        <button form="bidAmountForm"
                                                class="btn custom-btn w-100 float-right has-spinner"
                                                id="two">{{__('Bid Your Amount')}}</button>
                                            </div>

                                        @else
                                                <!-- Start: auction main content -->
                                            <div id="bidAmount" class="form-group">
                                                <span class="d-flex justify-content-center">
                                                    <span class="input-number-decrement">–</span>
                                                    @if(count($auction->bids) > 0 && $auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER)
                                                    {{ Form::text(fake_field('amount'), ($highestBid->amount + $auction->bid_increment_dif), ['class' => 'input-number color-666 amount-class', 'id' => 'amount', 'min'=>$highestBid->amount + $auction->bid_increment_dif]) }}
                                                    @else
                                                    {{ Form::text(fake_field('amount'), ($auction->bid_initial_price + $auction->bid_increment_dif), ['class' => 'input-number color-666', 'id' => 'amount', 'min'=>'1']) }}
                                                    @endif
                                                    <span class="input-number-increment">+</span>
                                                </span>
                                                <span class="invalid-feedback cval-error d-block" data-cval-error="{{ fake_field('amount') }}">{{ $errors->first('amount') }}</span>
                                            </div>
                                            <!-- End: auction main content -->


                                            <button form="bidAmountForm"
                                                class="btn custom-btn w-100 float-right has-spinner"
                                                id="two">{{__('Bid Your Amount')}}</button>
                                            @endif
                                        {{ Form::close() }}
                                    </div>
                                </div>
                        @endif
                        @else
                            <div class="list-group mt-3">
                                    <button onclick="location.href = '../login'"
                                            class="btn custom-btn w-100 float-right has-spinner" >{{__('Inscription')}} {{$auction->frais_inscription}} {{$auction->currency != null ? $auction->currency->symbol : ''}}</button>
                            </div>

                        @endauth
                    </div>
                    <!-- End: bidding section -->

                </div>
                <!-- End: bidding section -->

                @auth
                <!-- Start: Winner info -->
                @if(!is_null($auction->address_id) && auth()->user()->seller ? $auction->seller_id == auth()->user()->seller->id : false && $auction->status != AUCTION_STATUS_RUNNING)
                    <div class="col-lg-12">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5 class="color-666 mb-3">{{__('Winner Address :')}}</h5>

                                <!-- Start: address card -->
                                <div class="card">
                                    <div class="card-body address-card winner-parent">

                                        <div class="agent-info">
                                            <div class="personal-info mx-2 my-4">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-user justify-content-center"></i>
                                                            {{__('name :')}}
                                                        </span>
                                                        {{$address->name}}
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-map-marker"></i>
                                                            {{__('location :')}}
                                                        </span>
                                                        {{$address->city}}
                                                        {{$address->country->name}}
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-phone"></i>
                                                            {{__('phone :')}}
                                                        </span>
                                                        {{$address->phone_number}}
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-envelope"></i>
                                                            {{__('post code :')}}
                                                        </span>
                                                        {{$address->post_code}}
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <i class="fa fa-check-circle"></i>
                                                            {{__('Verification Status :')}}
                                                        </span>

                                                        <span
                                                            class="badge d-inline-block w-auto badge-pill pr-2 text-white font-weight-normal {{config('commonconfig.verification_status.' . ( $address->is_verified !== VERIFICATION_STATUS_APPROVED ? VERIFICATION_STATUS_UNVERIFIED  : $address->is_verified) . '.color_class')}}"> {{verification_status($address->is_verified) }} </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if($address->is_default == ACTIVE_STATUS_ACTIVE)
                                            <div class="default-badge">
                                                {{$address->is_default == ACTIVE_STATUS_ACTIVE ? __('Default Address') : ''}}
                                            </div>
                                        @endif
                                        <div class="winner-image position-absolute">
                                            <img class="img-fluid" src="{{asset('images/winner-badge.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <!-- End: address card -->

                                <!-- Start: shipping instruction -->
                                <div class="m-4">
                                    <h5 class="color-666 border-bottom pb-3">{{__('Shipping instruction :')}}</h5>
                                    <p class="mt-3">{{$auction->shipping_description}}</p>
                                </div>
                                <!-- End: shipping instruction -->

                                <div class="m-4">
                                    <h5 class="color-666 mb-3">{{__('Shipping Status :')}}</h5>
                                    <span
                                        class="badge badge-pill {{config('commonconfig.product_claim_status.' . ( !is_null($auction) ? $auction->product_claim_status : '' ) . '.color_class')}}">{{ config('commonconfig.product_claim_status.' . ( !is_null($auction) ? $auction->product_claim_status : '' ) . '.text')}}</span>

                                    @if($auction->product_claim_status == AUCTION_PRODUCT_CLAIM_STATUS_NOT_DELIVERED_YET)
                                        <h5 class="color-666 mt-4">{{__('Please Submit Delivery date :')}}</h5>
                                        <span
                                            class="color-999 d-block fz-12">{{__('Expected date of Product receiving')}}</span>
                                        {{ Form::open(['route'=>['update-shipping-status.update',$auction->id],'class'=>'form-horizontal cvalidate', 'files' => true]) }}
                                        @method('put')
                                        @basekey

                                        <!-- Start: delivery date -->
                                        <div class="form-row mt-3">
                                            <div class="col-md-4">
                                                {{ Form::text(fake_field('delivery_date'), old('delivery_date'), ['class'=> 'form-control datepicker', 'id' => fake_field('delivery_date'),'data-cval-name' => 'The delivery_date field','data-cval-rules' => 'required|decimal', 'placeholder' => __('Starting Date')]) }}
                                                <span class="invalid-feedback cval-error"
                                                      data-cval-error="{{ fake_field('delivery_date') }}">{{ $errors->first('delivery_date') }}</span>
                                            </div>
                                        </div>
                                        <!-- End: delivery date -->

                                        <button type="submit" class="btn btn-info mt-3">{{__('Submit Date')}}</button>

                                        {{ Form::close() }}
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
                <!-- End: Winner info -->
                @endauth

                <!-- Start: description area -->
                <div class="col-12">
                    <!-- Start: property details body -->
                    <div class="single-blog m-t-50">

                        <!-- Start: property tab -->
                        <div class="custom-profile-nav">

                            <!-- Start: tab -->
                            <nav>

                                <!-- Start: tab nav -->
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="description" data-toggle="tab"
                                       href="#descrip" role="tab" aria-controls="descrip"
                                       aria-selected="true">{{__('Product Description')}}</a>
                                    @if(!is_null($auction->terms_description))
                                        <a class="nav-item nav-link" id="features" data-toggle="tab" href="#featu"
                                           role="tab" aria-controls="featu"
                                           aria-selected="false">{{__('Term Description')}}</a>
                                    @endif
                                    @auth
                                    @if($auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER)
                                        <a class="nav-item nav-link" id="amenties" data-toggle="tab" href="#amenti"
                                           role="tab" aria-controls="amenti"
                                           aria-selected="false">{{__('Bidding History')}}</a>
                                    @endif
                                    @endauth
                                </div>
                                <!-- Start: tab nav -->

                            </nav>
                            <!-- End: tab -->

                            <!-- Start: property tab body -->
                            <div class="tab-content" id="nav-tabContent">

                                <!-- Start: description body -->
                                <div class="tab-pane fade show active" id="descrip" role="tabpanel"
                                     aria-labelledby="description">

                                    <!-- Start: description -->
                                    <div class="m-t-50">

                                        <p class="single-blog-details text-justify">
                                            {{view_html($auction->product_description)}}
                                        </p>

                                    </div>
                                    <!-- End: description -->

                                </div>
                                <!-- End: description body -->

                            @if(!is_null($auction->terms_description))
                                <!-- Start: features body -->
                                    <div class="tab-pane fade" id="featu" role="tabpanel" aria-labelledby="features">

                                        <!-- Start: features -->
                                        <div class="m-t-50">
                                            <p class="single-blog-details text-justify">
                                                {{view_html($auction->terms_description)}}
                                            </p>
                                        </div>
                                        <!-- End: features -->

                                    </div>
                                    <!-- End: features body -->
                            @endif

                            @auth()
                            @if($auction->auction_type == AUCTION_TYPE_HIGHEST_BIDDER)
                                <!-- Start: amenties body -->
                                    <div class="tab-pane fade" id="amenti" role="tabpanel" aria-labelledby="amenties">

                                        <!-- Start: amenties -->
                                        <div class="m-t-50">
                                            <div class="row">

                                                <!-- Start: amenties list -->
                                                <div class="col-12">
                                                    @include('layouts.includes.bidding_list')
                                                </div>
                                                <!-- End: amenties list -->

                                            </div>
                                        </div>
                                        <!-- End: amenties -->

                                    </div>
                                    <!-- End: amenties body -->
                                @endif
                            @endauth

                            </div>
                            <!-- End: property tab body -->

                        </div>
                        <!-- End: property tab -->

                        @auth
                        <!-- Start: comment section -->
                        <div class="m-t-50">

                            <!-- Start: total comment -->
                            <div class="single-comment-amount mb-4">
                                {{__('Comments')}}
                            </div>
                            <!-- End: total comment -->

                            <!-- Start: single comment -->
                            @if(count($comments) > 0)
                                @include('layouts.includes.comment_index')
                            @else
                                <span class="color-666">
                                    <h6><i class="fa fa-comment-o"></i> {{__('No Comment Available')}}</h6>
                                </span>
                            @endif
                            <!-- End: single comment -->

                            <!-- Start: total comment -->
                            <div class="single-comment-amount text-capitalize mt-5 mb-4">
                                {{__('add comment')}}
                            </div>
                            <!-- End: total comment -->

                            <!-- Start: comment form -->
                        @include('layouts.includes.comment_form')
                        <!-- Start: comment form -->

                        </div>
                        <!-- End: comment section -->
                        @endauth

                    </div>
                    <!-- End: property details body -->
                </div>
                <!-- End: description area -->

            </div>
        </div>
    </div>
    <!-- ::::::::::::::::::::::::END PAGE HEAD ::::::::::::::::::::::::: -->

@endsection

@section('script')
    <script src="{{ asset('frontend/assets/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('vendor/moment.js/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap4-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script type="text/javascript">
    var frm = $('#bidAmountForm');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                console.log('Submission was successful.');
                // console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                // console.log(data);
            },
         });
        });
    </script>

    <script>
        /*** Open or Close Auction Bid ***/

        Echo.channel('open-close-auction')
            .listen('OpenCloseAuctionEvent', (e) => {
                console.log(e);
                if(e.auction.id == {!! json_encode($auction->id, JSON_HEX_TAG) !!}){
                    window.location.reload();
                    // if(e.auction.status == AUCTION_STATUS_COMPLETED){
                    //     $("#containerAmount").hide();
                    // }else if(e.auction.status == AUCTION_STATUS_RUNNING){
                    //     $("#containerAmount").show();
                    //     $("#containerOpen").hide();
                    // }
                }
            })
    </script>

    <script>

    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            @if($auction->bids->count() > 0)
            if({!! json_encode($auction->time_waiting_bid, JSON_HEX_TAG) !!} >= {!! json_encode($trueTimer, JSON_HEX_TAG) !!} ){
                if(document.getElementById("countdown") != null){
                    document.getElementById("countdown").style.display = 'block';
                    startTimer({!! json_encode($trueTimer, JSON_HEX_TAG) !!});
                    // clearInterval(timerInterval);
                }
            }else{
                if(document.getElementById("countdown") != null){
                document.getElementById("countdown").style.display = 'none';
                }
            }
            @else
                if(document.getElementById("countdown") != null){
                document.getElementById("countdown").style.display = 'none';
                }
            @endif

            let user = @json(auth()->user());
            $('.cvalidate').cValidate();
            //Init jquery Date Picker
            $('.datepicker').datetimepicker({
                format: 'YYYY-MM-DD',
            });
            $('.toggle').click(function () {
                $('#target').toggle();
            });

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items: 1,
                autoplayTimeout: 7000,
                smartSpeed: 2000,
                nav: false,
                autoplay: true,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200,
            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function () {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: false,
                    autoplayTimeout: 7000,
                    smartSpeed: 2000,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);

            sync2.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }


            var totalBids = <?= $auction->bids->count() + 1 ?> ;

            Echo.channel('auction-bid')
                .listen('BroadcastAuctionBid', (response) => {
                    console.log("res: ", response.data.timerBid , response) ;
                    if (response) {
                        if({!! json_encode( $auction->id, JSON_HEX_TAG) !!} === response.bid.auction_id){
                        totalBids = response.nbrBid   ;

                        $("#ulMinBid").hide();
                        // $("#ulNextMinBid").show();
                        // $("#liHighestBid").show();
                        @if(!is_null($userLastBid))
                        if({!! json_encode( $userLastBid->user_id, JSON_HEX_TAG) !!} == response.bid.user_id){
                        $("#lastBid").html(response.bid.amount + ' <span class="mr-1 font-weight-normal">'+  response.currency +'</span>');
                        }
                        @endif
                        $("#highestBid").html(response.bid.amount + ' <span class="font-weight-normal">'+  response.currency +'</span>');

                        $("#totalBids").html(totalBids);
                        $("#minBidAmount").html((response.bid.amount + {!! json_encode( $auction->bid_increment_dif, JSON_HEX_TAG) !!} ) + ' <span class="font-weight-normal">'+  response.currency +'</span>');
                        $("#amount").val((response.bid.amount + {!! json_encode( $auction->bid_increment_dif, JSON_HEX_TAG) !!} ));
                        $("#amountHidden").val((response.bid.amount + {!! json_encode( $auction->bid_increment_dif, JSON_HEX_TAG) !!} ));
                        $("#amountspan").html((response.bid.amount + {!! json_encode( $auction->bid_increment_dif, JSON_HEX_TAG) !!} ));

                        console.log("total bids:" + {!! json_encode( $auction, JSON_HEX_TAG) !!} + " "+ response.bid.user_id);
                        if(totalBids == 1)
                        {
                            $("#liAuction").append(`<li id="liHighestBid" class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>
                                                {{__('Highest Bid Amount:')}}
                                            </span>
                                            <span id="highestBid"
                                                class="badge badge-primary badge-pill"> ${ response.bid.amount } <span class="font-weight-normal"> {{$auction->currency->symbol}}</span></span>
                                        </li>`)

                            // $("#").append(``);
                            $("#ulAuction").append(`<ul id="appended" class="list-group mt-3"> <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>
                                                {{__('Your Last Bid :')}}
                                            </span>
                                            <span id="lastBid" class="badge border color-666 badge-pill"> ${ response.bid.amount } <span class="mr-1 font-weight-normal">{{$auction->currency->symbol}}</span></span>
                                        </li>
                                    </ul>`)

                        }

                        $("#bid tbody").prepend( `
                                <tr>
                                <td id="bidDate" class="text-left">${ response.bid.created_at }</td>
                                @if(!is_null(auth()->user()->seller) ? $auction->seller_id == auth()->user()->seller->id : false)
                                    <td>${response.data.user.username}</td>
                                @endif
                                <td class="text-right font-weight-bold">

                                        <span id="myBid" class="badge-success py-1 px-2 badge-pill fz-10 mr-2">{{ __('My Bid') }}</span>

                                    <span id="bidAmount" class="color-default fz-16">${ response.bid.amount }</span>
                                    <span id="bidCurrency" class="fz-12">{{!is_null($auction->currency) ? $auction->currency->symbol : ''}}</span>
                                </td>
                                </tr>
                                `)


                        @if(isset($auction->time_waiting_bid))
                            document.getElementById("countdown").style.display = 'block';
                            clearInterval(timerInterval);
                            startTimer(response.data.timerBid);
                        @endif

                        }
                    }
                });
        });


var intervalTrueTimer = null ;

const FULL_DASH_ARRAY = 273;
const WARNING_THRESHOLD = 15;
const ALERT_THRESHOLD = 10;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = {!! json_encode( $auction->time_waiting_bid, JSON_HEX_TAG) !!};
var timePassed = 0;
let data = "";

let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("countdown").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;


        function onTimesUp() {
        clearInterval(timerInterval);
        }

         function startTimer(trueTime) {

            timerInterval = setInterval(() => {
            // timePassed = trueTime ;
            trueTime = trueTime += 1;
            timeLeft = TIME_LIMIT - trueTime;
            console.log("timeLeft: ", timeLeft);
            document.getElementById("base-timer-label").innerHTML = formatTime(
            timeLeft
            );
            setCircleDasharray();
            setRemainingPathColor(timeLeft) ;
            // if(trueTime == TIME_LIMIT){
            //     clearInterval(this.intervalTrueTimer);
            // }
            if (timeLeft === 0) {
                onTimesUp();
            }
        }, 1000);
        }


        function formatTime(time) {
        const minutes = Math.floor(time / 60);
        let seconds = time % 60;

        if (seconds < 10) {
            seconds = `0${seconds}`;
        }

        return `${minutes}:${seconds}`;
        }

        function setRemainingPathColor(timeLeft) {
        const { alert, warning, info } = COLOR_CODES;
        if (timeLeft <= alert.threshold) {
            document
            .getElementById("base-timer-path-remaining")
            .classList.remove(warning.color);
            document
            .getElementById("base-timer-path-remaining")
            .classList.add(alert.color);
        } else if (timeLeft <= warning.threshold) {
            document
            .getElementById("base-timer-path-remaining")
            .classList.remove(info.color);
            document
            .getElementById("base-timer-path-remaining")
            .classList.add(warning.color);
        }
        }

        function calculateTimeFraction() {
        const rawTimeFraction = timeLeft / TIME_LIMIT;
        return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
        }

        function setCircleDasharray() {
        const circleDasharray = `${(
            calculateTimeFraction() * FULL_DASH_ARRAY
        ).toFixed(0)} 283`;
        document
            .getElementById("base-timer-path-remaining")
            .setAttribute("stroke-dasharray", circleDasharray);
        }



    </script>




@endsection

@section('style-top')
    @include('layouts.includes.list-css')
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/table_replace.css')}}">

    <style>

        .agent-info .personal-info ul li span {
            width: 40%;
        }

        .dispute-link {
            right: 10px;
            top: 10px;
            z-index: 99;
            font-size: 14px;
            color: #666;
            border-radius: 40px;
            background: rgba(255, 255, 255, .8);
        }

        .dispute-link a {
            font-size: 14px;
            color: #666;
        }

        .dispute-link .drop-menu.show {
            width: 190px !important;
        }

        #target {
            display: none;
        }

        .Hide {
            display: none;
        }

        .address-dropdown {
            top: 0;
            right: 0;
        }

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

        .timer {
            display: flex !important;
            justify-content: center;
        }
    </style>

    <style>

    body {
  font-family: sans-serif;
  display: grid;
  height: 100vh;
  place-items: center;

}

.base-timer {

  position: relative;
  width: 300px;
  height: 300px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;

}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 300px;
  height: 300px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
}
    </style>

@endsection

