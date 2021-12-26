@extends('layouts.master')
@section('title', $title)
@section('content')
    @component('components.card', ['type' => 'info'])
        @slot('header')
            <h3 class="card-title">{{ __('Create User Role') }}:</h3>
            <div class="card-tools pull-right">
                <a href="{{ route('roles.index') }}" class="btn btn-info btn-sm back-button"><i
                        class="fa fa-reply"></i></a>
            </div>
        @endslot

        {{ Form::open(['route'=>['roles.store'], 'method'=>'POST' ,'class'=>'roles-form']) }}
            @include('backend.roles._form',['buttonText'=>__('Create')])
        {{ Form::close() }}
    @endcomponent
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/role_manager.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document).on('ifChecked', '.module', function () {
                $('.module_action_' + $(this).attr('data-id')).iCheck('check');
            });
            $(document).on('ifUnchecked', '.module', function () {
                $('.module_action_' + $(this).attr('data-id')).iCheck('uncheck');
            });

            $(document).on('ifChecked', '.task', function () {
                $('.task_action_' + $(this).attr('data-id')).iCheck('check');
            });

            $(document).on('ifUnchecked', '.task', function () {
                $('.task_action_' + $(this).attr('data-id')).iCheck('uncheck');
            });

            $(document).ready(function () {
                $('.roles-form').cValidate({});
            });
        });
    </script>
@endsection
