@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card', ['type' => 'info'])
                @slot('header')
                    {{$list['search']}}
                @endslot
                @component('components.table',['class'=> 'cm-data-table'])
                    @slot('thead')
                        <tr class="bg-info">
                            <th class="min-phone-l">{{ __('Layout Title') }}</th>
                            <th class="min-phone-l">{{ __('Layout Type') }}</th>
                            <th class="min-phone-l">{{ __('Total Content') }}</th>
                            <th class="min-phone-l">{{ __('Status') }}</th>
                            <th class="min-phone-l">{{ __('Created') }}</th>
                            <th class="min-phone-l">{{ __('Updated') }}</th>
                            <th class="text-right all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$layout)
                        <tr>
                            <td>{{ $layout->title}}</td>
                            <td><span class="badge {{config('commonconfig.layout_types.' . ( !is_null($layout) ? $layout->layout_type : '' ) . '.color_class')}}">{{ config('commonconfig.layout_types.' . ( !is_null($layout) ? $layout->layout_type : '' ) . '.text')}}</span></td>
                            <td class="font-weight-bold">{{$layout->total}}</td>
                            <td><span class="badge {{config('commonconfig.active_status.' . ( !is_null($layout) ? $layout->is_active : '' ) . '.color_class')}}">{{ config('commonconfig.active_status.' . ( !is_null($layout) ? $layout->is_active : '' ) . '.text')}}</span></td>
                            <td>{{ !is_null($layout->created_at) ? $layout->created_at->diffForHumans() : '' }}</td>
                            <td>{{ !is_null($layout->updated_at) ? $layout->updated_at->diffForHumans() : '' }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('layout.edit', $layout->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Edit') }}
                                        </a>

                                        @if($layout->is_active != ACTIVE_STATUS_ACTIVE)
                                            <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                               data-form-id="urm-{{$layout->id}}" data-form-method='put'
                                               href="{{ route('layout-make-active.update', $layout->id) }}">
                                                <i class="fa fa-exchange fa-lg text-info"></i> {{ __('Make Active') }}
                                            </a>
                                            @else
                                            <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                               data-form-id="urm-{{$layout->id}}" data-form-method='put'
                                               href="{{ route('layout-make-active.update', $layout->id) }}">
                                                <i class="fa fa-exchange fa-lg text-info"></i> {{ __('Make InActive') }}
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
@endsection


