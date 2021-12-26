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
                @component('components.card',['type'=> 'info', 'class'=>'mt-3'])
                    {{ Form::open(['route'=>['profile.update-password'],'class'=>'form-horizontal validator','method'=>'put']) }}
                    <input type="hidden" value="{{base_key()}}" name="base_key">
                    {{--password--}}
                    <div class="form-group">
                        <label for="{{ fake_field('password') }}"
                               class="control-label required">{{ __('Current Password') }}</label>
                        {{ Form::password(fake_field('password'), ['class'=>form_validation($errors, 'password'), 'placeholder' => __('Enter current password'), 'id' => fake_field('password'),'data-cval-name' => 'The password','data-cval-rules' => 'required|escapeInput']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('password') }}">{{ $errors->first('password') }}</span>
                    </div>
                    {{--new password--}}
                    <div class="form-group">
                        <label for="new_password"
                               class="control-label required">{{ __('New Password') }}</label>
                        {{ Form::password('new_password', ['class'=>form_validation($errors, 'new_password'), 'placeholder' => __('Enter new password'), 'id' => 'new_password','data-cval-name' => 'The new password','data-cval-rules' => 'required|escapeInput|between:6,32|followedBy:new_password_confirmation']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('new_password') }}">{{ $errors->first('new_password') }}</span>
                    </div>
                    {{--email--}}
                    <div class="form-group">
                        <label for="new_password_confirmation"
                               class="control-label required">{{ __('Confirm New Password') }}</label>
                        {{ Form::password('new_password_confirmation', ['class'=>form_validation($errors, 'new_password_confirmation'), 'placeholder' => __('Confirm new password'), 'id' => 'new_password_confirmation','data-cval-name' => 'The confirm new password','data-cval-rules' => 'required|escapeInput|between:6,32|follow:new_password']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('new_password_confirmation') }}">{{ $errors->first('new_password_confirmation') }}</span>
                    </div>
                    {{--submit button--}}
                    <div class="form-group">
                        {{ Form::submit(__('Update Password'),['class'=>'btn btn-info btn-sm btn-left btn-sm-block form-submission-button']) }}
                    </div>
                    {{ Form::close() }}
            </div>
            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.validator').cValidate();
        });
    </script>
@endsection
