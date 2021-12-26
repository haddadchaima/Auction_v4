@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <div class="p-b-100 p-t-50">
        <div class="container">
            @include('frontend.user_access.profile.personal_info.title_nav')
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    @include('frontend.user_access.profile.personal_info.avatar')
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">

                        <div class="common-nav">
                            <ul class="nav nav-tabs" id="profileTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{ is_current_route('user-profile.avatar.edit','active') }}" href="{{ route('user-profile.avatar.edit') }}">{{ __('Change Avatar') }}</a>
                                </li>
                            </ul>
                        </div>

                        @component('components.card',['type' => 'info', 'class'=> 'border-top-0'])
                            {{ Form::open(['route'=>['profile.avatar.update'],'files'=> true]) }}
                            @method('put')
                            @basekey

                            {{--avatar--}}
                            <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                                <label for="avatar" class="d-block control-label required">{{ __('Upload new avatar') }}</label>

                                <div class="row">

                                    {{-- Start: front image --}}
                                    <div class="col-md-12">
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
                                    </div>
                                    {{-- End: front image --}}

                                </div>


                            </div>

                            {{--submit button--}}
                            {{ Form::submit(__('Upload Avatar'), ['class'=>'btn mr-2 bg-info fz-14 custom-btn border-0']) }}
                            <a class="btn mr-2 fz-14 custom-btn border-0" href="{{route('user-manage-profile.index')}}">{{__('Back')}}</a>
                            {{ Form::close() }}
                        @endcomponent
                    </div>
                </div>
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
