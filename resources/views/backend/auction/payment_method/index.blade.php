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
                            <th class="min-phone-l">{{ __('Logo') }}</th>
                            <th class="min-phone-l">{{ __('Payment Method Name') }}</th>
                            <th class="min-phone-l">{{ __('API Service') }}</th>
                            <th class="min-phone-l">{{ __('Status') }}</th>
                            <th class="min-phone-l">{{ __('Created At') }}</th>
                            <th class="text-right all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$paymentMethod)
                        <tr>
                            <td><img class="img-fluid list_image" src="{{payment_method_logo($paymentMethod->logo)}}"></td>
                            <td>{{ $paymentMethod->name}}</td>
                            <td>{{payment_method_api($paymentMethod->api_service)}}</td>
                            <td><span class="{{$paymentMethod->is_active == ACTIVE_STATUS_ACTIVE ? 'item_active' : 'item_deactivate'}}">{{active_status($paymentMethod->is_active)}}</span></td>
                            <td>{{ $paymentMethod->created_at->format('Y-m-d') }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('payment-method.edit',$paymentMethod->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Edit Info') }}
                                        </a>
                                        <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                           data-form-id="urm-{{$paymentMethod->id}}" data-form-method='delete'
                                           href="{{ route('payment-method.destroy',$paymentMethod->id) }}">
                                            <i class="fa fa-trash-o"></i> {{ __('Delete') }}
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
