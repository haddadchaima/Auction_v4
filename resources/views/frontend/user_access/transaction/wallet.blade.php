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
                        @endslot

                        @component('components.table',['class' => 'cm-data-table'])

                            @slot('thead')
                                <tr class="bg-info text-white text-center">
                                    <th class="all text-left">{{ __('Currency') }}</th>
                                    <th class="min-phone-l">{{ __('On Order') }}</th>
                                    <th class="min-phone-l">{{ __('Status') }}</th>
                                    <th class="min-phone-l">{{ __('Balance') }}</th>
                                    <th class="min-phone-l">{{ __('Created') }}</th>
                                    <th class="text-right all no-sort">{{ __('Action') }}</th>
                                </tr>
                            @endslot

                            @foreach($wallets as $wallet)
                                <tr class="text-center position-relative">
                                    <td class="text-left"><span class="font-weight-bold">{{$wallet->currency->name}}</span>
                                    </td>
                                    <td>{{$wallet->on_order}}</td>
                                    <td><span class="badge {{config('commonconfig.active_status.' . ( !is_null($wallet->currency) ? $wallet->currency->is_active : '' ) . '.color_class')}}"> {{ config('commonconfig.active_status.' . ( !is_null($wallet->currency) ? $wallet->currency->is_active : '') . '.text')}} </span></td>
                                    <td class="font-weight-bold text-success">{{$wallet->balance}}</td>
                                    <td>{{$wallet->created_at !== null ? $wallet->created_at->diffForHumans():''}}</td>
                                    <td>
                                        <div class="address-dropdown">
                                            <a class="flex-sm-fill text-sm-center nav-link p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                                <i class="fa fa-th-list icon-round"></i>
                                            </a>
                                            <div class="address-dropdown-menu">
                                                <div class="dropdown-menu  drop-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{route('wallet-deposit.create', $wallet->id)}}">
                                                        <i class="fa fa-credit-card mr-2"></i>
                                                        {{__('Deposit')}}
                                                    </a>
                                                    @if($wallet->currency->min_withdrawal <= $wallet->balance)
                                                        <a class="dropdown-item" href="{{route('withdrawal-form', $wallet->id)}}">
                                                            <i class="fa fa-money mr-2"></i>
                                                            {{__('Withdraw')}}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        @endcomponent

                        @slot('footer')
                            {{ $list['pagination'] }}
                        @endslot
                    @endcomponent
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
