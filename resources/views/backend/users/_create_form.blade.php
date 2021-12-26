@basekey

{{--first name--}}
<div class="form-group row">
    <label for="{{ fake_field('first_name') }}" class="col-md-4 col-form-label text-right required">{{ __('First Name') }}</label>
    <div class="col-md-8">
        {{ Form::text(fake_field('first_name'),  old('first_name', null), ['class'=>form_validation($errors, 'first_name'), 'id' => fake_field('first_name'),'data-cval-name' => 'The first name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('first_name') }}">{{ $errors->first('first_name') }}</span>
    </div>
</div>
{{--last name--}}
<div class="form-group row">
    <label for="{{ fake_field('last_name') }}"
           class="col-md-4 col-form-label text-right required">{{ __('Last Name') }}</label>
    <div class="col-md-8">
        {{ Form::text(fake_field('last_name'),  old('last_name', null), ['class'=>form_validation($errors, 'last_name'), 'id' => fake_field('last_name'),'data-cval-name' => 'The last name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('last_name') }}">{{ $errors->first('last_name') }}</span>
    </div>
</div>
{{--email--}}
<div class="form-group row">
    <label for="{{ fake_field('email') }}" class="col-md-4 col-form-label text-right required">{{ __('Email') }}</label>
    <div class="col-md-8">
        {{ Form::email(fake_field('email'),  old('email', null), ['class'=>form_validation($errors, 'email'), 'id' => fake_field('email'),'data-cval-name' => 'The email field','data-cval-rules' => 'required|escapeInput|email']) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('email') }}">{{ $errors->first('email') }}</span>
    </div>
</div>
{{--username--}}
<div class="form-group row">
    <label for="{{ fake_field('username') }}"
           class="col-md-4 col-form-label text-right required">{{ __('Username') }}</label>
    <div class="col-md-8">
        {{ Form::text(fake_field('username'),  old('username', null), ['class'=>form_validation($errors, 'username'), 'id' => fake_field('username'),'data-cval-name' => 'The username field','data-cval-rules' => 'required|escapeInput']) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('username') }}">{{ $errors->first('username') }}</span>
    </div>
</div>
{{--address--}}
<div class="form-group row">
    <label for="{{ fake_field('address') }}" class="col-md-4 col-form-label text-right">{{ __('Address') }}</label>
    <div class="col-md-8">
        {{ Form::textarea(fake_field('address'), old('address', null), ['class'=>form_validation($errors, 'address'), 'id' => fake_field('address'), 'rows'=>2,'data-cval-name' => 'The address field','data-cval-rules' => 'escapeInput']) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('address') }}">{{ $errors->first('address') }}</span>
    </div>
</div>

{{--user group field--}}
<div class="form-group row">
    <label for="{{ fake_field('role_id') }}"
           class="col-md-4 col-form-label text-right required">{{ __('User Role') }}</label>
    <div class="col-md-8">
        {{ Form::select(fake_field('role_id'), $roles, old('role_id', null),['class' => form_validation($errors, 'role_id'),'id' => fake_field('role_id'), 'placeholder' => __('Select Role'),'data-cval-name' => 'The user role field','data-cval-rules' => 'required|in:'.array_to_string($roles->toArray())]) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('role_id') }}">{{ $errors->first('role_id') }}</span>
    </div>
</div>
{{--user email status--}}
<div class="form-group row">
    <label for="{{ fake_field('is_email_verified') }}"
           class="col-md-4 col-form-label text-right required">{{ __('Email Status') }}</label>
    <div class="col-md-8">
        {{ Form::select(fake_field('is_email_verified'), email_status(), old('is_email_verified', EMAIL_VERIFICATION_STATUS_INACTIVE), ['class' => form_validation($errors, 'is_email_verified'),'id' => fake_field('is_email_verified'),'data-cval-name' => 'The email status field','data-cval-rules' => 'required|in:'.array_to_string(email_status())]) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('is_email_verified') }}">{{ $errors->first('is_email_verified') }}</span>
    </div>
</div>
{{--user active status--}}
<div class="form-group row">
    <label for="{{ fake_field('is_active') }}"
           class="col-md-4 col-form-label text-right required">{{ __('Account Status') }}</label>
    <div class="col-md-8">
        {{ Form::select(fake_field('is_active'), account_status(), old('is_active', USER_STATUS_ACTIVE), ['class' => form_validation($errors, 'is_active'),'id' => fake_field('is_active'),'data-cval-name' => 'The account status field','data-cval-rules' => 'required|in:'.array_to_string(account_status())]) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('is_active') }}">{{ $errors->first('is_active') }}</span>
    </div>
</div>
{{--user financial status--}}
<div class="form-group row">
    <label for="{{ fake_field('is_financial_active') }}"
           class="col-md-4 col-form-label text-right required">{{ __('Financial Status') }}</label>
    <div class="col-md-8">
        {{ Form::select(fake_field('is_financial_active'), financial_status(), old('is_financial_active', FINANCIAL_STATUS_ACTIVE), ['class' => form_validation($errors, 'is_financial_active'),'id' => fake_field('is_financial_active'),'data-cval-name' => 'The financial status field','data-cval-rules' => 'required|in:'.array_to_string(financial_status())]) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('is_financial_active') }}">{{ $errors->first('is_financial_active') }}</span>
    </div>
</div>
{{--user maintenance accessible status--}}
<div class="form-group row">
    <label for="{{ fake_field('is_accessible_under_maintenance') }}"
           class="col-md-4 col-form-label text-right required">{{ __('Maintenance Access Status') }}</label>
    <div class="col-md-8">
        {{ Form::select(fake_field('is_accessible_under_maintenance'), maintenance_accessible_status(), old('is_accessible_under_maintenance', UNDER_MAINTENANCE_ACCESS_INACTIVE), ['class' => form_validation($errors, 'is_accessible_under_maintenance'),'id' => fake_field('is_accessible_under_maintenance'),'data-cval-name' => 'The maintenance access status field','data-cval-rules' => 'required|in:'.array_to_string(maintenance_accessible_status())]) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('is_accessible_under_maintenance') }}">{{ $errors->first('is_accessible_under_maintenance') }}</span>
    </div>
</div>


{{--submit buttn--}}
<div class="form-group row">
    <div class="offset-4 col-md-8">
        {{ Form::submit(__('Create'),['class'=>'btn btn-sm btn-info form-submission-button']) }}
        {{ Form::button('<i class="fa fa-undo"></i>',['class'=>'btn btn-sm btn-danger', 'type' => 'reset']) }}
    </div>
</div>
