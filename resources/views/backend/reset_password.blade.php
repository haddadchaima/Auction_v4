@extends('layouts.headerless')
@section('title', company_name())
@section('content')
    <div class="laraframe-login mx-lg-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 col-md-6">
                <img src="{{ asset('images/laraframe-logo.png') }}" alt="" class="img-fluid logo-headerless">
            </div>
            <div class="col-lg-5 col-md-6">
                <h3 class="text-center">{{ __('Reset Password') }}</h3>
                <form class="laraframe-form" action="{{ $passwordResetLink }}" method="post">
                    @csrf
                    @basekey

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" name="{{ fake_field('new_password') }}"
                               placeholder="Password">
                        <span class="invalid-feedback">{{ $errors->first('new_password') }}</span>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" name="{{ fake_field('password_confirmation') }}"
                               placeholder="Confirm Password">
                        <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                    </div>

                    @if( env('APP_ENV') != 'local' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
                        <div class="input-group">
                            <div>
                                {{ view_html(NoCaptcha::display()) }}
                            </div>
                            <span class="invalid-feedback">{{ $errors->first('g-recaptcha-response') }}</span>
                        </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn w-100 btn-success">{{ __('Reset') }}</button>
                    </div>
                </form>
                <div class="text-center pt-3 laraframe-form">
                    <a class="txt2" href="{{ route('forget-password.index') }}">{{ __('Forgot Password?') }}</a>
                </div>
                <div class="text-center pt-1 laraframe-form">
                    <a class="txt2" href="{{ route('register.index') }}">{{ __('Create your Account') }}<i
                            class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.validator').cValidate({});
        });
    </script>
@endsection
