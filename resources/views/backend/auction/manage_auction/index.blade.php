@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card', ['type' => 'info'])
                @slot('header')
                    {{$list['search']}}
                    {{$list['filters']}}
                @endslot
                @component('components.table',['class'=> 'cm-data-table'])
                    @slot('thead')
                            <tr class="bg-info">
                                <th class="min-phone-l">{{ __('Auction Title') }}</th>
                                <th class="min-phone-l">{{ __('Auction Type') }}</th>
                                <th class="min-phone-l">{{ __('Status') }}</th>
                                <th class="min-phone-l">{{ __('Product Claim Status') }}</th>
                                <th class="min-phone-l">{{ __('Money Release Status') }}</th>
                                <th class="min-phone-l">{{ __('Created') }}</th>
                                <th class="min-phone-l">{{ __('Ending Date') }}</th>
                                <th class="text-right all no-sort">{{ __('Action') }}</th>
                            </tr>
                        @endslot

                    @foreach($list['items'] as $key=>$auction)
                        <tr>
                            <td>{{ $auction->title}}</td>
                            <td> <span class="badge {{config('commonconfig.auction_type.' . ( !is_null($auction) ? $auction->auction_type : '' ) . '.color_class')}}">{{ config('commonconfig.auction_type.' . ( !is_null($auction) ? $auction->auction_type : '' ) . '.text')}}</span></td>
                            <td><span class="badge {{config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : '' ) . '.color_class')}}">{{ config('commonconfig.auction_status.' . ( !is_null($auction) ? $auction->status : '' ) . '.text')}}</span></td>
                            <td><span class="badge {{config('commonconfig.product_claim_status.' . ( !is_null($auction) ? $auction->product_claim_status : '' ) . '.color_class')}}">{{ config('commonconfig.product_claim_status.' . ( !is_null($auction) ? $auction->product_claim_status : '' ) . '.text')}}</span></td>

                            <td><span class="badge {{!is_null($auction) && $auction->product_claim_status == AUCTION_PRODUCT_CLAIM_STATUS_DELIVERED ? 'badge-success' : 'badge-secondary'}}">

                                    {{!is_null($auction) && $auction->product_claim_status == AUCTION_PRODUCT_CLAIM_STATUS_DELIVERED ? 'Released' : 'Not Released'}}

                                </span></td>
                            <td>{{ $auction->starting_date }}</td>
                            <td>{{ $auction->ending_date }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('admin-auction.show', $auction->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Show') }}
                                        </a>
                                        @if($auction->status == AUCTION_STATUS_COMPLETED && $auction->product_claim_status != AUCTION_PRODUCT_CLAIM_STATUS_DELIVERED)
                                            <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                               data-form-id="urm-{{$auction->id}}" data-form-method='put'
                                               href="{{ route('admin-release-money.update', $auction->id)}}">
                                                <i class="fa fa-check-circle-o"></i> {{ __('Release Money') }}
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endcomponent
                @slot('footer')
                    {{$list['pagination']}}
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
    <script>
        (function($){
            $('.cm-filter-toggler').on('click',function(){
                $('.cm-filter-container').slideToggle();
            })
        })(jQuery)
    </script>
@endsection
