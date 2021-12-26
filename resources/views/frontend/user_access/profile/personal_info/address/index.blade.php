@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <div class="p-b-100 p-t-50">
        <div class="container">
            @include('frontend.user_access.profile.personal_info.title_nav')
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    @include('frontend.user_access.profile.personal_info.avatar')
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        @include('frontend.user_access.profile.personal_info.profile_nav')

                        @component('components.card', ['type' => 'info', 'class'=> 'border-top-0'])
                            <div class="row">
                                <div class="col-12 mt-4">
                                @if(count($addresses) <= 0)
                                    <div class="p-y-50 text-center">
                                        <div class="d-block fz-20 mb-3 color-666">
                                            You haven't Submitted any address yet
                                        </div>
                                        <a class="btn text-center bg-custom-gray fz-14 d-inline-block custom-btn" href="{{route('user-address.create')}}">{{__('Add Address')}}</a>
                                    </div>
                                    @else
                                        @foreach($addresses as $address)
                                            <div class="card mb-4">
                                                <div class="card-body address-card">
                                                    <div class="address-dropdown">
                                                        <a class="flex-sm-fill text-sm-center nav-link p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                                            <i class="fa fa-th-list icon-round"></i>
                                                        </a>
                                                        <div class="address-dropdown-menu">
                                                            <div class="dropdown-menu  drop-menu dropdown-menu-right">
                                                                @if($address->is_verified == VERIFICATION_STATUS_UNVERIFIED )
                                                                    <a class="dropdown-item" href="{{route('user-address.edit', $address->id)}}">
                                                                        <i class="fa fa-edit mr-2"></i>
                                                                        {{__('Edit')}}
                                                                    </a>
                                                                    <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                                                       data-form-id="urm-{{$address->id}}" data-form-method='delete'
                                                                       href="{{ route('user-address.destroy',$address->id) }}">
                                                                        <i class="fa fa-trash-o mr-2"></i>
                                                                        {{__('Delete')}}
                                                                    </a>
                                                                    @elseif($address->is_verified == VERIFICATION_STATUS_APPROVED && $address->is_default == ACTIVE_STATUS_INACTIVE)

                                                                    <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                                                       data-form-id="urm-{{$address->id}}" data-form-method='put'
                                                                       href="{{ route('user-change-address-status.update',$address->id) }}">
                                                                        <i class="fa fa-trash-o mr-2"></i>
                                                                        {{__('Make Default')}}
                                                                    </a>

                                                                    @else
                                                                    <span>{{__('No action available')}}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="agent-info">
                                                        <div class="personal-info mx-2 my-4">
                                                            <ul>
                                                                <li>
                                                                        <span>
                                                                            <i class="fa fa-user"></i>
                                                                            name :
                                                                        </span>
                                                                    {{$address->name}}
                                                                </li>
                                                                <li>
                                                                        <span>
                                                                            <i class="fa fa-map-marker"></i>
                                                                            location :
                                                                        </span>
                                                                    {{$address->city}}
                                                                    {{$address->country->name}}
                                                                </li>
                                                                <li>
                                                                        <span>
                                                                            <i class="fa fa-phone"></i>
                                                                            phone :
                                                                        </span>
                                                                    {{$address->phone_number}}
                                                                </li>
                                                                <li>
                                                                        <span>
                                                                            <i class="fa fa-envelope"></i>
                                                                            post code :
                                                                        </span>
                                                                    {{$address->post_code}}
                                                                </li>
                                                                <li>
                                                                        <span>
                                                                            <i class="fa fa-check-circle"></i>
                                                                            Verification Status :
                                                                        </span>

                                                                    <span class="badge d-inline-block w-auto badge-pill pr-2 text-white font-weight-normal {{config('commonconfig.verification_status.' . ( $address->is_verified !== VERIFICATION_STATUS_APPROVED ? VERIFICATION_STATUS_UNVERIFIED  : $address->is_verified) . '.color_class')}}"> {{verification_status($address->is_verified) }} </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @if($address->is_default == ACTIVE_STATUS_ACTIVE)
                                                        <div class="default-badge">
                                                            {{$address->is_default == ACTIVE_STATUS_ACTIVE ? 'Default Address' : ''}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        @slot('footer')
                                            <a href="{{ route('user-address.create') }}" class="btn fz-14 custom-btn">{{ __('Add New Address') }}</a>
                                        @endslot
                                    @endif
                                </div>
                            </div>
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
