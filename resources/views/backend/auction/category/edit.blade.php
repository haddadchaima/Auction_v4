@extends('layouts.master')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card',['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ $title }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-info back-button">
                            <i class="fa fa-reply"></i>
                        </a>
                    </div>
                @endslot
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        {{ Form::open(['route' => ['category.update', $category->id], 'class' => 'cvalidate']) }}
                        @method('put')
                        @basekey

                        <div class="form-group">
                            <label class="{{fake_field('form-control-label mb-3')}}" for="{{fake_field('category-name')}}">Category Name :</label>
                            {{Form::text(fake_field('name'), old('name', $category->name), ['class' => form_validation($errors, 'name form-control'), 'id' => fake_field('category-name'), 'data-cval-name' => 'Category name required', 'data-cval-rules' => 'required|min:3' ] )}}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Submit',['class'=>'btn btn-info btn-sm mt-2']) }}
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            @endcomponent
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('vendor/jasny-bootstrap/css/jasny-bootstrap.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.cvalidate').cValidate();
        });
    </script>
@endsection
