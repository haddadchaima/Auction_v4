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
                                <th class="min-phone-l">{{ __('Auction Title') }}</th>
                                <th class="min-phone-l">{{ __('Images') }}</th>
                                <th class="min-phone-l">{{ __('Default') }}</th>
                                <th class="min-phone-l">{{ __('Created') }}</th>
                                <th class="min-phone-l">{{ __('Updated') }}</th>
                                <th class="text-right all no-sort">{{ __('Action') }}</th>
                            </tr>
                        @endslot

                    @foreach($list['items'] as $key=>$slider)
                        <tr>
                            <td>{{ $slider->title}}</td>
                            <td class="d-flex list-img">
                                @foreach($slider->images as $images)
                                    <img class="img-fluid" src="{{slider_images($images)}}" alt="">
                                @endforeach
                            </td>
                            <td>{{ $slider->is_default == ACTIVE_STATUS_ACTIVE ? view_html('<h4><i class="fa fa-check-circle text-success"></i></h4>
') : ''}}</td>
                            <td>{{ !is_null($slider->created_at) ? $slider->created_at->diffForHumans() : '' }}</td>
                            <td>{{ !is_null($slider->updated_at) ? $slider->updated_at->diffForHumans() : '' }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('slider.show', $slider->id)}}"><i
                                                class="fa fa-eye fa-lg text-info"></i> {{ __('Show') }}
                                        </a>
                                        @if($slider->is_default != ACTIVE_STATUS_ACTIVE)
                                            <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                               data-form-id="urm-{{$slider->id}}" data-form-method='put'
                                               href="{{ route('slider-make-default.update', $slider->id) }}">
                                                <i class="fa fa-exchange fa-lg text-info"></i> {{ __('Make Default') }}
                                            </a>
                                            <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                               data-form-id="urm-{{$slider->id}}" data-form-method='delete'
                                               href="{{ route('slider.destroy',$slider->id) }}">
                                                <i class="fa fa-trash-o fa-lg text-info"></i> {{ __('Delete') }}
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
    <style>
        .list-img img {
            max-height: 40px;
            margin: 0 5px;
        }
    </style>
@endsection

@section('script')
    @include('layouts.includes.list-js')
@endsection
z
