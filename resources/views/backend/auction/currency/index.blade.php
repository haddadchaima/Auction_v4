@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card', ['type' => 'info'])
                @slot('header')
                    {{ $list['search'] }}
                @endslot
                @component('components.table',['class'=> 'cm-data-table'])
                    @slot('thead')
                        <tr class="bg-info">
                            <th class="min-phone-l">{{ __('Currency Name') }}</th>
                            <th class="min-phone-l">{{ __('Symbol') }}</th>
                            <th class="min-phone-l">{{ __('Status') }}</th>
                            <th class="min-phone-l">{{ __('Created At') }}</th>
                            <th class="text-right all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$currency)
                        <tr>
                            <td>{{ $currency->name}}</td>
                            <td>{{ $currency->symbol}}</td>
                            <td><span class="{{$currency->is_active == ACTIVE_STATUS_ACTIVE ? 'item_active' : 'item_deactivate'}}">{{active_status($currency->is_active)}}</span></td>
                            <td>{{ $currency->created_at->format('Y-m-d') }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('currency.edit',$currency->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Edit Info') }}
                                        </a>
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

@endsection

@section('style')
    @include('layouts.includes.list-css')
@endsection

@section('script')
    @include('layouts.includes.list-js')
@endsection
