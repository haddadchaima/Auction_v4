@extends('layouts.headerless')
@section('title', company_name())
@section('content')
    <div class="laraframe-login mx-lg-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 col-md-6">
                <img src="{{ asset('images/laraframe-logo.png') }}" alt="" class="img-fluid logo-headerless">
            </div>
            <div class="col-lg-5 col-md-6">
                <h3 class="text-center">{{ __('Create Your Account') }}</h3>
                <form class="laraframe-form" action="{{ route('register.store') }}" method="post">
                    @csrf
                    @basekey
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text"
                               class="{{ $errors->has('first_name') ? 'form-control invalid-form' : 'form-control' }}"
                               name="{{ fake_field('first_name') }}" value="{{ old('first_name') }}"
                               placeholder="First Name" data-cval-name="The first name field" data-cval-rules ="required|escapeInput|alphaSpace">
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('first_name') }}">{{ $errors->first('first_name') }}</span>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text"
                               class="{{ $errors->has('last_name') ? 'form-control invalid-form' : 'form-control' }}"
                               name="{{ fake_field('last_name') }}" value="{{ old('last_name') }}"
                               placeholder="Last Name" data-cval-name="The last name field" data-cval-rules ="required|escapeInput|alphaSpace">
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('last_name') }}">{{ $errors->first('last_name') }}</span>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text"
                               class="{{ $errors->has('username') ? 'form-control invalid-form' : 'form-control' }}"
                               name="{{ fake_field('username') }}"  value="{{ old('username') }}"
                               placeholder="Username" data-cval-name="The username field" data-cval-rules ="required|escapeInput|alphaDash">
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('username') }}">{{ $errors->first('username') }}</span>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input type="text"
                               class="{{ $errors->has('email') ? 'form-control invalid-form' : 'form-control' }}"
                               name="{{ fake_field('email') }}"  value="{{ old('email') }}"
                               placeholder="Email" data-cval-name="The email field" data-cval-rules ="required|escapeInput|email">
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('email') }}">{{ $errors->first('email') }}</span>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password"
                               class="{{ $errors->has('password') ? 'form-control invalid-form' : 'form-control' }}"
                               name="{{ fake_field('password') }}"
                               placeholder="Password" data-cval-name="The password field" data-cval-rules ="required|followedBy:{{fake_field('password_confirmation')  }}">
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('password') }}">{{ $errors->first('password') }}</span>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password"
                               class="{{ $errors->has('password_confirmation') ? 'form-control invalid-form' : 'form-control' }}"
                               name="{{ fake_field('password_confirmation') }}"
                               placeholder="Confirm Password" data-cval-name="The confirm password field" data-cval-rules ="required|follow:{{ fake_field('password') }}">
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('password_confirmation') }}">{{ $errors->first('password_confirmation') }}</span>
                    </div>

                    @if( env('APP_ENV') != 'local' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
                    <div class="input-group">
                        <div>
                            {{ view_html(NoCaptcha::display()) }}
                        </div>
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('g-recaptcha-response') }}">{{ $errors->first('g-recaptcha-response') }}</span>
                    </div>
                    @endif

                    <div class="checkbox">
                        <input id="rememberMe" type="checkbox" class="flat-blue" name="{{ fake_field('check_agreement') }}" data-cval-name="The accept our terms and conditions field" data-cval-rules ="required"> <label
                            for="rememberMe">{{  __('Accept our terms and conditions.') }}</label>
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('check_agreement') }}">{{ $errors->first('check_agreement') }}</span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn w-100 btn-success form-submission-button">{{ __('Register') }}</button>
                    </div>
                </form>
                <div class="text-center pt-3 laraframe-form">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
                @if(settings('require_email_verification') == ACTIVE_STATUS_ACTIVE)
                    <div class="text-center pt-1 laraframe-form">
                        <a href="{{ route('forget-password.index') }}">{{ __('Forgot Password?') }}</a>
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

    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script>
        $(document).ready(function () {
             $('.laraframe-form').cValidate();
        });
    </script>

@endsection
