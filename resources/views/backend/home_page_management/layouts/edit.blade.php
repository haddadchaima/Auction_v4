@extends('layouts.master')
@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('layout.index') }}" class="btn btn-sm btn-info back-button">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>
                @endslot
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {{ Form::open(['route'=>['layout.update', $layout->id],'class'=>'form-horizontal cvalidate']) }}
                        @method('put')
                        @basekey
                        <div class="form-group form-row boot-select">
                            <div class="col-md-3">
                                <label for="{{ fake_field('layout_type') }}" class="form-control-label mb-3 float-right mr-3">{{ __('Section :') }}</label>
                            </div>

                            <div class="col-md-9">
                                <input type="hidden" value="{{$layout->layout_type}}" name="{{fake_field('layout_type')}}">
                                {{ Form::select(fake_field('layout_type'), layout_types(), old('layout_type', $layout->layout_type), ['class'=> 'custom-select', 'id' => fake_field('layout_type'),'data-cval-name' => 'This field', 'placeholder' => __('Select Section Type'), 'disabled' => true])}}
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
                                        {{Form::text(fake_field('title'), old('title', isset($layout) ? $layout->title : null), ['class' => 'form-control', 'id' => fake_field('currency-title'), 'data-cval-title' => 'Payment method title required', 'data-cval-rules' => 'required|min:3' ] )}}
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
                                {{Form::number(fake_field('total'), old('total', isset($layout) ? $layout->total : null), ['class' => 'form-control', 'id' => fake_field('total'), 'data-cval-total' => 'Payment method total required', 'data-cval-rules' => 'required' ] )}}
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
                                    {{ Form::radio(fake_field('is_active'), ACTIVE_STATUS_ACTIVE, (string)old('is_active', isset($layout) ? $layout->is_active : ACTIVE_STATUS_ACTIVE) === (string)ACTIVE_STATUS_ACTIVE ? true : false, ['id' => fake_field('is_active') . '-active', 'class' => 'cm-switch-input', 'data-cval-name' => 'The active status field', 'data-cval-rules' => 'required|integer|in:' . array_to_string(active_status())]) }}
                                    <label for="{{ fake_field('is_active') }}-active" class="cm-switch-label">{{ __('Active') }}</label>

                                    {{ Form::radio(fake_field('is_active'), ACTIVE_STATUS_INACTIVE, (string)old('is_active', isset($layout) ? $layout->is_active : false) === (string)ACTIVE_STATUS_INACTIVE ? true : false, ['id' => fake_field('is_active') . '-inactive', 'class' => 'cm-switch-input']) }}
                                    <label for="{{ fake_field('is_active') }}-inactive" class="cm-switch-label">{{ __('Inactive') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::submit('submit',['class'=>'btn btn-info mt-2 px-4 float-right']) }}
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.cvalidate').cValidate();
        });
    </script>
@endsection
