@extends('layouts.master')
@section('title', $title)
@section('content')
    <?php $title_name = ucwords(Str::replaceLast('_', ' ', $type)); ?>

    @component('components.card', ['type' => 'info'])
        @slot('header')
            <h3 class="card-title">{{ __('Edit - :title Settings',['title' => $title_name]) }}</h3>
            <div class="card-tools pull-right">
                <a href="{{ route('application-settings.index',['type'=>$type]) }}"
                   class="btn btn-info btn-sm back-button">{{__('View :settingName Setting',['settingName' =>$title_name])}}</a>
            </div>
        @endslot
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <ul class="nav nav-pills flex-column">
                    @foreach($settings['settingSections'] as $settingSection)
                        <li class="nav-item">
                            <a class="nav-link {{is_current_route('application-settings.edit', 'active bg-info', ['type'=>$settingSection])}}"
                               href="{{route('application-settings.edit',['type'=>$settingSection])}}">{{ ucwords(Str::replaceLast('_',' ',$settingSection)) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-8 col-md-9">
                {{ Form::open(['route'=>['application-settings.update','type'=> $type], 'method'=>'PUT','files'=>true]) }}
                @component('components.table', ['type' => 'bordered'])
                    {{ $settings['html'] }}
                    <tr>
                        <td colspan="2" class="text-right">
                            {{ Form::submit(__('Update :settingName Setting',['settingName' =>$title_name]),['class'=>'btn btn-info btn-sm']) }}
                        </td>
                    </tr>
                @endcomponent
                {{ Form::close() }}
            </div>
        </div>
    @endcomponent
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
@endsection
