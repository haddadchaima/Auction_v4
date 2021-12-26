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
                <form class="laraframe-form" action="{{ route('forget-password.send-mail') }}" method="post">
                    @csrf
                    @basekey
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text"
                               class="{{ $errors->has('email') ? 'form-control invalid-form' : 'form-control' }}"
                               name="{{ fake_field('email') }}"
                               placeholder="Email">
                        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
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
                        <button type="submit" class="btn w-100 btn-success">{{ __('Get Password Reset Link') }}</button>
                    </div>
                </form>
                <div class="text-center pt-3 laraframe-form">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
                @if(settings('require_email_verification') == ACTIVE_STATUS_ACTIVE)
                    <div class="text-center pt-1 laraframe-form">
                        <a href="{{ route('verification.form') }}">{{ __('Get verification email') }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if( env('APP_ENV') == 'production' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
    {{ view_html(NoCaptcha::renderJs()) }}
    @endif
@endsection
