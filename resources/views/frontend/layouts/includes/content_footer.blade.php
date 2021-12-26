<!-- Login Modal -->
<div class="custom-modal">
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title justify-content-center font-weight-bold" id="exampleModalLongTitle">{{ __('Login Panel') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <form class="laraframe-form custom-login cvalidate" action="{{ route('user-login') }}" method="post">
                                @csrf
                                @basekey

                                <div class="alert login-alert" role="alert" id="loginAlert">

                                </div>

                                <div class="input-group mb-4">
                                    <input type="text" id="txt_uname" class="form-control" name="{{ fake_field('username') }}"
                                           placeholder="{{ __('Username') }}" value="{{ old('username') }}">
                                    <span class="invalid-feedback">{{ $errors->first('username') }}</span>
                                    <span class="alert login-alert mb-0 mt-1 p-1 fz-12" role="alert" id="username_alert"></span>
                                </div>
                                <div class="input-group mb-4">
                                    <input type="password" id="txt_pwd" class="form-control" name="{{ fake_field('password') }}"
                                           placeholder="{{ __('Password') }}">
                                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                                    <span class="alert login-alert mb-0 mt-1 p-1 fz-12" role="alert" id="password_alert"></span>
                                </div>

                                @if( env('APP_ENV') != 'local' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
                                    <div class="input-group">
                                        <div>
                                            {{ view_html(NoCaptcha::display()) }}
                                        </div>
                                        <span class="invalid-feedback">{{ $errors->first('g-recaptcha-response') }}</span>
                                    </div>
                                @endif

                                <div class="form-row ">
                                    <div class="checkbox col-6">
                                        <input id="rememberMe" type="checkbox" class="" name="{{ fake_field('remember_me') }}">
                                        <label class="fz-14 text-muted" for="rememberMe">{{ __('Remember Me') }}</label>
                                    </div>
                                    <div class="col-6 text-right laraframe-form">
                                        <a class="txt2 fz-14 text-secondary" href="{{ route('forget-password.index') }}">{{ __('Forgot Password?') }}</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="but_submit" class="btn mt-5 w-100 default-color text-white custom-btn">{{ __('Login') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <div class="text-center pt-1 laraframe-form">
                        <p class="text-muted">{{__('Don not have an account?')}}</p>
                        <a class="txt2 text-secondary" data-toggle="modal" data-dismiss="modal" aria-label="Close" data-target="#registerModal" href="javascript;">{{ __('Create One') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="custom-modal register-modal">
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title justify-content-center font-weight-bold" id="exampleModalLongTitle">{{ __('Registration') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <form class="laraframe-form custom-login cvalidate" action="{{ route('register.store') }}" method="post">
                                @csrf
                                @basekey

                                <div class="alert login-alert" role="alert" id="registerAlert"></div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <input type="text" id="first_name" class="{{ $errors->has('first_name') ? 'form-control invalid-form' : 'form-control' }}" name="{{ fake_field('first_name') }}" value="{{ old('first_name') }}"
                                                   placeholder="{{ __('First Name') }}" data-cval-name="The first name field" data-cval-rules ="required|escapeInput|alphaSpace">
                                            <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('first_name') }}">{{ $errors->first('first_name') }}</span>

                                            <span class="alert login-alert mb-0 mt-1 p-1 fz-12" role="alert" id="first_name_alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <input type="text" id="last_name"
                                                   class="{{ $errors->has('last_name') ? 'form-control invalid-form' : 'form-control' }}"
                                                   name="{{ fake_field('last_name') }}" value="{{ old('last_name') }}"
                                                   placeholder="{{ __('Last Name') }}" data-cval-name="The last name field" data-cval-rules ="required|escapeInput|alphaSpace">
                                            <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('last_name') }}">{{ $errors->first('last_name') }}</span>
                                            <span class="alert login-alert mb-0 mt-1 p-1 fz-12" role="alert" id="last_name_alert"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group mb-4">
                                    <input type="text" id="reg-username"
                                           class="{{ $errors->has('username') ? 'form-control invalid-form' : 'form-control' }}"
                                           name="{{ fake_field('username') }}"  value="{{ old('username') }}"
                                           placeholder="{{ __('Username') }}" data-cval-name="The username field" data-cval-rules ="required|escapeInput|alphaDash">
                                    <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('username') }}">{{ $errors->first('username') }}</span>
                                    <span class="alert login-alert mb-0 mt-1 p-1 fz-12" role="alert" id="username_alert"></span>
                                </div>

                                <div class="input-group mb-4">
                                    <input type="text" id="reg-email"
                                           class="{{ $errors->has('email') ? 'form-control invalid-form' : 'form-control' }}"
                                           name="{{ fake_field('email') }}"  value="{{ old('email') }}"
                                           placeholder="{{ __('Email') }}" data-cval-name="The email field" data-cval-rules ="required|escapeInput|email">
                                    <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('email') }}">{{ $errors->first('email') }}</span>
                                    <span class="alert login-alert mb-0 mt-1 p-1 fz-12" role="alert" id="email_alert"></span>
                                </div>

                                <div class="input-group mb-4">
                                    <input type="password" id="reg-password"
                                           class="{{ $errors->has('password') ? 'form-control invalid-form' : 'form-control' }}"
                                           name="{{ fake_field('password') }}"
                                           placeholder="{{ __('Password') }}" data-cval-name="The password field" data-cval-rules ="required|followedBy:{{fake_field('password_confirmation')  }}">
                                    <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('password') }}">{{ $errors->first('password') }}</span>
                                    <span class="alert login-alert mb-0 mt-1 p-1 fz-12" role="alert" id="password_alert"></span>
                                </div>

                                <div class="input-group mb-4">
                                    <input type="password" id="reg-password_confirmation"
                                           class="{{ $errors->has('password_confirmation') ? 'form-control invalid-form' : 'form-control' }}"
                                           name="{{ fake_field('password_confirmation') }}"
                                           placeholder="{{ __('Confirm Password') }}" data-cval-name="The confirm password field" data-cval-rules ="required|follow:{{ fake_field('password') }}">
                                    <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('password_confirmation') }}">{{ $errors->first('password_confirmation') }}</span>
                                    <span class="alert login-alert mb-0 mt-1 p-1 fz-12" role="alert" id="password_confirmation_alert"></span>
                                </div>

                                @if( env('APP_ENV') != 'local' && settings('display_google_captcha') == ACTIVE_STATUS_ACTIVE )
                                    <div class="input-group">
                                        <div>
                                            {{ view_html(NoCaptcha::display()) }}
                                        </div>
                                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('g-recaptcha-response') }}">{{ $errors->first('g-recaptcha-response') }}</span>
                                    </div>
                                @endif

                                <div class="checkbox pl-0">
                                    <input id="agreement" type="checkbox" name="{{ fake_field('check_agreement') }}" data-cval-name="The accept our terms and conditions field" data-cval-rules ="required">
                                    <label class="fz-14 mb-2 text-muted" for="agreement"><a target="_blank" href="{{route('auction-rules.index')}}">{{  __('Accept our terms and Conditions.') }}</a></label>

                                    <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('check_agreement') }}">{{ $errors->first('check_agreement') }}</span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="reg_submit" class="btn mt-5 w-100 default-color text-white custom-btn form-submission-button">{{ __('Register') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <div class="text-center pt-1 laraframe-form">
                        <p class="text-muted">{{__('Already have an account?')}}</p>
                        <a class="txt2 text-secondary" data-toggle="modal" data-dismiss="modal" aria-label="Close" data-target="#loginModal" href="javascript;">{{ __('Login') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======= Start: footer section ======== -->
<footer>
    <div class="footer">
        <div class="p-y-50">
            <div class="container">

                <!-- Start: footer middle section -->
                <div class="footer-border">
                    <div class="p-b-50">
                        <div class="row">

                            <!-- Start: property cities -->
                            <div class="col-lg-5 col-md-6 p-t-50">
                                <h5 class="text-uppercase font-weight-bold mb-5 text-white">{{__('Popular Categories')}}</h5>

                                <!-- Start: property cities list -->
                                <div class="prop-city">
                                    <ul class="list">
                                        @foreach(get_popular_category(8) as $category )
                                            <li>
                                                <a href="{{route('auction.home', $category->slug)}}">{{$category->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- End: property cities list -->

                            </div>
                            <!-- End: property cities -->

                            <!-- Start: popular posts -->
                            <div class="col-lg-4 col-md-6 p-t-50">
                                <h5 class="text-uppercase font-weight-bold mb-5 text-white">{{__('Popular Auction')}}</h5>

                                <!-- Start: popular posts list -->
                                <div class="popular-post">

                                    @foreach(get_popular_auction(2) as $auction)

                                    <!-- Start: single card -->
                                    <div class="popular-post-card mb-3">
                                        <div class="media">
                                            <img class="mr-3" src="{{auction_image($auction->images[0])}}" alt="image">
                                            <div class="align-self-center media-body">
                                                <a href="{{route('auction.show', $auction->id)}}">
                                                    <span class="mt-0 line-height-1 d-block text-capitalize text-truncate footer-title-width">{{$auction->title}}</span>
                                                </a>
                                                <p class="color-999">{{!is_null($auction->created_at) ? $auction->created_at->diffForHumans()  : ''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End: single card -->

                                    @endforeach

                                </div>
                                <!-- End: popular posts list -->

                            </div>
                            <!-- End: popular posts -->

                            <!-- Start: get in touch -->
                            <div class="col-lg-3 col-md-12 p-t-50">
                                <h5 class="text-uppercase font-weight-bold mb-5 text-white">get in touch</h5>

                                <div class="get-in-touch">
                                    <ul>
                                        <li class="d-block">
                                            <i class="fa fa-map-marker mr-3"></i>
                                            {{settings('business_address')}}
                                        </li>
                                        <li class="d-block">
                                            <i class="fa fa-phone"></i>
                                            {{settings('business_contact_number')}}
                                        </li>
                                        <li class="d-block">
                                            <i class="fa fa-envelope"></i>
                                            <a href="#">
                                                {{settings('admin_receive_email')}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End: get in touch -->

                        </div>
                    </div>
                </div>
                <!-- End: footer middle section -->

                <!-- Start: footer bottom section -->
                <div class="footer-bottom">
                    <div class="row">

                        <!-- Start: copy right area -->
                        <div class="col-md-12">
                            <p>&copy; Copyright {{settings('copy_rights_year')}} All rights reserved By {{settings('rights_reserved')}}</p>
                        </div>
                        <!-- End: copy right area -->
                    </div>
                </div>
                <!-- End: footer bottom section -->
            </div>
        </div>
    </div>
</footer>
<!-- ======== End: footer section ========= -->
