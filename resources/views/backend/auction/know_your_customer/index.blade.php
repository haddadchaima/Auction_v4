@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card', ['type' => 'info'])
                @slot('header')
                    {{ $list['search'] }}
                @endslot

                @include('backend.auction.know_your_customer.index_nav')

                @component('components.table',['class'=> 'cm-data-table'])
                    @slot('thead')
                        <tr class="bg-info text-center">
                            <th class="min-phone-l text-left">{{ __('User Name') }}</th>
                            <th class="min-phone-l">{{ __('Identification Type') }}</th>
                            <th class="min-phone-l">{{ __('Verification Type') }}</th>
                            <th class="min-phone-l">{{ __('Status') }}</th>
                            <th class="min-phone-l">{{ __('Created At') }}</th>
                            <th class="min-phone-l">{{ __('Updated At') }}</th>
                            <th class="text-right all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$knowYourCustomer)
                        <tr class="text-center">
                            <td class="text-left">{{ $knowYourCustomer->user->username}}</td>

                            <td>{{ $knowYourCustomer->verification_type == VERIFICATION_TYPE_ID ? identification_type_with_id($knowYourCustomer->identification_type) : identification_type_with_address($knowYourCustomer->identification_type)}}</td>

                            <td>{{ verification_type($knowYourCustomer->verification_type)}}</td>

                            <td><span class="badge {{config('commonconfig.verification_status.' . ( !is_null($knowYourCustomer) ? $knowYourCustomer->status : VERIFICATION_STATUS_UNVERIFIED ) . '.color_class')}}"> {{ config('commonconfig.verification_status.' . ( !is_null($knowYourCustomer) ? $knowYourCustomer->status : VERIFICATION_STATUS_UNVERIFIED ) . '.text')}} </span></td>

                            <td>{{ $knowYourCustomer->created_at!==null?$knowYourCustomer->created_at->diffForHumans():'' }}</td>
                            <td>{{ $knowYourCustomer->updated_at!==null?$knowYourCustomer->updated_at->diffForHumans():'' }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('verification-status.edit',$knowYourCustomer->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Review') }}
                                        </a>
                                        <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                           data-form-id="urm-{{$knowYourCustomer->id}}" data-form-method='delete'
                                           href="{{ route('verification-status.destroy',$knowYourCustomer->id) }}">
                                            <i class="fa fa-trash-o"></i> {{ __('Decline') }}
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
