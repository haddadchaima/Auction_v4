@extends('frontend.layouts.master')

@section('content')
    <div class="p-b-100  p-t-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.includes.breadcrumb')
                </div>
                <div class="col-12">
                    <div class="m-y-50 position-relative">
                        <div class="fz-26 font-weight-bold color-999 global-custom-header"> <span class="color-default">{{$title}} </span>{{__('Us')}}</div>
                        <div class="d-block">
                            <div class="fz-16 text-right position-relative">
                                <span class="link-border"></span>
                                <div class="link-area">
                                    <span class="color-666">{{__('Information')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="contact-bg">
                        <div class="row">

                            <!-- Start: comment form -->
                            <div class="col-12">

                                <!-- Start: contact form -->
                                <div class="agent-form">
                                    {{ Form::open(['route'=>['contact-us.store'],'class'=>'form-horizontal cvalidate']) }}
                                    @method('post')
                                    @basekey
                                        <div class="row">

                                            <div class="col-md-6 col-sm-12">
                                                <input type="text" name="{{fake_field('name')}}" value="{{fake_field(old('name'))}}" class="form-control" placeholder="Name">
                                                <span class="invalid-feedback cval-error d-block" data-cval-error="{{ fake_field('name') }}">{{ $errors->first('name') }}</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12 m-sm-top-24">
                                                <input type="text" name="{{fake_field('phone_number')}}" value="{{fake_field(old('phone_number'))}}" class="form-control" placeholder="Phone">
                                                <span class="invalid-feedback cval-error d-block" data-cval-error="{{ fake_field('phone_number') }}">{{ $errors->first('phone_number') }}</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mt-4">
                                                <input type="email" name="{{fake_field('email')}}" value="{{fake_field(old('email'))}}" class="form-control" placeholder="Email">
                                                <span class="invalid-feedback cval-error d-block" data-cval-error="{{ fake_field('email') }}">{{ $errors->first('email') }}</span>
                                            </div>
                                            <div class="col-md-6 col-sm-12 mt-4">
                                                <input type="text" name="{{fake_field('subject')}}" value="{{fake_field(old('subject'))}}" class="form-control" placeholder="Subject">
                                                <span class="invalid-feedback cval-error d-block" data-cval-error="{{ fake_field('subject') }}">{{ $errors->first('subject') }}</span>
                                            </div>

                                            <div class="col-12">
                                                <textarea class="form-control mt-4" name="{{fake_field('message')}}" value="{{fake_field(old('message'))}}" id="Textarea1" placeholder="Write Massage" rows="5"></textarea>
                                                <span class="invalid-feedback cval-error d-block" data-cval-error="{{ fake_field('message') }}">{{ $errors->first('message') }}</span>
                                                @if( env('APP_ENV') != 'local' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
                                                    <div class="input-group">
                                                        <div>
                                                            {{ view_html(NoCaptcha::display()) }}
                                                        </div>
                                                        <span class="invalid-feedback">{{ $errors->first('g-recaptcha-response') }}</span>
                                                    </div>
                                                @endif
                                                <button class="btn custom-btn mt-4" type="submit" name="button">Send Massage</button>
                                            </div>

                                        </div>
                                    {{ Form::close() }}
                                </div>
                                <!-- End: contact form -->

                            </div>
                            <!-- Start: comment form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style-top')
    <style>
        .contact-bg .agent-form .form-control {
            border: 1px solid #eaeaea;
            background: none;
            color: #666;
            font-size: 14px;
        }
    </style>
@endsection
