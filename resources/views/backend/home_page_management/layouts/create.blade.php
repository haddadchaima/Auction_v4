@extends('layouts.master')
@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('layout.index') }}" class="btn btn-sm btn-info back-button">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>
                @endslot
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        {{ Form::open(['route'=>['layout.store'],'class'=>'form-horizontal cvalidate']) }}
                        @method('post')
                        @basekey

                            @include('backend.home_page_management.layouts._form')

                        {{ Form::close() }}

                    </div>
                </div>
            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.cvalidate').cValidate();
        });
    </script>
@endsection
