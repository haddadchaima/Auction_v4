@extends('layouts.master')
@section('title', $title)
@section('content')
    <?php $title_name = ucwords(Str::replaceLast('_', ' ', $type)); ?>

    @component('components.card', ['type' => 'info'])
        @slot('header')
            <h3 class="card-title">{{ __(':title Settings',['title' => $title_name]) }}</h3>
            <div class="card-tools pull-right">
                <a href="{{ route('application-settings.edit',['type'=>$type]) }}"
                   class="btn btn-info btn-sm back-button">{{__('Edit :settingName Setting',['settingName' =>$title_name])}}</a>
            </div>
        @endslot

        <div class="row">
            <div class="col-sm-4 col-md-3">
                <ul class="nav nav-pills flex-column">
                    <?php $default = true; ?>
                    @foreach($settings['settingSections'] as $settingSection)
                        <?php
                        $current_route = is_current_route('application-settings.index', 'active bg-info', ['type' => $settingSection]);
                        if ($default) {
                            $current_route = is_current_route('application-settings.index', 'active bg-info', null, ['type' => $settingSection]);
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link {{$current_route}}" href="{{route('application-settings.index',['type'=>$settingSection])}}">{{ucwords(Str::replaceLast('_',' ',$settingSection))}}</a>
                        </li>
                        <?php $default = false; ?>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-8 col-md-9">
                <table class="table table-bordered">
                    {{ $settings['html'] }}
                </table>
            </div>
        </div>
    @endcomponent
@endsection
