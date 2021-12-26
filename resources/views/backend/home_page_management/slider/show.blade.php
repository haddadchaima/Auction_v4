@extends('layouts.master')
@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('slider.index') }}" class="btn btn-sm btn-info back-button">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>
                @endslot
            <h3 class="text-muted mb-3 d-block">Title : <span class="font-weight-bold">{{$slider->title}}</span></h3>
            <div class="row justify-content-center">
                @foreach($slider->images as $image)
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{slider_images($image)}}" alt="">
                    </div>
                @endforeach
            </div>

            @endcomponent
        </div>
    </div>
@endsection
