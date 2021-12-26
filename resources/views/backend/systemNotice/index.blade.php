@extends('layouts.master')
@section('title', $title)
@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')

                    {{ $list['search'] }}
                @endslot

                @component('components.table',['class' => 'cm-data-table'])
                    @slot('thead')
                        <tr class="bg-info">
                            <th class="all">{{ __('Title') }}</th>
                            <th class="min-phone-l">{{ __('Start Time') }}</th>
                            <th class="min-phone-l">{{ __('End Time') }}</th>
                            <th class="min-phone-l">{{ __('Type') }}</th>
                            <th class="min-phone-l">{{ __('Status') }}</th>
                            <th class="none">{{ __('Description') }}</th>
                            <th class="all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $notice)
                        <tr>
                            <td>{{$notice->title}}</td>
                            <td>{{$notice->start_at}}</td>
                            <td>{{$notice->end_at}}</td>
                            <td><span class="badge badge-{{ $notice->type }}">{{ ucfirst($notice->type) }}</span>
                            </td>
                            <td>{{ active_status($notice->is_active) }}</td>
                            <td>{{ $notice->description }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item" href="{{ route('system-notices.edit',['id' => $notice->id, 'return-url' => request()->getUri()]) }}"><i
                                                    class="fa fa-pencil"></i> {{ __('Edit') }}</a>
                                        <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                           data-form-id="urm-{{$notice->id}}" data-form-method='delete'
                                           href="{{ route('system-notices.destroy',$notice->id) }}"><i
                                                    class="fa fa-trash-o"></i> {{ __('Delete') }}</a>
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
