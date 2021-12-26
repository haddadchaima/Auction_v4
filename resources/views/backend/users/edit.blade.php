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

                    <h3 class="card-title">{{ view_html(__('Basic Details of :user', ['user' => '<strong>' . $user->profile->full_name . '</strong>'])) }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('users.index') }}"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                @endslot

                {{ Form::model($user,['route'=>['users.update',$user->id],'class'=>'user-form','method'=>'put']) }}
                    @include('backend.users._edit_form')
                {{ Form::close() }}

                @slot('footer')
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('users.show', $user->id) }}"
                                   class="btn btn-sm btn-info btn-sm-block">{{ __('View Information') }}</a>
                                <a href="{{ route('users.edit.status', $user->id) }}"
                                   class="btn btn-sm btn-warning btn-sm-block">{{ __('Edit Status') }}</a>
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
