@basekey
{{--title--}}
<div class="form-group row">
    <label for="{{ fake_field('title') }}" class="col-md-4 col-form-label text-right required">{{ __('Title') }}</label>
    <div class="col-md-8">
        {{ Form::text(fake_field('title'),  old('title', isset($systemNotice) ? $systemNotice->title : null), ['class'=> form_validation($errors, 'title'), 'id' => fake_field('title'),'data-cval-name' => 'The title field','data-cval-rules' => 'required']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('title') }}">{{ $errors->first('title') }}</span>
    </div>
</div>
{{--description--}}
<div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="{{ fake_field('description') }}" class="col-md-4 col-form-label text-right required">{{ __('Description') }}</label>
    <div class="col-md-8">
        {{ Form::textarea(fake_field('description'),  old('description', isset($systemNotice) ? $systemNotice->description : null), ['class'=>form_validation($errors, 'description'), 'id' => fake_field('description'),'data-cval-name' => 'The description field','data-cval-rules' => 'required']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('description') }}">{{ $errors->first('description') }}</span>
    </div>
</div>
{{--type--}}
<div class="form-group row {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="{{ fake_field('type') }}" class="col-md-4 col-form-label text-right required">{{ __('Type') }}</label>
    <div class="col-md-8">
        {{ Form::select(fake_field('type'), $types, old('type', isset($systemNotice) ? $systemNotice->type : null), ['class'=>form_validation($errors, 'type'), 'placeholder'=> __('Select type'), 'id' => fake_field('type'),'data-cval-name' => 'The type field','data-cval-rules' => 'required']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('type') }}">{{ $errors->first('type') }}</span>
    </div>
</div>
{{--Start Time--}}
<div class="form-group row">
    <label for="start_time" class="col-md-4 col-form-label text-right required">{{ __('Start Time') }}</label>
    <div class="col-md-8">
        {{ Form::text(fake_field('start_at'),  old('start_at', isset($systemNotice) ? $systemNotice->start_at : null), ['class'=>form_validation($errors, 'start_at'), 'id' => 'start_time','data-cval-name' => 'The start time field','data-cval-rules' => 'dateTime']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('start_at') }}">{{ $errors->first('start_at') }}</span>
    </div>
</div>
{{--End Time--}}
<div class="form-group row">
    <label for="end_time" class="col-md-4 col-form-label text-right required">{{ __('End Time') }}</label>
    <div class="col-md-8">
        {{ Form::text(fake_field('end_at'),  old('end_at', isset($systemNotice) ? $systemNotice->end_at : null), ['class'=>form_validation($errors, 'end_at'), 'id' => 'end_time','data-cval-name' => 'The end time field','data-cval-rules' => 'dateTime']) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('end_at') }}">{{ $errors->first('end_at') }}</span>
    </div>
</div>

{{--Stauts--}}
<div class="form-group row">
    <label for="{{ fake_field('status') }}" class="col-md-4 col-form-label text-right required">{{ __('Status') }}</label>
    <div class="col-md-8">
        {{ Form::select(fake_field('is_active'), active_status(), old('is_active', isset($systemNotice) ? $systemNotice->status : null), ['class'=>form_validation($errors, 'is_active'), 'id' => fake_field('is_active'),'data-cval-name' => 'The status field','data-cval-rules' => 'required|in:'.array_to_string(active_status())]) }}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('is_active') }}">{{ $errors->first('is_active') }}</span>
    </div>
</div>

{{--submit buttn--}}
<div class="form-group row">
    <div class="offset-4 col-md-8">
        {{ Form::submit($buttonText,['class'=>'btn btn-sm btn-info form-submission-button']) }}
        {{ Form::button('<i class="fa fa-undo"></i>',['class'=>'btn btn-sm btn-danger', 'type' => 'reset']) }}
    </div>
</div>
