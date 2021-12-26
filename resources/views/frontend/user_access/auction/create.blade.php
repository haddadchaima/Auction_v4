@extends('frontend.layouts.master')
@section('content')

    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="p-b-100  p-t-50">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('layouts.includes.breadcrumb')
                </div>
                <div class="col-lg-12">

                        @include('frontend.user_access.auction._form')

                </div>
            </div>
        </div>
    </div>
    <!-- ::::::::::::::::::::::::END PAGE HEAD ::::::::::::::::::::::::: -->

@endsection

@section('script')
    <!-- for button loader -->
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('vendor/moment.js/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap4-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea',
                height: 100,
                theme: 'modern',
            });
            $('.cvalidate').cValidate();
            //Init jquery Date Picker
            $('.datepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
            var count = 0

                $(document).on("click", "#btnAdd", function () {
                    if(count < 2)
                    {
                        $("#TextBoxContainer").append(GetDynamicTextBox());
                        count++

                        if(count === 2)
                        {
                            $(this).remove()
                        }
                    }

                });

            $("body").on("click", ".remove", function () {
                $(this).closest("div").remove();
                count--
                if(count === 1)
                {
                    $('#preview-multi-img').append('<button id="btnAdd" type="button" class="btn btn-primary">{{__('Add Field')}}</button>')
                }
            });
        });
        function GetDynamicTextBox() {
            return '<div class="col-lg-4">' +
                '<div class="fileinput fileinput-new" data-provides="fileinput">' +
                '<div class="fileinput fileinput-new" data-provides="fileinput">' +
                '<div class="fileinput-new img-thumbnail mb-3">' +
                '<img class="img" src="{{know_your_customer_images('preview.png')}}"  alt="">' +
                '</div>' +
                '<div class="fileinput-preview fileinput-exists mb-3 img-thumbnail"></div>' +
                '<div>' +
                '<span class="btn btn-sm btn-outline-success btn-file mr-2">' +
                '<span class="fileinput-new">Select</span>' +
                '<span class="fileinput-exists">Change</span>' +
                '{{ Form::file('images[]', [old('images'),'class'=>'multi-input', 'id' => fake_field('images'),])}}' +
                '</span>' +
                '<a href="#" class="btn btn-sm btn-outline-danger fileinput-exists" data-dismiss="fileinput">Remove</a>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<td><button type="button" class="btn btn-danger remove"><i class="fa fa-minus"></i></button></td>' +
                '</div>'
        }
    </script>


    <script type="text/javascript">

        $('.timepicker').datetimepicker({

            format: 'HH:mm'

        });

    </script>

@endsection

@section('style-top')
    <link rel="stylesheet" href="{{asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">

    <style>

        .form-control::placeholder {
            color: #999696 !important;
            opacity: 1;
        }

        .form-control {
            padding: 0.575rem .85rem !important;
            font-size: 14px !important;
            color: #868686 !important;
            background-color: #ececec !important;
            border: 1px solid #ececec !important;
        }

        .fileinput .img-thumbnail {
            position: relative;
        }

        .btn.btn-danger.remove {
            position: absolute;
            left: 25px;
            border-radius: 40px;
            top: 10px;
        }

        .card {

            box-shadow: 0 0 15px 1px #efefef;
            border: 1px solid rgba(142, 142, 142, 0.23);

        }

        .card-header {

            border-bottom: 1px solid rgba(162, 162, 162, 0.13);

        }

        .card-footer {

            border-top: 1px solid rgba(162, 162, 162, 0.13);

        }

        .custom-select {
            border-radius: 0;
            -webkit-appearance: none;
            -moz-appearance:    none;
            appearance:         none;
        }

        .mce-tinymce {
             box-shadow: none !important;
        }

        .mce-panel {
            border: 1px solid #e6e6e6 !important;
        }

    </style>
@endsection

