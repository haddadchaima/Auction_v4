@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @component('components.card', ['type' => 'info'])
                @slot('header')
                    {{  $list['search'] }}
                @endslot
                @component('components.table',['class'=> 'cm-data-table'])
                    @slot('thead')
                        <tr class="bg-info">
                            <th class="min-phone-l">{{ __('Category Name') }}</th>
                            <th class="min-phone-l">{{ __('Slug Name') }}</th>
                            <th class="min-phone-l">{{ __('Created At') }}</th>
                            <th class="text-right all no-sort">{{ __('Action') }}</th>
                        </tr>
                    @endslot

                    @foreach($list['items'] as $key=>$category)
                        <tr>
                            <td>{{ $category->name}}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                            <td class="cm-action">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('category.edit',$category->id)}}"><i
                                                class="fa fa-pencil-square-o fa-lg text-info"></i> {{ __('Edit Info') }}
                                        </a>
                                        <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                           data-form-id="urm-{{$category->id}}" data-form-method='delete'
                                           href="{{ route('category.destroy',$category->id) }}">
                                            <i class="fa fa-trash-o"></i> {{ __('Delete') }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endcomponent
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
