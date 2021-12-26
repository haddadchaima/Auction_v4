@extends('layouts.master')
@section('content')

    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="col-12">
        <div class="px-5 mx-5">
            <div class="row">

                <!-- Start: property title details -->
                <div class="col-12">
                    <div class="property-title m-b-50">

                        <!-- Start: property top -->
                        <div class="property-top mb-3">

                            <div class="row">
                                <div class="col-lg-8 col-md-12">

                                    <!-- Start: property title -->
                                    <div class="item-name"> <h3 class="color-666 font-weight-bold">{{$auction->title}}</h3></div>
                                    <!-- End: property title -->

                                    <!-- Start: property area -->
                                    <div class="property-area">
                                        <i class="fa fa-map-marker"></i>
                                        {{is_null($defaultAddress) ? '' : $defaultAddress->address}}
                                    </div>
                                    <!-- End: property area -->

                                    <!-- Start: property overview -->
                                    <div class="property-overview">
                                        <ul class="nav">
                                            <li class=" ml-0 color-999">
                                                <i class="fa fa-flag"></i>
                                                By <a href="{{route('seller-profile.show', $auction->seller_id)}}">{{ !is_null($auction->seller) ? $auction->seller->name : ''}}</a>
                                            </li>
                                            <li class=" ml-0 color-999">
                                                <i class="fa fa-list-alt"></i>
                                                {{ !is_null($auction->category) ? $auction->category->name : ''}}
                                            </li>
                                            <li class=" ml-0 color-999">
                                                <i class="fa fa-money"></i>
                                                {{ !is_null($auction->currency) ? $auction->currency->symbol : ''}}
                                            </li>
                                            <li class=" ml-0 color-999">
                                                <i class="fa fa-clock-o"></i>
                                                {{ !is_null($auction->ending_date) ? $carbon->parse($auction->ending_date)->diffForHumans() : ''}}
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End: property overview -->

                                </div>

                                <div class="col-lg-4 col-md-12">

                                    <!-- Start: property price -->
                                    <div class="property-price align-self-center text-right">
                                        <h4 class="m-b-10 font-weight-bold text-capitalize">{{__('Bid Start From')}}</h4>
                                        <div class="mb-2 color-999">
                                            <span>{{empty($auction->currency->symbol) ? '' : $auction->currency->symbol}}</span>
                                            {{$auction->bid_initial_price}}
                                        </div>
                                        <span class="badge {{config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : AUCTION_STATUS_COMPLETED ) . '.color_class')}}">{{ config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : AUCTION_STATUS_COMPLETED ) . '.text')}}</span>
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
                <div class="col-md-12 col-lg-4 order-lg-0">
                    <div class="m-md-top-50 bg-custom-gray border">

                        <!-- Start: properties slider -->
                        <div class="owl-six">

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

                        </div>
                        <!-- End: properties slider -->

                    </div>
                </div>
                <!-- End: blog grid -->

                <!-- Start: sidebar -->
                <div class="col-md-12 col-lg-8 order-lg-0">

                    <!-- Start: popular categories -->
                    <div class="s-box">

                        <!-- Start: header -->
                        <div class="s-box-header">
                            <span> {{__('Bidding')}} </span>
                            {{__('Section')}}
                        </div>
                        <!-- End: header -->

                        <!-- Start: item list -->
                        <div class="popular-cat">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        {{__('Auction Type :')}}
                                    </span>
                                    <span class="badge badge-pill {{config('commonconfig.auction_type.' . ( !is_null($auction) ? $auction->auction_type : ACTIVE_STATUS_ACTIVE ) . '.color_class')}}">{{ config('commonconfig.auction_type.' . ( !is_null($auction) ? $auction->auction_type : ACTIVE_STATUS_ACTIVE ) . '.text')}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        {{__('Multiple Bid Allowed :')}}
                                    </span>
                                    <span class="badge badge-pill {{config('commonconfig.is_multi_bid_allowed.' . ( !is_null($auction) ? $auction->is_multiple_bid_allowed : ACTIVE_STATUS_ACTIVE ) . '.color_class')}}">{{ config('commonconfig.is_multi_bid_allowed.' . ( !is_null($auction) ? $auction->is_multiple_bid_allowed : ACTIVE_STATUS_ACTIVE ) . '.text')}}</span>
                                </li>
                            </ul>
                            <ul class="list-group mt-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        {{__('Total Bids :')}}
                                    </span>
                                    <span class="badge badge-primary badge-pill">{{$auction->bids->count()}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            {{__('Bid Increment Difference :')}}
                                        </span>
                                    <span class="badge badge-primary badge-pill">{{$auction->bid_increment_dif}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            {{__('Highest Bid Amount:')}}
                                        </span>
                                    <span class="badge badge-primary badge-pill">{{$auction->bids->max('amount')}}</span>
                                </li>
                            </ul>
                            @if(!is_null($userLastBid))
                                <ul class="list-group mt-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            {{__('Your Last Bid :')}}
                                        </span>
                                        <span class="badge default-color text-white badge-pill"> <span class="mr-1">{{$auction->currency->symbol}}</span> {{$userLastBid->amount}}</span>
                                    </li>
                                </ul>
                            @endif
                        </div>
                        <!-- End: item list -->

                    </div>
                    <!-- End: popular categories -->

                </div>
                <!-- End: sidebar -->

                <!-- Start: winner card -->
                @if(!is_null($isWinner))
                <div class="col-12">
                    <!-- Start: winner info -->
                    <div class="mt-5">
                        <div class="card">
                            <div class="card-body address-card">
                                <div class="agent-info">
                                    <div class="personal-info mx-2 my-4">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <span>
                                                    <i class="fa fa-user"></i>
                                                    name :
                                                </span>
                                                {{!is_null($address) ? $address->name : ''}}
                                            </li>
                                            <li class="list-group-item">

                                                <span>
                                                    <i class="fa fa-map-marker"></i>
                                                    location :
                                                </span>
                                                {{!is_null($address) ? $address->city : ''}}
                                                {{!is_null($address) ? $address->country->name : ''}}
                                            </li>
                                            <li class="list-group-item">
                                                <span>
                                                    <i class="fa fa-phone"></i>
                                                    phone :
                                                </span>
                                                {{!is_null($address) ? $address->phone_number : ''}}
                                            </li>
                                            <li class="list-group-item">
                                                <span>
                                                    <i class="fa fa-envelope"></i>
                                                    post code :
                                                </span>
                                                {{!is_null($address) ? $address->post_code : ''}}
                                            </li>
                                            <li class="list-group-item">
                                                <span>
                                                    <i class="fa fa-check-circle"></i>
                                                    Verification Status :
                                                </span>
                                                @if(!is_null($address))
                                                    <span
                                                        class="badge d-inline-block w-auto badge-pill pr-2 text-white font-weight-normal {{config('commonconfig.verification_status.' . ( $address->is_verified !== VERIFICATION_STATUS_APPROVED ? VERIFICATION_STATUS_UNVERIFIED  : $address->is_verified) . '.color_class')}}"> {{verification_status($address->is_verified) }} </span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="default-badge">
                                    <span class="fz-26">Winner</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End: winner info -->
                </div>
                @endif
                <!-- End: winner card -->

                <!-- Start: description area -->
                <div class="col-12">
                    <!-- Start: property details body -->
                    <div class="single-blog mt-5">

                        <!-- Start: property tab -->
                        <div class="custom-profile-nav">

                            <!-- Start: tab -->
                            <nav>

                                <!-- Start: tab nav -->
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="description" data-toggle="tab" href="#descrip" role="tab" aria-controls="descrip" aria-selected="true">{{__('Product Description')}}</a>
                                    @if(!is_null($auction->terms_description))
                                        <a class="nav-item nav-link" id="features" data-toggle="tab" href="#featu" role="tab" aria-controls="featu" aria-selected="false">{{__('Term Description')}}</a>
                                    @endif
                                    <a class="nav-item nav-link" id="amenties" data-toggle="tab" href="#amenti" role="tab" aria-controls="amenti" aria-selected="false">{{__('Bidding History')}}</a>
                                </div>
                                <!-- Start: tab nav -->

                            </nav>
                            <!-- End: tab -->

                            <!-- Start: property tab body -->
                            <div class="tab-content" id="nav-tabContent">

                                <!-- Start: description body -->
                                <div class="tab-pane fade mt-4 show active" id="descrip" role="tabpanel" aria-labelledby="description">

                                    <!-- Start: description -->
                                    <div class="m-t-50">

                                        <p class="single-blog-details text-justify">
                                            {{view_html($auction->product_description)}}
                                        </p>

                                    </div>
                                    <!-- End: description -->

                                </div>
                                <!-- End: description body -->

                                <!-- Start: features body -->
                                <div class="tab-pane fade mt-4" id="featu" role="tabpanel" aria-labelledby="features">

                                    <!-- Start: features -->
                                    <div class="m-t-50">
                                        <p class="single-blog-details text-justify">
                                            {{view_html($auction->terms_description)}}
                                        </p>
                                    </div>
                                    <!-- End: features -->

                                </div>
                                <!-- End: features body -->

                                <!-- Start: amenties body -->
                                <div class="tab-pane fade" id="amenti" role="tabpanel" aria-labelledby="amenties">

                                    <!-- Start: amenties -->
                                    <div class="m-t-50">
                                        <div class="row">

                                            <!-- Start: amenties list -->
                                            <div class="col-12">
                                                @component('components.card',['type' => 'info', 'class' => 'card text-right mt-4'])

                                                    @component('components.table',['class' => 'cm-data-table '])

                                                        @slot('thead')
                                                            <tr class="bg-info text-white">
                                                                <th class="all text-left">{{ __('Serial') }}</th>
                                                                <th class="all text-left">{{ __('Details') }}</th>
                                                                <th class="min-phone-l">{{ __('Amount') }}</th>
                                                                <th class="min-phone-l">{{ __('Date') }}</th>
                                                            </tr>
                                                        @endslot

                                                        @foreach($list['items'] as $bid)
                                                            <tr>
                                                                <td class="text-left">{{ $loop->iteration }}</td>
                                                                <td class="text-left"> <span class="font-weight-bold">{{$bid->user->username}}</span></td>
                                                                <td class="text-right"> <span class="color-default font-weight-bold fz-16">{{$bid->amount}}</span> <span class="fz-12">{{!is_null($auction->currency) ? $auction->currency->symbol : ''}}</span></td>
                                                                <td class="text-right">{{$bid->created_at !== null ? $bid->created_at->diffForHumans():''}}</td>
                                                            </tr>
                                                        @endforeach

                                                    @endcomponent

                                                    @slot('footer')
                                                        {{ $list['pagination'] }}
                                                    @endslot
                                                @endcomponent
                                            </div>
                                            <!-- End: amenties list -->

                                        </div>
                                    </div>
                                    <!-- End: amenties -->

                                </div>
                                <!-- End: amenties body -->

                            </div>
                            <!-- End: property tab body -->

                        </div>
                        <!-- End: property tab -->

                        <!-- Start: comment section -->
                        <div class="mt-5">

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
                                    <h6><i class="fa fa-comment-o"></i> {{('No Comment Available')}}</h6>
                                </span>
                        @endif
                        <!-- End: single comment -->

                        </div>
                        <!-- End: comment section -->

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

    <script>
        $(document).ready(function () {
            if($('#sync1, #sync2').length>0){

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
                    .on('initialized.owl.carousel', function() {
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

                sync2.on("click", ".owl-item", function(e) {
                    e.preventDefault();
                    var number = $(this).index();
                    sync1.data('owl.carousel').to(number, 300, true);
                });

            }
        })

    </script>
@endsection

@section('style-top')
    <link rel="stylesheet" href="{{asset('css/auction_view_backend.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">

    <style>
        .property-title .property-overview {
            margin-top: 15px; }
        .property-title .property-overview ul li {
            margin-right: 30px;
            text-transform: capitalize; }
        .property-title .property-overview ul li i {
            color: #ff214f !important;
            font-size: 16px !important;
            margin-right: 5px; }
        .property-title .property-overview ul li:last-child {
            margin-right: 0; }
    </style>
@endsection

