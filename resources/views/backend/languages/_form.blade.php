@basekey
<div class="form-group">
    {{ Form::label(fake_field('name'), __('Name')) }}
    {{ Form::text(fake_field('name'), old('name', isset($language) ? $language->name: null), ['class' => form_validation($errors, 'name'),'data-cval-name' => 'This name field', 'data-cval-rules' => 'required|escapeInput']) }}
    <span class="invalid-feedback cval-error"
          data-cval-error="{{ fake_field('name') }}">{{ $errors->first('name') }}</span>
</div>

<div class="form-group">
    {{ Form::label(fake_field('short_code'), __('Short Code')) }}
    {{ Form::text(fake_field('short_code'), old('name', isset($language) ? $language->short_code: null), ['class' => form_validation($errors, 'short_code'),'data-cval-name' => 'This short code field', 'data-cval-rules' => 'required|escapeInput|min:2|max:2']) }}
    <span class="invalid-feedback cval-error"
          data-cval-error="{{ fake_field('short_code') }}">{{ $errors->first('short_code') }}</span>
</div>

<div class="form-group">
    {{ Form::label(fake_field('icon'), __('Icon'), ['class' => 'd-block']) }}
    <div class="fileinput fileinput-new" data-provides="fileinput">
        @if(isset($language) && $language->icon)
            <div class="fileinput-new img-thumbnail fixer-lang-img">
                <img class="d-block wi-120" data-src="{{ get_language_icon($language->icon) }}" alt="..."
                     src="{{ get_language_icon($language->icon) }}">
            </div>
        @else
            <div class="fileinput-preview img-thumbnail wi-120 hi-80">
                <i class="fa fa-image fa-5x"></i>
            </div>
        @endif
        <div>
            <span class="btn btn-sm btn-outline-secondary btn-file">
                <span class="fileinput-new">{{ __('Select Icon') }}</span>
                <span class="fileinput-exists">{{ __('Change') }}</span>
                    {{ Form::file(fake_field('icon'), ['id' => 'icon', 'data-cval-name' => 'The icon', 'data-cval-rules' => 'files:jpg,png,jpeg|max:100']) }}
            </span>

            <a href="#" class="btn btn-sm btn-outline-secondary fileinput-exists"
               data-dismiss="fileinput">{{ __('Remove') }}</a>
            <span class="invalid-feedback cval-error"
                  data-cval-error="{{ fake_field('icon') }}">{{ $errors->first('icon') }}</span>
        </div>
    </div>
</div>

@isset($language)
    <div class="form-group">
        {{ Form::label(fake_field('is_active'), __('Status')) }}
        {{ Form::select(fake_field('is_active'), active_status(), old('name', isset($language) ? $language->is_active: null), ['class' => form_validation($errors, 'is_active'),'data-cval-name' => 'This status field', 'data-cval-rules' => 'required|escapeInput|in:'. array_to_string(active_status())]) }}
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('is_active') }}">{{ $errors->first('is_active') }}</span>
    </div>
@endisset

<div class="form-group">
    {{ Form::submit($buttonText,  ['class' => 'btn btn-sm btn-info form-submission-button']) }}
    {{ Form::button('<i class="fa fa-undo"></i>',['class'=>'btn btn-danger btn-sm btn-sm-block reset-button']) }}
</div>
