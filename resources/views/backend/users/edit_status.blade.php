@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            @include('backend.profile.avatar')
        </div>
        <div class="col-md-9">
            @component('components.card', ['type' => 'info'])
                @slot('header')

                    <h3 class="card-title">{{ view_html(__('Status Details of :user', ['user' => '<strong>' . $user->profile->full_name . '</strong>'])) }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('users.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                @endslot

                @if($user->id == Auth::user()->id)
                    {{__('You cannot change your own status.')}}
                @elseif(in_array($user->id, config('commonconfig.fixed_users')))
                    {{__("You cannot change primary user's status.")}}
                @else
                    {{ Form::model($user,['route'=>['users.update.status',$user->id],'class'=>'form-horizontal user-form','method'=>'put']) }}
                    @include('backend.users._edit_status_form')
                    {{ Form::close() }}
                @endif

                @slot('footer')
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('users.show', $user->id) }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="btn btn-sm btn-warning btn-sm-block">{{ __('Edit Information') }}</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('users.index') }}"
                               class="btn btn-sm btn-info btn-sm-block">{{ __('View All Users') }}</a>
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.user-form').cValidate({});
        });
    </script>
@endsection
