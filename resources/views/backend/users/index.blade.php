@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card', ['type' => 'info'])
                @slot('header')

                    {{ $list['search'] }}
                    {{ $list['filters'] }}
                @endslot
                @component('components.table',['class'=> 'cm-data-table'])
                    @slot('thead')
                        <tr class="bg-info">
                            <th class="all">{{ __('Email') }}</th>
                            <th class="min-phone-l">{{ __('First Name') }}</th>
                            <th class="min-phone-l">{{ __('Last Name') }}</th>
                            <th class="min-phone-l">{{ __('User Group') }}</th>
                            <th class="min-phone-l">{{ __('Username') }}</th>
                            <th class="none">{{ __('Registered Date') }}</th>
                            <th class="text-center min-phone-l">{{ __('Status') }}</th>
                            <th class="text-center all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$user)
                        <tr>
                            <td>
                                @if(has_permission('users.show'))
                                    <a href="{{ route('users.show', $user->id) }}">{{ $user->email }}</a>
                                @else
                                    {{ $user->email }}
                                @endif
                            </td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>

                            <td class="text-center">{{ view_html($user->is_active ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>') }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('users.show',$user->id)}}"><i
                                                class="fa fa-eye"></i> {{ __('Show') }}</a>
                                        <a class="dropdown-item" href="{{ route('users.edit',$user->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Edit Info') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('users.edit.status',$user->id)}}"><i
                                                class="fa fa-pencil-square fa-lg text-info"></i> {{ __('Edit Status') }}
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
    <script>
        (function($){
            $('.cm-filter-toggler').on('click',function(){
                $('.cm-filter-container').slideToggle();
            })
        })(jQuery)
    </script>
@endsection
