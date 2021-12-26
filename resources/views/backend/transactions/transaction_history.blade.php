@extends('layouts.master')
@section('title', $title)

@section('content')

    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="row">
        <div class="col-12">
            @include('layouts.includes.breadcrumb')
        </div>
        <div class="col-12">
        @component('components.card',['type' => 'info', 'class' => 'card text-right mt-4'])

            @slot('header')
                {{$list['search']}}
            @endslot

            @component('components.table',['class' => 'cm-data-table '])

                @slot('thead')
                    <tr class="bg-info text-white">
                        <th class="all text-left">{{ __('Details') }}</th>
                        <th class="min-phone-l text-center">{{ __('Ref ID') }}</th>
                        <th class="min-phone-l">{{ __('Amount') }}</th>
                        <th class="min-phone-l">{{ __('Date') }}</th>
                    </tr>
                @endslot

                @foreach($list['items'] as $earning)
                        <tr>
                            <td class="text-left"> <span class="font-weight-bold">{{system_transaction_type($earning->journal)}}</span></td>
                            <td class="text-center">{{$earning->ref_id}}</td>
                            <td class="text-right font-weight-bold color-default">${{$earning->amount}}</td>
                            <td class="text-right">{{$earning->created_at !== null ? $earning->created_at->diffForHumans():''}}</td>
                        </tr>
                @endforeach

            @endcomponent

            @slot('footer')
                    {{ $list['pagination'] }}
            @endslot
        @endcomponent

        <div class="col-12">
            <div class="row justify-content-end">
                <div class="col-sm-12 col-md-6">
                    <table class="table text-right my-5">
                        <thead>
                        <tr>
                            <th class="border-bottom-0">Sub Total</th>
                            <th class="border-bottom-0">:</th>
                            <th class="border-bottom-0"> {{$previousTotal}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($currentCalculation as $key=>$val)
                            <tr>
                                <td>{{system_transaction_type($key)}}</td>
                                <td>:</td>
                                <td> {{ $currentCalculation[$key] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>Others</td>
                                <td>:</td>
                                <td>0.00</td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot class="border-bottom">
                            <th class="bg-light">Grand Total</th>
                            <td class="bg-light">:</td>
                            <th class="bg-light"> {{ !empty($currentCalculation) ? bcadd(array_sum($currentCalculation),$previousTotal) : $previousTotal }}</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-sm-4 clo-md-3 transaction-list">
                            <a class="text-capitalize border my-1 w-100 py-2 px-3 d-inline-block {{empty($transactionType) ? 'active' : '' }}" href="{{route('admin-transaction-history.index')}}">{{__('all transactions')}}</a>
                        </div>
                        @foreach(system_transaction_type() as $key=>$val)
                            <div class="col-sm-4 clo-md-3 transaction-list">
                                <a class="text-capitalize border my-1 w-100 py-2 px-3 d-inline-block {{$transactionType==$key ? 'active' : ''}}" href="{{route('admin-transaction-history.index', $key)}}">{{$val}}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- ::::::::::::::::::::::::END PAGE HEAD ::::::::::::::::::::::::: -->

@endsection

@section('style-top')
    @include('layouts.includes.list-css')
    <link rel="stylesheet" href="{{asset('css/table_replace.css')}}">
@endsection

@section('script')
    @include('layouts.includes.list-js')
    <script>
        (function($){
            $('.cm-filter-toggler').on('click',function(){
                $('.cm-filter-container').slideToggle();
            })
        })(jQuery)
    </script>
@endsection
