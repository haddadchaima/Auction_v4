@extends('frontend.layouts.master')

@section('content')
    @if(!is_null($slider))
        @include('frontend.layouts.includes.auction_slider')
    @endif
    <div class="p-b-100">
        @foreach($layoutViews as $layoutView)
            {{view_html($layoutView)}}
        @endforeach
    </div>
@endsection

@section('style-top')
    <link rel="stylesheet" href="{{ asset('frontend/assets/tamplate/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">
@endsection
@section('script')
    <script src="{{asset('vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:0,
                nav:true,
                autoplayTimeout: 8000,
                smartSpeed: 2000,
                autoplay: true,
                navText: ['<i class="fa fa-long-arrow-left"></i>',
                    '<i class="fa fa-long-arrow-right""></i>'],
                dots:true,
                responsive:{
                    0:{
                        items:1
                    },
                    400:{
                        items:1
                    },

                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
        });
        new Vue({
            el:'#app'
        });
    </script>
@endsection
