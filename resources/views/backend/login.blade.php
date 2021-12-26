@extends('layouts.headerless')
@section('title', company_name())
@section('content')
    <div class="laraframe-login mx-lg-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 col-md-6">
                <img src="{{ asset('images/laraframe-logo.png') }}" alt="" class="img-fluid logo-headerless">
            </div>
            <div class="col-lg-5 col-md-6">
                <h3 class="text-center">{{ __('Login Panel') }}</h3>
                <form class="laraframe-form" action="{{ route('admin-login') }}" method="post">
                    @csrf
                    @basekey
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" name="{{ fake_field('username') }}"
                               placeholder="{{ __('Username') }}" value="{{ old('username') }}">
                        <span class="invalid-feedback">{{ $errors->first('username') }}</span>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control" name="{{ fake_field('password') }}"
                               placeholder="{{ __('Password') }}">
                        <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                    </div>

                    @if( env('APP_ENV') != 'local' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
                    <div class="input-group">
                        <div>
                            {{ view_html(NoCaptcha::display()) }}
                        </div>
                        <span class="invalid-feedback">{{ $errors->first('g-recaptcha-response') }}</span>
                    </div>
                    @endif

                    <div class="checkbox">
                        <input id="rememberMe" type="checkbox" class="flat-blue" name="{{ fake_field('remember_me') }}"> <label
                            for="rememberMe">{{ __('Remember Me') }}</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn w-100 btn-success">{{ __('Login') }}</button>
                    </div>
                </form>
                <div class="text-center pt-3 laraframe-form">
                    <a class="txt2" href="{{ route('forget-password.index') }}">{{ __('Forgot Password?') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if( env('APP_ENV') == 'production' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
        {{ view_html(NoCaptcha::renderJs()) }}
    @endif
@endsection


