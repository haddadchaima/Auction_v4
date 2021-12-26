<div class="col-lg-4 col-md-6 my-3">
    <!-- Start: card -->
    <div class=" grid-card">
        <div class="card card-grid card-style-1">

            <!-- Start: card image area-->
            <div class="card-image-area position-relative">
                            <span class="auction-badge">
                                <span class="badge {{config('commonconfig.auction_type.' . ( !is_null($auction) ? $auction->auction_type : '' ) . '.color_class')}}">{{__('Badge img')}}</span>
                            </span>
                <span class="fz-12 color-999 card-time d-block">{{ !is_null($auction->created_at) ?$auction->created_at->diffForHumans() : ''}}</span>
                <figure>

                    <!-- Start: card image -->
                    <a href="{{route('auction.show', $auction->id)}}">
                        <img class="card-img-top" src="{{auction_image($auction->images[0])}}" alt="preview">
                    </a>
                    <!-- End: card image -->

                </figure>
            </div>
            <!-- End: card image area-->

            <!-- Start: card body -->
            <div class="card-body">

                <!-- Start: card header -->
                <div class="d-inline-block">
                    <a class="text-truncate text-capitalize grid-title mb-0" href="{{route('auction.show', $auction->id)}}">
                        {{$auction->title}}
                    </a>
                    <div class="sub-text mt-1 m-0">
                        <i class="fa fa-user-circle-o mr-1"></i>
                        <a class="color-999" href="{{route('seller-profile.show', $auction->seller->id)}}">{{$auction->seller->name}}</a>
                    </div>
                </div>
                <!-- End: card header -->

                <!-- Start: card details -->
                <div class="details-bottom mt-3">

                    <!-- Start: countdown -->
                    <div class="count-down">
                        <div class="color-999 d-inline-block fz-12">{{__('ENDS IN :')}}</div>
                        <div class="timer d-inline-block">
                            <Timer
                                starttime="{{\Carbon\Carbon::parse($auction->started_date)->format('M d\\, Y H:i:s')}}"
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

                    <!-- Start: item details -->
                    <div class="item-details d-block">

                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item">
                                <span class="main-text card-money d-block">
                                    @if($auction->aff_prix_reserve>0)
                                        {{$auction->bid_initial_price}} <span class="fz-14 font-weight-normal"> {{$auction->currency != null ? $auction->currency->symbol : ''}}
                                    @else
                                        1 <span class="fz-14 font-weight-normal"> {{$auction->currency != null ? $auction->currency->symbol : ''}}
                                    @endif
                                        </span>
                                </span>
                                <span class="sub-text text-uppercase">{{__('Start At')}}</span>
                            </li>
                            <li class="nav-item">
                                <span class="main-text d-block">
                                    {{__(shipping_type($auction->shipping_type))}}
                                </span>
                                <span class="sub-text text-uppercase">{{__('Shipping')}}</span>
                            </li>
                            <li class="nav-item">
                            @if($auction->gratuit!=1)
                                <span class="main-text card-money d-block" style="color: blue; font-weight: bold;">{{$auction->frais_inscription}} <span class="fz-14 font-weight-normal"> {{$auction->currency != null ? $auction->currency->symbol : ''}}</span></span>
                                @else
                                <span class="main-text card-money d-block" >{{__('Free')}}</span>
                            @endif
                                <span class="sub-text text-uppercase">{{__('Inscription')}}</span>
                            </li>
                        </ul>

                    </div>
                    <!-- End: item details -->

                </div>
                <!-- End: card details -->

            </div>
            <!-- End: card body -->

        </div>
    </div>
    <!-- End: card -->
</div>
