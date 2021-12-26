<section class="p-t-100">
    <div class="container">
        <div class="m-b-50 position-relative">
            <div class="fz-26 font-weight-bold color-999 global-custom-header"> <span class="color-default text-uppercase">{{$title}} </span>{{__('Auctions')}}</div>
            <div class="d-block">
                <div class="fz-16 text-right position-relative">
                    <span class="link-border"></span>
                    <div class="link-area">
                        <a href="{{route('auction.home')}}">{{__('See All Auctions')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($auctions as $auction)
                @include('frontend.layouts.includes.auction-card')
            @endforeach

        </div>
    </div>
</section>
