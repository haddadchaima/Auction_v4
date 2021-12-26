@extends('frontend.layouts.master')
@section('content')

    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="p-y-100">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8">

                    {{ Form::open(['route'=>['wallet-deposit.store', $wallet->id],'class'=>'form-horizontal validator']) }}
                    @method('post')
                    @basekey

                    <div class="card">
                        <div class="card-header">
                            <h3 class="font-weight-bold d-inline text-secondary">{{$title}}</h3>
                            <span class="text-muted ml-2">(In USD)</span>
                        </div>
                        <div class="card-body p-5">
                            <div class="form-group">
                                <label class="font-weight-lighter text-secondary" for="{{ fake_field('payment_method') }}">Select Deposit Method :</label>
                                {{ Form::select(fake_field('payment_method'), payment_methods(), old('payment_method', null), ['class' => 'custom-select my-1 mr-sm-2', 'id' => fake_field('payment_method'), 'placeholder' =>  __('Select Payment Method')]) }}
                                <span class="invalid-feedback">{{ $errors->first('payment_method') }}</span>
                            </div>
                            <div class="form-group mt-4 mb-0">
                                <label class="font-weight-lighter text-secondary" for="wallet">Total Amount :</label>
                                {{ Form::text(fake_field('amount'), old('amount'), ['class'=> 'form-control', 'id' => fake_field('amount'),'data-cval-name' => 'The amount field','data-cval-rules' => 'required|decimal']) }}
                                <span class="invalid-feedback">{{ $errors->first('amount') }}</span>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <button value="Submit Design" type="submit" class="btn custom-btn float-right has-spinner my-2" id="two">{{__('Request Deposit')}}</button>
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

@section('style-bottom')
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

