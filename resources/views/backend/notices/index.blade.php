@extends('layouts.master')
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
                            <th class="min-phone-l">{{ __('Notice') }}</th>
                            <th class="min-phone-l">{{ __('Date') }}</th>
                            <th class="min-phone-l">{{ __('Status') }}</th>
                            <th class="all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$notice)

                        <tr>
                            <td {{ $notice->read_at ? '' : 'class=text-success' }}>{{view_html($notice->data)}}</td>
                            <td {{ $notice->read_at ? '' : 'class=text-success' }}>{{$notice->created_at}}</td>
                            <td {{ $notice->read_at ? '' : 'class=text-success' }}>{{ $notice->read_at ? __('Read') : __('Unread') }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            @if($notice->read_at)
                                                <a class="dropdown-item" href="{{ route('notices.mark-as-unread',$notice->id) }}"><i
                                                            class="fa fa-dot-circle-o text-red"></i> {{ __('Mark as unread') }}
                                                </a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('notices.mark-as-read',$notice->id) }}"><i
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
