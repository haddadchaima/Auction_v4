@extends('frontend.layouts.master')

@section('content')
    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="p-b-100  p-t-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('layouts.includes.breadcrumb')
                </div>
                <div class="col-12">
                    @component('components.card',['type' => 'info', 'class' => 'card mt-4'])

                        @slot('header')
                            {{$list['search']}}
                            {{$list['filters']}}
                        @endslot

                        @component('components.table',['class' => 'cm-data-table'])

                            @slot('thead')
                                <tr class="bg-info text-white text-center">
                                    <th class="all text-left pr-2">{{ __('Ref ID') }}</th>
                                    <th class="min-phone-l pr-2">{{ __('Payment Method') }}</th>
                                    <th class="min-phone-l pr-2">{{ __('Amount') }}</th>
                                    <th class="min-phone-l pr-2">{{ __('Status') }}</th>
                                    <th class="min-phone-l pr-2">{{ __('Created') }}</th>
                                    <th class="min-desktop-l">{{ __('Address') }}</th>
                                    <th class="min-desktop-l">{{ __('Txn ID') }}</th>
                                    <th class="min-desktop-l">{{ __('System Fee') }}</th>
                                </tr>
                            @endslot

                            @foreach( $list['items'] as $key=>$deposit)
                                <tr class="text-center position-relative">
                                    <td class="text-left"><span class="font-weight-bold">{{$deposit->ref_id}}</span></td>
                                    <td><span class="badge {{config('commonconfig.payment_methods.' . ( !is_null($deposit) ? $deposit->payment_method : '' ) . '.color_class')}}"> {{ config('commonconfig.payment_methods.' . ( !is_null($deposit->payment_method) ? $deposit->payment_method : '') . '.text')}} </span></td>
                                    <td class="font-weight-bold text-success">{{$deposit->amount}}</td>
                                    <td><span class="badge {{config('commonconfig.payment_status.' . ( !is_null($deposit) ? $deposit->status : '' ) . '.color_class')}}"> {{ config('commonconfig.payment_status.' . ( !is_null($deposit->status) ? $deposit->status : '') . '.text')}} </span></td>
                                    <td>{{$deposit->created_at !== null ? $deposit->created_at->diffForHumans():''}}</td>
                                    <td>{{$deposit->address}}</td>
                                    <td>{{$deposit->payment_txn_id}}</td>
                                    <td>{{$deposit->system_fee}}</td>
                                </tr>
                            @endforeach

                        @endcomponent

                        @slot('footer')
                            {{ $list['pagination'] }}
                        @endslot
                    @endcomponent

                    <div class="col-12">
                        <div class="card mt-4">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-sm-4 clo-md-3 transaction-list">
                                        <a class="text-capitalize border my-1 w-100 py-2 px-3 d-inline-block {{empty($statusType) ? 'active' : '' }}"
                                           href="{{route('deposit.index')}}">{{__('all deposit')}}</a>
                                    </div>
                                    @foreach(payment_status() as $key=>$val)
                                        <div class="col-sm-4 clo-md-3 transaction-list">
                                            <a class="text-capitalize border my-1 w-100 py-2 px-3 d-inline-block {{ $statusType==$key ? 'active' : ''}}"
                                               href="{{route('deposit.index', $key)}}">{{$val}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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
