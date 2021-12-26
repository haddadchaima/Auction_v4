@extends('layouts.master')
@section('title', $title)
@section('content')
    @component('components.card',['type' => 'info'])
        @slot('header')
            <h3 class="card-title">{{ __('Create New Notice') }}</h3>
            <div class="card-tools pull-right">
                <a href="{{ route('system-notices.index') }}" class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
            </div>
        @endslot
        <div class="row">
            <div class="offset-1 col-md-8">

                {{ Form::open(['route'=>'system-notices.store', 'method' => 'POST', 'class'=>'form-horizontal system-notice-form']) }}
                @include('backend.systemNotice._form',['buttonText'=> __('Create')])
                {{ Form::close() }}
            </div>
        </div>
    @endcomponent

@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap4-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('script')
    <!-- for datatable and date picker -->
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('vendor/moment.js/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap4-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            //Init jquery Date Picker
            $('#start_time').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: false
            });

            $('#end_time').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: false
            });

            $("#start_time").on("dp.change", function (e) {
                $('#end_time').data("DateTimePicker").minDate(e.date);
            });
            $("#end_time").on("dp.change", function (e) {
                $('#start_time').data("DateTimePicker").maxDate(e.date);
            });

            $('.system-notice-form').cValidate({});
        });
    </script>
@endsection
