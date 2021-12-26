@basekey
{{--user group field--}}
<div class="form-group">
    <label for="{{ fake_field('role_id') }}" class="col-md-3 control-label required">{{ __('User Role') }}</label>
    <div class="col-md-9">
        @if(!in_array($user->id, config('commonconfig.fixed_users')) && $user->id != Auth::user()->id)
            {{ Form::select(fake_field('role_id'), $roles, old('role_id', $user->role_id),['class' => form_validation($errors, 'role_id'),'id' => fake_field('role_id'),'placeholder' => __('Select Role'),'data-cval-name' => 'The user role field','data-cval-rules' => 'required|in:'.array_to_string($roles->toArray())]) }}
            <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('role_id') }}">{{ $errors->first('role_id') }}</span>
        @else
            <p class="form-control">{{ $roles[$user->role_id] }}</p>
        @endif
    </div>
</div>
{{--first name--}}
<div class="form-group">
    <label for="{{ fake_field('first_name') }}" class="col-md-3 control-label required">{{ __('First Name') }}</label>
    <div class="col-md-9">
        {{ Form::text(fake_field('first_name'), old('first_name', $user->profile->first_name), ['class'=> form_validation($errors, 'first_name'), 'id' => fake_field('first_name'),'data-cval-name' => 'The first name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('first_name') }}">{{ $errors->first('first_name') }}</span>
    </div>
</div>
{{--last name--}}
<div class="form-group">
    <label for="{{ fake_field('last_name') }}" class="col-md-3 control-label required">{{ __('Last Name') }}</label>
    <div class="col-md-9">
        {{ Form::text(fake_field('last_name'), old('last_name', $user->profile->last_name), ['class'=>form_validation($errors, 'last_name'), 'id' => fake_field('last_name'),'data-cval-name' => 'The last name field','data-cval-rules' => 'required|escapeInput|alphaSpace']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('last_name') }}">{{ $errors->first('last_name') }}</span>
    </div>
</div>
{{--email--}}
<div class="form-group">
    <label class="col-md-3 control-label required">{{ __('Email') }}</label>
    <div class="col-md-9">
        <p class="form-control form-control-sm">{{ $user->email }}</p>
    </div>
</div>
{{--username--}}
<div class="form-group">
    <label class="col-md-3 control-label required">{{ __('Username') }}</label>
    <div class="col-md-9">
        <p class="form-control form-control-sm">{{ $user->username }}</p>
    </div>
</div>
{{--address--}}
<div class="form-group">
    <label for="{{ fake_field('address') }}" class="col-md-3 control-label">{{ __('Address') }}</label>
    <div class="col-md-9">
        {{ Form::textarea(fake_field('address'),  old('address', $user->profile->address), ['class'=>form_validation($errors, 'address'), 'id' => fake_field('address'), 'rows'=>2,'data-cval-name' => 'The address field','data-cval-rules' => 'escapeText']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('address') }}">{{ $errors->first('address') }}</span>
    </div>
</div>
{{--submit button--}}
<div class="form-group">
    <div class="col-md-offset-3 col-md-9">
        {{ Form::submit(__('Update Information'),['class'=>'btn btn-info btn-sm btn-left form-submission-button']) }}
        {{ Form::button('<i class="fa fa-undo"></i>',['class'=>'btn btn-sm btn-danger', 'type' => 'reset']) }}
    </div>
</div>
