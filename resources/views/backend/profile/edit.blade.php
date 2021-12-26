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
                    {{ Form::open(['route'=>['profile.update'],'class'=>'form-horizontal edit-profile-form','method'=>'put']) }}
                    <input type="hidden" value="{{base_key()}}" name="base_key">
                    {{--first name--}}
                    <div class="form-group">
                        <label for="{{ fake_field('first_name') }}" class="control-label required">{{ __('First Name') }}</label>
                        {{ Form::text(fake_field('first_name'), old('first_name', $user->profile->first_name), ['class'=> form_validation($errors, 'first_name'), 'id' => fake_field('first_name'),'data-cval-name' => 'The first name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('first_name') }}">{{ $errors->first('first_name') }}</span>
                    </div>
                    {{--last name--}}
                    <div class="form-group">
                        <label for="{{ fake_field('last_name') }}" class="control-label required">{{ __('Last Name') }}</label>
                        {{ Form::text(fake_field('last_name'), old('last_name', $user->profile->last_name), ['class'=>form_validation($errors, 'last_name'), 'id' => fake_field('last_name'),'data-cval-name' => 'The last name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('last_name') }}">{{ $errors->first('last_name') }}</span>
                    </div>
                    {{--email--}}
                    <div class="form-group">
                        <label class="control-label required">{{ __('Email') }}</label>
                        <p class="form-control form-control-sm">{{ $user->email }}</p>
                    </div>
                    {{--username--}}
                    <div class="form-group">
                        <label class="control-label required">{{ __('Username') }}</label>
                        <p class="form-control form-control-sm">{{ $user->username }}</p>
                    </div>
                    {{--address--}}
                    <div class="form-group">
                        <label for="{{ fake_field('address') }}" class="control-label">{{ __('Address') }}</label>
                        {{ Form::textarea(fake_field('address'),  old('address', $user->profile->address), ['class'=>form_validation($errors, 'address'), 'id' => fake_field('address'), 'rows'=>2,'data-cval-name' => 'The address name field','data-cval-rules' => 'escapeInput']) }}
                        <span class="invalid-feedback cval-error"
                              data-cval-error="{{ fake_field('address') }}">{{ $errors->first('address') }}</span>
                    </div>
                    {{--submit button--}}
                    <div class="form-group">
                        {{ Form::submit(__('Update'),['class'=>'btn btn-info btn-sm btn-sm-block form-submission-button']) }}
                        {{ Form::button('<i class="fa fa-undo"></i>',['class'=>'btn btn-danger btn-sm btn-sm-block reset-button']) }}

                    </div>
                    {{ Form::close() }}
                @endcomponent
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.edit-profile-form').cValidate();
        });
    </script>
@endsection
