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
                                    <th class="min-phone-l">{{ __('Details') }}</th>
                                    <th class="min-phone-l">{{ __('Time') }}</th>
                                    <th class="min-phone-l">{{ __('Status') }}</th>
                                    <th class="min-phone-l">{{ __('Action') }}</th>
                                </tr>
                            @endslot

                            @foreach($list['items'] as $key=>$userNotification)
                                <tr class="text-center position-relative fz-12">
                                    <td class="text-left {{$userNotification->read_at ? '' : 'text-success'}}">{{view_html($userNotification->data)}}</td>
                                    <td class="fz-12 {{$userNotification->read_at ? '' : 'text-success'}}">{{$userNotification->created_at !== null ? $userNotification->created_at->diffForHumans():''}}</td>
                                    <td {{ $userNotification->read_at ? '' : 'class=text-success' }}>{{ $userNotification->read_at ? __('Read') : __('Unread') }}</td>
                                    <td>
                                        <div class="address-dropdown">
                                            <a class="flex-sm-fill text-sm-center nav-link p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                                <i class="fa fa-th-list icon-round"></i>
                                            </a>
                                            <div class="address-dropdown-menu">
                                                <div class="dropdown-menu  drop-menu dropdown-menu-right">
                                                    @if($userNotification->link != null)
                                                    <a class="dropdown-item" href="{{$userNotification->link }}"><i
                                                            class="fa fa-dot-circle-o text-red"></i> {{ __('Go to link') }}
                                                    </a>
                                                    @endif
                                                    @if($userNotification->read_at)
                                                        <a class="dropdown-item" href="{{ route('notification.mark-as-unread',$userNotification->id) }}"><i
                                                                class="fa fa-dot-circle-o text-red"></i> {{ __('Mark as unread') }}
                                                        </a>
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('notification.mark-as-read',$userNotification->id) }}"><i
                                                                class="fa fa-dot-circle-o text-green"></i> {{ __('Mark as read') }}
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

    <style>

        .address-dropdown {
            position: absolute;
            top: 10px;
            right: 15px;
        }

        .cm-data-table thead .bg-info {
            background: #efefef !important;
            color: #444 !important;
        }

        .card-footer {
            border-top: 1px solid rgba(187, 187, 187, 0.13) !important;
        }

        .cm-data-table tbody td {
            padding: 15px 20px !important;
            border-bottom: 1px solid #eee !important;
            color: #666;
        }

        .card-header {
            border-bottom: 1px solid #eee;
            padding: 30px 20px;
        }

    </style>
@endsection

@section('script')
    @include('layouts.includes.list-js')

    <script type="text/javascript">
        //Init jquery Date Picker
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
        });
    </script>

@endsection

@section('style-top')
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap4-datetimepicker/css/bootstrap-datetimepicker.css') }}">

    <style>

        .address-dropdown {
            position: absolute;
            top: 10px;
            right: 15px;
        }

        .cm-data-table thead .bg-info {
            background: #efefef !important;
            color: #444 !important;
        }

        .card-footer {
            border-top: 1px solid rgba(187, 187, 187, 0.13) !important;
        }

        .cm-data-table tbody td {
            padding: 15px 20px !important;
            border-bottom: 1px solid #eee !important;
            color: #666;
        }

        .card-header {
            border-bottom: 1px solid #eee;
            padding: 30px 20px;
        }

    </style>
@endsection
