@extends('layouts.master')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('currency.index') }}" class="btn btn-sm btn-info back-button">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>
                @endslot
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        {{ Form::open(['route' => ['currency.update', $currency->id], 'class' => 'cvalidate', 'files' => true]) }}
                        @method('put')

                        @include('backend.auction.currency._form', ['buttonText' => __('Update')])

                        {{ Form::close() }}
                    </div>
                </div>
            @endcomponent
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
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
    </style>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.cvalidate').cValidate();
        });
    </script>
    <script>
        $(window).on("load",function(){
            $('.m-scroller').mCustomScrollbar();
        });
    </script>
@endsection
