@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <div class="p-b-100 p-t-50">
        <div class="container">
            @include('frontend.user_access.profile.stores.manage_store.title_nav')
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    @include('frontend.user_access.profile.stores.manage_store.avatar')
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        @include('frontend.user_access.profile.stores.manage_store.store_nav')

                        @component('components.card', ['type' => 'info', 'class'=> 'border-top-0'])
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive-sm">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th>{{ __('Name') }}</th>
                                                    <td>{{auth()->user()->seller->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('User Role') }}</th>
                                                    <td>{{ auth()->user()->role->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('Email') }}</th>
                                                    <td>{{ auth()->user()->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('Username') }}</th>
                                                    <td>{{ auth()->user()->username }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('Account Status') }}</th>
                                                    <td>
                                                        <span class="badge badge-{{ config('commonconfig.account_status.' . auth()->user()->seller->is_active . '.color_class') }}">{{ account_status(auth()->user()->seller->is_active) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @slot('footer')
                                <a href="{{ route('seller-profile.edit', auth()->user()->seller->id) }}" class="btn fz-14 custom-btn ">{{ __('Edit Information') }}</a>
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
