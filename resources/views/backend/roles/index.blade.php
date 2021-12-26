@extends('layouts.master')
@section('title', $title)
@section('content')

    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')

                    {{ $list['search'] }}
                @endslot
                <table class="table cm-data-table">
                    <thead>
                    <tr class="bg-info">
                        <th class="all text-center">{{ __('Role Name') }}</th>
                        <th class="min-phone-l text-center">{{ __('Created Date') }}</th>
                        <th class="min-phone-l text-center">{{ __('Status') }}</th>
                        <th class="text-center all no-sort">{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list['items'] as $role)
                        <tr>
                            <td class="text-center">{{ $role->name }}</td>
                            <td class="text-center">{{ $role->created_at }}</td>

                            <td class="text-center">{{ view_html($role->is_active ? '<i class="fa fa-check text-success"></i>' :  '<i class="fa fa-close text-danger"></i>') }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                        <a class="dropdown-item"
                                           href="{{ route('roles.edit',$role->id) }}"><i
                                                    class="fa fa-pencil"></i> {{ __('Edit') }}</a>
                                        @if(!in_array($role->id, $defaultRoles))
                                            <a class="dropdown-item confirmation"
                                               data-alert="{{__('Do you want to delete this role?')}}"
                                               data-form-id="ur-{{ $role->id }}"
                                               data-form-method='delete'
                                               href="{{ route('roles.destroy',$role->id) }}"><i
                                                        class="fa fa-trash-o"></i> {{ __('Delete') }}</a>
                                            @if($role->is_active == ACTIVE_STATUS_ACTIVE)
                                                <a data-form-id="ur-{{ $role->id }}"
                                                   data-form-method="PUT"
                                                   href="{{ route('roles.status',$role->id) }}"
                                                   class="dropdown-item confirmation"
                                                   data-alert="{{__('Do you want to disable this role?')}}"><i
                                                            class="fa  fa-times-circle-o"></i> {{ __('Disable') }}
                                                </a>
                                            @endif
                                        @endif
                                        @if($role->is_active == ACTIVE_STATUS_INACTIVE)
                                            <a data-form-id="ur-{{ $role->id }}"
                                               data-form-method="PUT"
                                               href="{{ route('roles.status',$role->id) }}"
                                               class="dropdown-item confirmation"
                                               data-alert="{{__('Do you want to active this role?')}}"><i
                                                        class="fa fa-check-square-o"></i> {{ __('Active') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
