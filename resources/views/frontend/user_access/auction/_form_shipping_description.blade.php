<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="{{ fake_field('name') }}" class="control-label text-muted required">{{ __('Name :') }}</label>
            {{Form::text(fake_field('name'), old('name'), ['class' => 'form-control',  'id' => fake_field('name'), 'data-cval-name' => 'Store name', 'data-cval-rules' => 'required|min:3' ] )}}
            <span class="invalid-feedback cval-error"
                  data-cval-error="{{ fake_field('name') }}">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="{{ fake_field('phone_number') }}"
                   class="control-label text-muted required">{{ __('Contact Number :') }}</label>
            {{Form::text(fake_field('phone_number'), old('phone_number'), ['class' => 'form-control', 'id' => fake_field('phone_number'), 'data-cval-phone_number' => 'Store phone_number required', 'data-cval-rules' => 'required|unique|min:3' ] )}}
            <span class="invalid-feedback cval-error"
                  data-cval-error="{{ fake_field('phone_number') }}">{{ $errors->first('phone_number') }}</span>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="{{ fake_field('address') }}"
                   class="control-label text-muted required">{{ __('Street Address :') }}</label>

            {{Form::text(fake_field('address'), old('address'), ['class' => 'form-control',  'id' => fake_field('address'), 'data-cval-address' => 'Street address required', 'data-cval-rules' => 'required|min:3' ] )}}
            <span class="invalid-feedback cval-error"
                  data-cval-error="{{ fake_field('address') }}">{{ $errors->first('address') }}</span>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="{{ fake_field('country') }}"
                   class="control-label text-muted required">{{ __('Country :') }}</label>

            {{ Form::select(fake_field('country_id'), $countries, old('country_id'), ['class'=> 'custom-select country', 'v-on:change'=> "onChange(".'$event'.")", 'id' => fake_field('country_id'),'data-cval-name' => 'The parent category field', 'data-cval-rules' => 'required','placeholder' => __('Select Country')]) }}
            <span class="invalid-feedback cval-error"
                  data-cval-error="{{ fake_field('country_id') }}">{{ $errors->first('country_id') }}</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="{{ fake_field('post_code') }}"
                   class="control-label text-muted required">{{ __('Zip / Post Code :') }}</label>

            {{Form::text(fake_field('post_code'), old('post_code'), ['class' => 'form-control', 'id' => fake_field('post_code'), 'data-cval-post_code' => 'Store post_code required', 'data-cval-rules' => 'required|min:3' ] )}}
            <span class="invalid-feedback cval-error"
                  data-cval-error="{{ fake_field('post_code') }}">{{ $errors->first('post_code') }}</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="{{ fake_field('city') }}" class="control-label text-muted required">{{ __('City :') }}</label>

            {{Form::text(fake_field('city'), old('city'), ['class' => 'form-control',  'id' => fake_field('city'), 'data-cval-city' => 'City name required', 'data-cval-rules' => 'required|min:3' ] )}}
            <span class="invalid-feedback cval-error"
                  data-cval-error="{{ fake_field('city') }}">{{ $errors->first('city') }}</span>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="{{ fake_field('state_id') }}" class="control-label text-muted required">
                {{ __('State :') }}
                <span v-show="isLoading">
                    <i class="fa fa-spinner fa-spin fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </span>
            </label>

            <div class="form-group">
                <select class="custom-select" name="state_id" :disabled="disableStateDom">
                    <option>{{__('Select State')}}</option>
                    <option :selected="selectedState === index" v-for="(state, index) in states" :value="index">@{{
                        state }}
                    </option>
                </select>
            </div>

            <span class="invalid-feedback cval-error"
                  data-cval-error="{{ fake_field('state_id') }}">{{ $errors->first('state_id') }}</span>
        </div>
    </div>
</div>
