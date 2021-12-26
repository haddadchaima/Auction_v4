@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            @include('backend.profile.avatar')
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                @include('backend.profile.profile_nav')

                @component('components.card', ['type' => 'info', 'class'=> 'mt-3'])
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive-sm">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <td>{{ $user->profile->full_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('User Role') }}</th>
                                        <td>{{ $user->role->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Email') }}</th>
                                        <td>{{ $user->email }}
                                            @if( settings('require_email_verification') == ACTIVE_STATUS_ACTIVE )
                                                <span class="badge badge-{{ config('commonconfig.email_status.' . $user->is_email_verified . '.color_class') }}">{{ email_status($user->is_email_verified) }}</span>
                                                @if(!$user->is_email_verified)
                                                    <a class="btn-link pull-right"
                                                       href="{{ route('verification.form') }}">{{ __('Verify Account') }}</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Username') }}</th>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Address') }}</th>
                                        <td>{{ $user->profile->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Account Status') }}</th>
                                        <td>
                                            <span class="badge badge-{{ config('commonconfig.account_status.' . $user->is_active . '.color_class') }}">{{ account_status($user->is_active) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Financial Status') }}</th>
                                        <td>
                                            <span class="badge badge-{{ config('commonconfig.financial_status.' . $user->is_financial_active . '.color_class') }}">{{ financial_status($user->is_financial_active) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Maintenance Access Status') }}</th>
                                        <td>
                                            <span class="badge badge-{{ config('commonconfig.maintenance_accessible_status.' . $user->is_accessible_under_maintenance . '.color_class') }}">{{ maintenance_accessible_status($user->is_accessible_under_maintenance) }}</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @slot('footer')
                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-info btn-sm-block">{{ __('Edit Profile') }}</a>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
