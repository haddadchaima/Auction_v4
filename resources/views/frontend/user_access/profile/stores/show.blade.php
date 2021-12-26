@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <div class="p-b-50 pt-5">
        <div class="container">

            <div class="row">

                <div class="col-12">
                    <div class="card custom-border position-relative">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <!-- Profile Image -->
                                    <img src="{{ get_avatar($seller->image) }}" alt="{{ __('Profile Image') }}"
                                         class="img-rounded img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <h3 class="font-weight-bold d-inline-block">{{$seller->name}}</h3>
                                    @if(!is_null($isAddressVerified))
                                        <i class="fa fa-check-circle text-success d-inline-block fz-26 ml-1"></i>
                                    @endif
                                    <div class="mt-2 border-bottom pb-3">
                                        <span
                                            class="fz-14 color-999">{{view_html($isAddressVerified ? '<i class="fa fa-map-marker fz-20 color-999 mr-2"></i>' . $isAddressVerified->address : '')}}</span>
                                    </div>
                                    <div class="mt-4">
                                        <span class="color-666">
                                            {{$seller->description}}
                                        </span>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-10">

                                            <!-- Start: personal information -->
                                            <div class="agent-info">
                                                <div class="personal-info mt-4">
                                                    <ul>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-map-marker"></i>
                                                                location :
                                                            </span>
                                                            {{$isAddressVerified ? $isAddressVerified->city : ''}},
                                                            {{$isAddressVerified ? $isAddressVerified->country->name : ''}}
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-phone"></i>
                                                                phone :
                                                            </span>
                                                            {{$seller->phone_number}}
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-envelope"></i>
                                                                mail :
                                                            </span>
                                                            {{$seller->email}}
                                                        </li>
                                                        <li>
                                                            <span>
                                                                <i class="fa fa-envelope"></i>
                                                                Reference ID :
                                                            </span>
                                                            {{$seller->ref_id}}
                                                        </li>
                                                        @if($isAddressVerified && $isAddressVerified->is_verified !== VERIFICATION_STATUS_APPROVED)
                                                            <li>
                                                                <span>
                                                                    <i class="fa fa-check-circle"></i>
                                                                    Verification Status :
                                                                </span>
                                                                <span
                                                                    class="badge d-inline-block w-auto badge-pill pr-2 text-white font-weight-normal {{config('commonconfig.verification_status.' . ( $isAddressVerified ? VERIFICATION_STATUS_UNVERIFIED  : $isAddressVerified->is_verified) . '.color_class')}}"> {{( empty($isAddressVerified) ? '' : verification_status($isAddressVerified->is_verified) )}} </span>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End: personal information -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dispute-link position-absolute">
                            <a class="flex-sm-fill text-sm-center nav-link p-0" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="fa fa-th-list icon-round"></i>
                            </a>
                            <div class="address-dropdown-menu">
                                <div class="dropdown-menu  drop-menu dropdown-menu-right">
                                    <a class="p-2 d-block"
                                       href="{{route('disputes.specific', [DISPUTE_TYPE_SELLER_ISSUE, $seller->ref_id])}}">
                                        Report Auction
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">

                    @include('frontend.user_access.profile.stores.store_show_nav')

                    <div class="tab-content profile-content" id="profileTabContent">
                        <div class="tab-pane fade {{is_current_route('seller-profile.show', 'show active')}}">
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
                                                                    <a href="{{route('auction.show', $auction->id)}}">
                                                                        <img class="img-fluid"
                                                                             src="{{auction_image($auction->images[0])}}"
                                                                             alt="Card image cap">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-5">
                                                                <div class="card-body py-5">
                                                                    <a href="{{route('auction.show', $auction->id)}}">
                                                                        <h6 class="card-title font-weight-bold color-333">
                                                                            Card title that wraps to a new line</h6>
                                                                    </a>
                                                                    <p class="card-text fz-12 color-666 text-justify">{{$auction->description}}</p>
                                                                    <p class="mt-3 text-muted">Initial Price : <span
                                                                            class="fz-16 ml-2 badge badge-success text-white font-weight-bold"> {{$auction->bid_initial_price}} USD </span>
                                                                    </p>
                                                                    <div class="mt-2">
                                                                        <!-- Start: countdown -->
                                                                        <div class="count-down">
                                                                            <div
                                                                                class="color-999 d-inline-block fz-12">{{'ENDS IN :'}}</div>
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
                                                            <div class="col-xl-4">
                                                                <div class="py-5 px-3">
                                                                    <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item color-999 fz-13 px-0 d-flex justify-content-between align-items-center">
                                                                            Auction Type :
                                                                            <span
                                                                                class="badge font-weight-light text-white fz-12 {{config('commonconfig.auction_type.' . ( !is_null($auction) ? $auction->auction_type : 'Not Defined' ) . '.color_class')}}">{{ auction_type($auction->auction_type) }}</span>
                                                                        </li>
                                                                        <li class="list-group-item color-999 fz-13 px-0 d-flex justify-content-between align-items-center">
                                                                            Starting Date :
                                                                            <span
                                                                                class="badge color-333 border font-weight-light fz-12">{{ $auction->starting_date!==null? date('Y-m-d', strtotime($auction->starting_date)):'' }}</span>
                                                                        </li>
                                                                        <li class="list-group-item color-999 fz-13 px-0 d-flex justify-content-between align-items-center">
                                                                            Ending Date :
                                                                            <span
                                                                                class="badge color-333 border font-weight-light fz-12">{{ $auction->ending_date!==null? date('Y-m-d', strtotime($auction->ending_date)):'' }}</span>
                                                                        </li>
                                                                        <li class="list-group-item color-999 fz-13 px-0 d-flex justify-content-between align-items-center">
                                                                            Status :
                                                                            <span
                                                                                class="badge {{config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : AUCTION_STATUS_COMPLETED ) . '.color_class')}}">{{ config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : AUCTION_STATUS_COMPLETED ) . '.text')}}</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
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
        .dispute-link {
            right: 10px;
            top: 10px;
        }

        .dispute-link .drop-menu.show {
            width: 180px;
        }
    </style>
@endsection
