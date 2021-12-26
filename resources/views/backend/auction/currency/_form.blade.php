@basekey

<div class="form-group form-row">
    <div class="col-md-3">
        <label class="{{fake_field('form-control-label float-right mr-3 mb-3')}}" for="{{fake_field('currency-name')}}">{{__('Currency Name :')}}</label>
    </div>
    <div class="col-md-9">
        {{Form::text(fake_field('name'), old('name', isset($currency) ? $currency->name : ''), ['class' => form_validation($errors, 'name form-control'), 'id' => fake_field('currency-name'), 'data-cval-name' => 'Currency name required', 'data-cval-rules' => 'required|min:3' ] )}}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('name') }}">{{ $errors->first('name') }}</span>
    </div>
</div>


<div class="form-group form-row">
    <div class="col-md-3">
        <label class="{{fake_field('form-control-label float-right mr-3 mb-3')}}" for="{{fake_field('symbol')}}">{{__('Symbol :')}}</label>
    </div>

    <div class="col-md-9">
        {{Form::text(fake_field('symbol'), old('symbol', isset($currency) ? $currency->symbol : ''), ['class' => form_validation($errors, 'symbol form-control'), 'id' => fake_field('symbol'), 'data-cval-name' => 'Symbol is required', 'data-cval-rules' => 'required' ] )}}
        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('symbol') }}">{{ $errors->first('symbol') }}</span>
    </div>
</div>

<div class="form-group form-row">
    <div class="col-md-3">
        <label class="form-control-label mb-3 float-right mr-3" for="customFile">{{__('Choose file :')}}</label>
    </div>
    <div class="col-md-9">
        <div class="single-element multi-element clearfix">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="image-area">
                    <div class="existed-image">
                        <img src="{{currency_logo(isset($currency) ? $currency->logo : '')}}" alt=""  class="img-fluid wi-100" >
                    </div>
                    <div class="fileinput-preview fileinput-exists img-thumbnail m-b-20"></div>
                </div>
                <div class="uplode-image-style my-2">
                    <span class="btn btn-sm btn-outline-secondary custom-up-btn btn-file">
                        <label class="my-1" for="image-input">Select Image</label>
                        {{ Form::file('logo', [old('logo'),'accept'=>'.gif,.jpg,.png,.svg','class'=>'multi-input', 'data-cval-name' => 'Invalid field', 'placeholder' => 'max' ,'id' => fake_field('image-input'),])}}
                    </span>
                </div>
            </div>
            <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('logo') }}">{{ $errors->first('logo') }}</span>
            <span class="text-muted">{{__('Image dimensions equal or less than')}} <strong>100x100</strong>, {{__('And size')}} <strong>1MB</strong> {{__('or less')}}</span>
        </div>
    </div>
</div>

<div class="form-group form-row">
    <div class="col-md-3">
        <label for="{{ fake_field('is_active') }}"
               class="{{fake_field('form-control-label mb-3 float-right mr-3')}}">{{ __('Status :') }}</label>
    </div>
    <div class="col-md-9">
        <div class="cm-switch">
            {{ Form::radio(fake_field('is_active'), ACTIVE_STATUS_ACTIVE, (string)old('is_active', isset($currency) ? $currency->is_active : ACTIVE_STATUS_ACTIVE) === (string)ACTIVE_STATUS_ACTIVE ? true : false, ['id' => fake_field('is_active') . '-active', 'class' => 'cm-switch-input', 'data-cval-name' => 'The active status field', 'data-cval-rules' => 'required|integer|in:' . array_to_string(active_status())]) }}
            <label for="{{ fake_field('is_active') }}-active" class="cm-switch-label">{{ __('Active') }}</label>

            {{ Form::radio(fake_field('is_active'), ACTIVE_STATUS_INACTIVE, (string)old('is_active', isset($currency) ? $currency->is_active : false) === (string)ACTIVE_STATUS_INACTIVE ? true : false, ['id' => fake_field('is_active') . '-inactive', 'class' => 'cm-switch-input']) }}
            <label for="{{ fake_field('is_active') }}-inactive" class="cm-switch-label">{{ __('Inactive') }}</label>
        </div>
    </div>
</div>

<div class="form-group form-row">
    <div class="col-md-3">
        <label class="{{fake_field('form-control-label float-right mr-3 mb-3')}}" for="{{fake_field('method')}}">{{__('Payment Methods :') }}</label>
    </div>

    <div class="col-md-9">
        <div class="m-scroller mCustomScrollbar m-hi-300" id="mySel">
            @foreach($paymentMethods as $paymentMethod)
                <div class="custom-control custom-checkbox">
                    <input {{ isset($currencyArray) && in_array($paymentMethod->id, $currencyArray) ? 'checked' : '' }} type="checkbox" name="payment_methods[]" value="{{$paymentMethod->id}}" class="custom-control-input" id="{{fake_field($paymentMethod->id)}}">
                    <label class="custom-control-label" for="{{fake_field($paymentMethod->id)}}">{{$paymentMethod->name}}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="form-row">

    <div class="col-md-9 offset-md-3">
        <span class="d-block text-secondary">{{__('Note : You will not be able to delete currencies after creating one')}}</span>
    </div>
</div>

<div class="form-group">
    {{ Form::submit($buttonText,['class'=>'btn btn-info mt-2 float-right']) }}
</div>
