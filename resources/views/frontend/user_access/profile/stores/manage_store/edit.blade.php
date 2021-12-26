@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <div class="p-b-100 p-t-50">
        <div class="container">
            @include('frontend.user_access.profile.stores.manage_store.title_nav')
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    @include('frontend.user_access.profile.stores.manage_store.avatar')
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        @include('frontend.user_access.profile.stores.manage_store.store_nav')
                        @component('components.card',['type' => 'info', 'class'=> 'border-top-0 pt-3'])
                            {{ Form::open(['route' => ['seller-profile.update', $seller->id], 'class' => 'cvalidate', 'files' => true]) }}
                            @method('put')
                            @basekey

                            <div class="mb-0 row">
                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="{{ fake_field('name') }}" class="control-label required">{{ __('Store Name') }}</label>
                                        {{Form::text(fake_field('name'), old('name', $seller->name), ['class' => form_validation($errors, 'name'), 'id' => fake_field('name'), 'placeholder' => 'Name', 'data-cval-name' => 'Store name', 'data-cval-rules' => 'required|min:3' ] )}}
                                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('name') }}">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <div class="form-group mb-0">
                                        <label for="{{ fake_field('phone_number') }}" class="control-label required">{{ __('Contact Number') }}</label>
                                        {{Form::text(fake_field('phone_number'), old('phone_number', $seller->phone_number), ['class' => form_validation($errors, 'phone_number'), 'id' => fake_field('phone_number'), 'placeholder' => 'Phone Number', 'data-cval-phone_number' => 'Store phone_number required', 'data-cval-rules' => 'required|min:3' ] )}}
                                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('phone_number') }}">{{ $errors->first('phone_number') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="{{ fake_field('email') }}" class="control-label required">{{ __('Email Address') }}</label>

                                {{Form::text(fake_field('email'), old('email', $seller->email), ['class' => form_validation($errors, 'email'), 'id' => fake_field('email'), 'placeholder' => 'Email Address', 'data-cval-email' => 'Store email required', 'data-cval-rules' => 'required|min:3' ] )}}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('email') }}">{{ $errors->first('email') }}</span>
                            </div>

                            <div class="form-group mb-4">
                                <label for="{{ fake_field('description') }}" class="control-label required">{{ __('Description') }}</label>
                                {{Form::textarea(fake_field('description'), old('description', $seller->description), ['class' => form_validation($errors, 'description'), 'id' => fake_field('description'), 'rows' => '3', 'placeholder' => 'Description about the Store', 'data-cval-description' => 'Store description required', 'data-cval-rules' => 'required|min:3' ] )}}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('description') }}">{{ $errors->first('description') }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new img-thumbnail mb-3">
                                                <img class="img h-100" src="{{get_seller_profile_image($seller->image)}}"  alt="">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists mb-3 img-thumbnail"></div>
                                            <div>
                                                        <span class="btn btn-sm btn-outline-success btn-file">
                                                            <span class="fileinput-new">Select</span>
                                                            <span class="fileinput-exists">Change</span>

                                                            {{ Form::file('image', [old('image'),'class'=>'multi-input', 'id' => fake_field('image'),])}}
                                                        </span>
                                                <a href="#" class="btn btn-sm btn-outline-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="font-weight-bold border-bottom color-666 pb-3">Store Image</h4>
                                    <p class="text-muted mt-4">Upload a picture here which will be displayed in you store as your store profile image. Anyone will be able to see this image</p>
                                    <p class="mt-3 mb-0 color-333"> - Maximum Image Size : <span class="font-weight-bold">5MB</span></p>
                                    <p class="mt-1 color-333">- Maximum Image Dimension : <span class="font-weight-bold">1600x1200</span></p>
                                    <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('image') }}">{{ $errors->first('image') }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::submit('Submit',['class'=>'btn btn-info btn-sm px-4 mt-2 float-right']) }}
                                <a class="btn btn-danger d-inline-block mt-2 mr-3 px-4 btn-sm float-right" href="{{route('store-management.index')}}">{{__('Cancel')}}</a>
                            </div>

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
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.cvalidate').cValidate();
        });
    </script>
@endsection
