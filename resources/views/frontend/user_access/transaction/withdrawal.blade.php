@extends('frontend.layouts.master')
@section('content')

    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="p-y-100">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8">

                    {{ Form::open(['route'=>['withdrawal-form.store', $wallet->id],'class'=>'form-horizontal validator']) }}
                    @method('post')
                    @basekey

                    <div class="card">
                        <div class="card-header py-4">
                            <h3 class="font-weight-bold d-inline text-secondary">{{$title}}</h3>
                            <span class="color-999 mt-2 fz-14 d-block">Minimum Withdrawal : <span class="font-weight-bold fz-16 color-default"> {{$wallet->currency->min_withdrawal}}</span></span>
                            <span class="text-muted d-inline-block mt-1">{{__('In')}} <span class="font-weight-bold">{{$wallet->currency->symbol}}</span></span>
                        </div>
                        <div class="card-body p-5">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-lighter text-secondary" for="{{ fake_field('payment_method') }}">Select Deposit Method <span class="float-right d-inline-block">:</span></label>
                                <div class="col-sm-8">
                                    {{ Form::select(fake_field('payment_method'), payment_methods(), old('payment_method', 1), ['class' => 'custom-select my-1 mr-sm-2', 'id' => fake_field('payment_method')]) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-sm-4 col-form-label font-weight-lighter text-secondary">Amount <span class="float-right d-inline-block">:</span></label>
                                <div class="col-sm-8">
                                    {{ Form::number(fake_field('amount'), old('amount'), ['class'=> 'form-control', 'id' => fake_field('amount'),'data-cval-name' => 'The amount field','data-cval-rules' => 'required|decimal']) }}
                                    <span class="invalid-feedback">{{ $errors->first('amount') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label font-weight-lighter text-secondary">Pyapal Email <span class="float-right d-inline-block">:</span></label>
                                <div class="col-sm-8">
                                    {{ Form::email (fake_field('address'), old('address'), ['class'=> 'form-control', 'id' => fake_field('address'),'data-cval-name' => 'The email address field','data-cval-rules' => 'required|decimal']) }}
                                    <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <button value="Submit Design" type="submit" class="btn custom-btn float-right has-spinner my-2 has-spinner my-2" id="two">{{__('Withdrawal Request')}}</button>
                        </div>
                    </div>

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
    <!-- ::::::::::::::::::::::::END PAGE HEAD ::::::::::::::::::::::::: -->

@endsection

@section('script')
    <!-- for button loader -->
    <script src="{{ asset('vendor/button_loader/jquery.buttonLoader.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('.has-spinner').click(function () {
                var btn = $(this);
                $(btn).buttonLoader('start');
                setTimeout(function () {
                    $(btn).buttonLoader('stop');
                }, 10000);
            });
        });
    </script>
@endsection

@section('style')
    <style>

        .card {

            box-shadow: 0 0 15px 1px #efefef;
            border: 1px solid rgba(142, 142, 142, 0.23);

        }

        .card-header {

            border-bottom: 1px solid rgba(162, 162, 162, 0.13);

        }

        .custom-select {
            border-radius: 0;
            -webkit-appearance: none;
            -moz-appearance:    none;
            appearance:         none;
        }

    </style>
@endsection

