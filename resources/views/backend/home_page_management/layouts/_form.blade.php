@basekey

<div class="form-group form-row boot-select">
    <div class="col-md-3">
        <label for="{{ fake_field('layout_type') }}" class="form-control-label mb-3 float-right mr-3">{{ __('Section :') }}</label>
    </div>
    <div class="col-md-9">
        {{ Form::select(fake_field('layout_type'), $types, old('layout_type'), ['class'=> 'custom-select', 'id' => fake_field('layout_type'),'data-cval-name' => 'This field', 'data-cval-rules' => 'required', 'placeholder' => __('Select Section Type')]) }}
        <span class="text-muted mt-2 d-block">{{__('You can not create same section twice, Check layout list if searching for a section is already created or not')}}</span>
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('layout_type') }}">{{ $errors->first('layout_type') }}</span>
    </div>
</div>

<div class="form-group form-row">
    <div class="col-md-3">
        <label class="{{fake_field('form-control-label mb-3 float-right mr-3')}}" for="{{fake_field('currency-name')}}">{{__('Title')}}</label>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-9">
                {{Form::text(fake_field('title'), old('title'), ['class' => 'form-control', 'id' => fake_field('currency-title'), 'data-cval-title' => 'Payment method title required', 'data-cval-rules' => 'required|min:3' ] )}}
            </div>
            <div class="col-3">
                <span class="font-weight-bold h3 text-secondary">{{__('- Auction')}}</span>
            </div>
        </div>

        <span class="text-muted d-block mt-1">{{__('Example : Recent')}}</span>
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('title') }}">{{ $errors->first('title') }}</span>
    </div>
</div>

<div class="form-group form-row">
    <div class="col-md-3">
        <label class="{{fake_field('form-control-label mb-3 float-right mr-3')}}" for="{{fake_field('total')}}">{{__('Total Content :')}}</label>
    </div>
    <div class="col-md-4">
        {{Form::number(fake_field('total'), old('total'), ['class' => 'form-control', 'id' => fake_field('total'), 'data-cval-total' => 'Payment method total required', 'data-cval-rules' => 'required' ] )}}
        <span class="text-muted d-block mt-1">{{__('Recommended Content amount is 6')}}</span>
        <span class="invalid-feedback cval-error"
              data-cval-error="{{ fake_field('total') }}">{{ $errors->first('total') }}</span>
    </div>
</div>

<div class="form-group form-row">
    <div class="col-md-3">
        <label for="{{ fake_field('is_active') }}"
               class="{{fake_field('form-control-label mb-3 float-right mr-3')}}">{{ __('Status :') }}</label>
    </div>
    <div class="col-md-9">
        <div class="cm-switch">
            {{ Form::radio(fake_field('is_active'), ACTIVE_STATUS_ACTIVE, (string)old('is_active', isset($paymentMethod) ? $paymentMethod->is_active : ACTIVE_STATUS_ACTIVE) === (string)ACTIVE_STATUS_ACTIVE ? true : false, ['id' => fake_field('is_active') . '-active', 'class' => 'cm-switch-input', 'data-cval-name' => 'The active status field', 'data-cval-rules' => 'required|integer|in:' . array_to_string(active_status())]) }}
            <label for="{{ fake_field('is_active') }}-active" class="cm-switch-label">{{ __('Active') }}</label>

            {{ Form::radio(fake_field('is_active'), ACTIVE_STATUS_INACTIVE, (string)old('is_active', isset($paymentMethod) ? $paymentMethod->is_active : false) === (string)ACTIVE_STATUS_INACTIVE ? true : false, ['id' => fake_field('is_active') . '-inactive', 'class' => 'cm-switch-input']) }}
            <label for="{{ fake_field('is_active') }}-inactive" class="cm-switch-label">{{ __('Inactive') }}</label>
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::submit('submit',['class'=>'btn btn-info mt-2 px-4 float-right']) }}
</div>
