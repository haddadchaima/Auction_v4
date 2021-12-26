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

                    @include('backend.dispute.index_nav')

                @component('components.table',['class'=> 'cm-data-table'])
                    @slot('thead')
                            <tr class="bg-info">
                                <th class="min-phone-l">{{ __('Dispute Title') }}</th>
                                <th class="min-phone-l">{{ __('Disputed On') }}</th>
                                <th class="min-phone-l">{{ __('Dispute Status') }}</th>
                                <th class="min-phone-l">{{ __('read_at') }}</th>
                                <th class="min-phone-l">{{ __('Created') }}</th>
                                <th class="min-phone-l">{{ __('Updated') }}</th>
                                <th class="text-right all no-sort">{{ __('Action') }}</th>
                            </tr>
                        @endslot

                    @foreach($list['items'] as $key=>$dispute)
                        <tr>
                            <td class="{{$dispute->read_at ? '' : 'text-success'}}">{{ $dispute->title}}</td>
                            <td> <span class="badge {{config('commonconfig.dispute_type.' . ( !is_null($dispute) ? $dispute->dispute_type : '' ) . '.color_class')}}">{{ config('commonconfig.dispute_type.' . ( !is_null($dispute) ? $dispute->dispute_type : '' ) . '.text')}}</span></td>

                            <td> <span class="badge {{config('commonconfig.dispute_status.' . ( !is_null($dispute) ? $dispute->dispute_status : '' ) . '.color_class')}}">{{ config('commonconfig.dispute_status.' . ( !is_null($dispute) ? $dispute->dispute_status : '' ) . '.text')}}</span></td>

                            <td class="{{$dispute->read_at ? '' : 'text-success'}}">{{ !is_null($dispute->read_at) ? $carbon->parse($dispute->read_at)->diffForHumans() : 'Unread'}}</td>
                            <td>{{ !is_null($dispute->created_at) ? $carbon->parse($dispute->created_at)->diffForHumans() : ''}}</td>
                            <td>{{ !is_null($dispute->updated_at) ? $carbon->parse($dispute->updated_at)->diffForHumans() : 'Unread'}}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('admin-dispute.edit', $dispute->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Show') }}
                                        </a>
                                        @if($dispute->read_at)
                                            <a class="dropdown-item" href="{{ route('admin-dispute.mark-as-unread',$dispute->id) }}"><i
                                                    class="fa fa-dot-circle-o text-red"></i> {{ __('Mark as unread') }}
                                            </a>
                                        @else
                                            <a class="dropdown-item" href="{{ route('admin-dispute.mark-as-read',$dispute->id) }}"><i
                                                    class="fa fa-dot-circle-o text-green"></i> {{ __('Mark as read') }}
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
