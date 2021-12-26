@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="p-b-100  p-t-50">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('layouts.includes.breadcrumb')
                </div>
                <div class="col-lg-12">

                    {{ Form::open(['route'=>['dispute.store'],'class'=>'form-horizontal cvalidate', 'files' => true]) }}
                    @method('post')
                    @basekey

                    <div class="card">
                        <div class="card-header py-4">
                            <h3 class="font-weight-bold d-inline text-secondary">{{$title}}</h3>
                            <span class="text-muted ml-2">{{empty($disputeType) ? '' : dispute_type($disputeType)}}</span>
                        </div>
                        <div class="card-body py-5">
                            <div class="row justify-content-center">
                                <div class="col-sm-10">
                                    @if(empty($disputeType) || empty($refId))
                                        {{-- Start: select button --}}
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-lighter text-secondary" for="{{ fake_field('dispute_type') }}">Select Report Type <span class="float-right d-inline-block">:</span></label>
                                            <div class="col-sm-9">
                                                {{ Form::select(fake_field('dispute_type'), dispute_type(), old('dispute_type'), ['class' => 'custom-select my-1 mr-sm-2', 'id' => fake_field('dispute_type')]) }}
                                            </div>
                                        </div>
                                    @else
                                        <input type="hidden" name="{{fake_field('dispute_type')}}" value="{{$disputeType}}">
                                    @endif

                                    @if(empty($disputeType) || empty($refId))
                                        {{-- Start: ref id--}}
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label font-weight-lighter text-secondary" for="{{ fake_field('ref_id') }}">Reference ID <span class="float-right d-inline-block">:</span></label>
                                            <div class="col-sm-9">
                                                {{ Form::text(fake_field('ref_id'), old('ref_id', null), ['class'=> 'form-control', 'id' => fake_field('ref_id'),'data-cval-name' => 'The Reference ID', 'data-cval-rules' => 'required|min:3|max:255']) }}
                                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('ref_id') }}">{{ $errors->first('ref_id') }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <input type="hidden" name="{{fake_field('ref_id')}}" value="{{$refId}}">
                                    @endif

                                    {{-- Start: Title--}}
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label font-weight-lighter text-secondary" for="{{ fake_field('title') }}">Title <span class="float-right d-inline-block">:</span></label>
                                        <div class="col-sm-9">
                                            {{ Form::text(fake_field('title'), old('title', null), ['class'=> 'form-control', 'id' => fake_field('title'),'data-cval-name' => 'The Title field', 'data-cval-rules' => 'required|min:3|max:255']) }}
                                            <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('title') }}">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>

                                    {{-- Start: description --}}
                                    <div class="form-group row mt-4 mb-0">
                                        <label class="col-sm-3 col-form-label font-weight-lighter text-secondary" for="{{ fake_field('description') }}">Description <span class="float-right d-inline-block">:</span></label>
                                        <div class="col-sm-9">
                                            {{ Form::textarea(fake_field('description'), old('description'), ['class'=> form_validation($errors, 'description'), 'id' => fake_field('description'),'data-cval-name' => 'The Description field','rows'=>('3'),'data-cval-rules' => 'required|min:20|max:255']) }}
                                            <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('description') }}">{{ $errors->first('description') }}</span>
                                        </div>
                                    </div>

                                    <!-- Start: dispute image -->
                                    <div class="form-group form-row mt-4">
                                        <label class="col-sm-3 col-form-label text-secondary" for="{{ fake_field('content') }}">{{('Image')}}<span class="float-right d-inline-block">:</span></label>
                                        <div class="col-sm-9">
                                            <div id="preview-multi-img">
                                                <div class="row" id="TextBoxContainer">
                                                </div>
                                                <button id="btnAdd" type="button" class="btn text-secondary bg-custom-gray" data-toggle="tooltip">{{__('Add Image')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End: dispute image -->

                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <button value="Submit Design" type="submit" class="btn custom-btn float-right form-submission-button has-spinner my-2" id="two">{{__('Submit Report')}}</button>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <!-- ::::::::::::::::::::::::END PAGE HEAD ::::::::::::::::::::::::: -->
@endsection

@section('script')
    <!-- for button loader -->
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('vendor/moment.js/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.cvalidate').cValidate();
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

                    if(count == 2)
                    {
                        $(this).remove()
                    }
                }

            });

            $("body").on("click", ".remove", function () {
                $(this).closest("div").remove();
                count--
                if(count == 1)
                {
                    $('#preview-multi-img').append('<button id="btnAdd" type="button" class="btn btn-primary">{{__('Add Image')}}</button>')
                }
            });
        });
        function GetDynamicTextBox() {
            return '<div class="col-lg-4 mb-3">' +
                '<div class="fileinput fileinput-new" data-provides="fileinput">' +
                '<div class="fileinput fileinput-new" data-provides="fileinput">' +
                '<div class="fileinput-new img-thumbnail mb-3">' +
                '<img class="img" src="{{know_your_customer_images('preview.png')}}"  alt="">' +
                '</div>' +
                '<div class="fileinput-preview fileinput-exists mb-3 img-thumbnail"></div>' +
                '<div>' +
                '<span class="btn btn-sm btn-outline-success btn-file mr-2" >' +
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

    </style>
@endsection
