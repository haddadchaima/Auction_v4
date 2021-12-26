@extends('layouts.master')
@section('title', $title)
@section('content')

    @component('components.card', ['type' => 'info'])
        @slot('header')
            <h3 class="card-title">{{ __('Create New User') }}</h3>
            <div class="card-tools pull-right">
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">{{ __('Back') }}</a>
            </div>
        @endslot
        <div class="row">
            <div class="offset-1 col-md-8">

                {{ Form::open(['route'=>'users.store', 'method' => 'post', 'class'=>'form-horizontal user-form']) }}
                @include('backend.users._create_form')
                {{ Form::close() }}
            </div>
        </div>
    @endcomponent

@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.user-form').cValidate({});
        });
    </script>
@endsection
