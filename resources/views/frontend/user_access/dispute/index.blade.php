@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <!-- ::::::::::::::::::::::START PAGE HEAD ::::::::::::::::::::::::: -->
    <div class="p-b-100  p-t-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('layouts.includes.breadcrumb')
                </div>
                <div class="col-lg-12">
                    @component('components.card', ['type' => 'info'])
                        @slot('header')
                            {{$list['search']}}
                            {{$list['filters']}}
                        @endslot

                        @include('frontend.user_access.dispute.index_nav')

                        @component('components.table',['class'=> 'cm-data-table'])
                            @slot('thead')
                                <tr class="bg-info">
                                    <th class="min-phone-l">{{ __('Report Title') }}</th>
                                    <th class="min-phone-l">{{ __('Reported On') }}</th>
                                    <th class="min-phone-l">{{ __('Report Status') }}</th>
                                    <th class="min-phone-l">{{ __('Created') }}</th>
                                    <th class="min-phone-l">{{ __('Updated') }}</th>
                                    <th class="text-right all no-sort">{{ __('Action') }}</th>
                                </tr>
                            @endslot

                            @foreach($list['items'] as $key=>$dispute)
                                <tr class="position-relative {{$dispute->read_at ? '' : 'bg-notification'}}">
                                    <td>{{ $dispute->title}}</td>
                                    <td> <span class="badge {{config('commonconfig.dispute_type.' . ( !is_null($dispute) ? $dispute->dispute_type : '' ) . '.color_class')}}">{{ config('commonconfig.dispute_type.' . ( !is_null($dispute) ? $dispute->dispute_type : '' ) . '.text')}}</span></td>

                                    <td> <span class="badge {{config('commonconfig.dispute_status.' . ( !is_null($dispute) ? $dispute->dispute_status : '' ) . '.color_class')}}">{{ config('commonconfig.dispute_status.' . ( !is_null($dispute) ? $dispute->dispute_status : '' ) . '.text')}}</span></td>
                                    <td>{{ !is_null($dispute->created_at) ? $carbon->parse($dispute->created_at)->diffForHumans() : ''}}</td>
                                    <td>{{ !is_null($dispute->updated_at) ? $carbon->parse($dispute->updated_at)->diffForHumans() : 'Unread'}}</td>
                                    <td>
                                        <div class="address-dropdown">
                                            <a class="flex-sm-fill text-sm-center nav-link p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                                <i class="fa fa-th-list icon-round"></i>
                                            </a>
                                            <div class="address-dropdown-menu">
                                                <div class="dropdown-menu  drop-menu dropdown-menu-right">
                                                    @if($dispute->read_at)
                                                        <a class="dropdown-item" href="{{ route('dispute.mark-as-unread',$dispute->id) }}"><i
                                                                class="fa fa-dot-circle-o text-red"></i> {{ __('Mark as unread') }}
                                                        </a>
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('dispute.mark-as-read',$dispute->id) }}"><i
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
                            {{$list['pagination']}}
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
    <!-- ::::::::::::::::::::::::END PAGE HEAD ::::::::::::::::::::::::: -->
@endsection

@section('script')
    <script src="{{ asset('vendor/moment.js/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap4-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{asset('vendor/datatables/table-datatables-responsive.min.js')}}"></script>
    <script>
        (function($){
            $('.cm-filter-toggler').on('click',function(){
                $('.cm-filter-container').slideToggle();
            })
        })(jQuery)
    </script>
    <script type="text/javascript">
        //Init jquery Date Picker
        $('.datepicker').datetimepicker({
            format: 'YYYY-MM-DD',
        });
    </script>

@endsection

@section('style-top')
    <link rel="stylesheet" href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}">
    <style>

        .address-dropdown {
            position: absolute;
            top: 10px;
            right: 15px;
        }

        .address-dropdown-menu .drop-menu.show {
            width: 200px;
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

