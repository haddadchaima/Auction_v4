@extends('frontend.layouts.master')

@section('content')
    <div class="p-b-100 p-t-50">
        <div class="container">
            <div class="pb-3">
                @include('layouts.includes.breadcrumb')
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach($auctions as $auction)
                            @include('frontend.layouts.includes.auction-card')
                        @endforeach
                    </div>

                    @component('components.card', ['class' => 'custom-card', 'type' => 'info'])
                        @slot('footer')
                            {{ $auctions->links()}}
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style-top')
    @include('layouts.includes.list-css')
    <style>
        .custom-card {
            border: 0;
            background: #f0f0f0;
        }
        .page-item.active .page-link {
            z-index: 1;
            color: #fff !important;
            background-color: #ff214f !important;
            border-color: #ff214f !important;
        }
        .pagination .page-link {
            padding: 8px 20px !important;
            color: #10cea1 !important;
            border: 1px solid #10cea1 !important;
        }
        .custom-card .card-body {
            display: none !important;
            border: 0;
            background: #f0f0f0;
        }
        .custom-card .card-header {
            border: 1px solid #e3e3e3;
            background: #fff !important;
        }
        .custom-card .card-footer {
            border: 0;
            padding: 0;
            margin-top: 25px;
            background: #f0f0f0;
        }
        .cm-filter-wrapper h6 {
            margin-bottom: 10px;
        }
        .cm-filter-container .btn-info {
            background: #ff214f;
            border-color: #ff214f;
        }
        .cm-filter-wrapper label {
            color: #666;
        }
    </style>
@endsection

@section('script')
    @include('layouts.includes.list-js')
    <script>
        (function($){
            $('.cm-filter-toggler').on('click',function(){
                $('.cm-filter-container').slideToggle();
            })
        })(jQuery)
        new Vue({
            el:'#app'
        });
    </script>
@endsection
