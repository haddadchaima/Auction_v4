@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            @include('backend.profile.avatar')
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                @include('backend.profile.profile_nav')
                @component('components.card',['type' => 'info', 'class'=> 'mt-3'])
                    {{ Form::open(['route'=>['profile.avatar.update'],'class'=>'form-horizontal validator', 'files'=> true]) }}
                    @method('put')
                    @basekey

                    {{-- Start: front image --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new img-thumbnail mb-3">
                                            <img class="img" src="{{know_your_customer_images('preview.png')}}"  alt="">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists mb-3 img-thumbnail"></div>
                                        <div>
                                            <span class="btn btn-sm btn-outline-success btn-file" >
                                                <span class="fileinput-new">Select</span>
                                                <span class="fileinput-exists">Change</span>
                                                {{ Form::file('avatar', [old('avatar'),'class'=>'multi-input', 'id' => fake_field('avatar'), 'data-cval-rules' => 'required|files:jpg,png,jpeg|max:2048'])}}
                                            </span>
                                            <a href="#" class="btn btn-sm btn-outline-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h4 class="font-weight-bold border-bottom pb-3">Profile Image</h4>
                                <p class="text-muted mt-4">Upload your profile image here. It will be your default profile picture and will be shown to your profile</p>
                                <p class="mt-3 mb-0 color-333"> - Maximum Image Size : <span class="font-weight-bold">2MB</span></p>
                                <p class="mt-1 color-333">- Maximum Image Dimension : <span class="font-weight-bold">300x300</span></p>
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('avatar') }}">{{ $errors->first('avatar') }}</span>

                            </div>
                        </div>
                    {{-- End: front image --}}

                    {{--submit button--}}
                    {{ Form::submit(__('Upload Avatar'), ['class'=>'btn btn-info btn-sm btn-left mt-3 btn-sm-block form-submission-button']) }}
                    {{ Form::close() }}
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section('style-top')
    <link rel="stylesheet" href="{{asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">

    <style>
        .fileinput-new {width: 200px; height: 180px;}
        .fileinput-preview {max-width: 200px; max-height: 180px;}
    </style>
@endsection
@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.validator').cValidate();
        });
    </script>
@endsection
