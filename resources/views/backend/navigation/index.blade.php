@extends('layouts.master')
@section('title', $title)
@section('style')
    <link rel="stylesheet" href="{{asset('css/menu.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            @component('components.card', ['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ __('Select Nav') }}</h3>
                @endslot

                <nav class="nav nav-pills flex-column">
                    @foreach($navigationPlaces as $navigationPlace)
                        <a class="nav-link {{ $slug == $navigationPlace ? 'active bg-info' : '' }}"
                           href="{{route('menu-manager.index',$navigationPlace)}}">{{ucfirst(str_replace('-',' ',$navigationPlace))}}</a>
                    @endforeach
                </nav>
            @endcomponent

            @component('components.card', ['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ __('Add Routes') }}</h3>
                @endslot
                <div class="nav-fixer">
                    <input id="search-route nav-input-fixer" type="text" class="form-control" placeholder="search">
                </div>
                <div id="all-routes scroller-fixer" data-name="Unnamed">
                    @foreach($allRoutes as $routeName => $routeData)
                        @if(is_null($routeData->getName()))
                            @continue
                        @endif
                        @php
                            $middleware = $routeData->middleware();
                            $parameters = $routeData->signatureParameters();
                            $isMenuable = true;
                        @endphp
                        @if(is_array($middleware) && count(array_intersect($middleware,['permission','guest.permission','verification.permission','menuable']))>0)
                            @foreach($parameters as $parameter)
                                @if(!$parameter->isOptional())
                                    @php($isMenuable = false)
                                    @break
                                @endif
                            @endforeach
                        @else
                            @php($isMenuable = false)
                        @endif
                        @if($isMenuable)
                            <?php
                            $route = explode('/{', $routeName)[0];
                            if ($route == '/' || $route == '' || strlen($route) == 2) {
                                $route = 'home';
                            } else {
                                if (strpos($route, '/') == 2) {
                                    $route = substr($route, 3);
                                }
                                $route = strtolower(str_replace('/', ' - ', str_replace('-', ' ', $route)));
                            }
                            ?>
                            <div class="checkbox">
                                <label class="checkbox-label">
                                    <input type="checkbox" class="flat-red route-check-box"
                                           value="{{$routeData->getName()}}">
                                    <span>{{$route}}</span>
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
                @slot('footer')
                    <button class="btn btn-sm btn-info" id="add-route">{{ __('Add Route') }}</button>
                @endslot
            @endcomponent

            @component('components.card', ['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ __('Add LINK') }}</h3>
                @endslot

                <div class="form-group">
                    <input type="text" id="link-data" placeholder="Enter url" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" data-name="Unnamed" id="link-name" placeholder="Enter Menu Item Name"
                           class="form-control">
                </div>

                @slot('footer')
                    <button class="btn btn-sm btn-info" id="add-link">{{ __('Add A custom Link') }}</button>
                @endslot
            @endcomponent
        </div>
        <div class="col-md-9">
            @component('components.card', ['type' => 'info'])
                @slot('header')
                    <h3 class="card-title">{{ __('Menu Items') }}</h3>
                @endslot

                {{ Form::open(['route'=>['menu-manager.save', $slug], 'method'=>'post','id'=>'menu-form']) }}
                <div class="w-100 overflow-hidden">
                    {{ $menu }}
                </div>
                <button id="form-submit-button" type="submit" class="d-none">{{ __('Save Menu') }}</button>
                {{ Form::close() }}

                @slot('footer')
                    <button class="btn btn-sm btn-info menu-submit">{{ __('Save Menu') }}</button>
                @endslot
            @endcomponent
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('vendor/jQueryUI/jquery-ui.min.js')}}"></script>
    <script src="{{asset('vendor/menu_manager/jquery.mjs.nestedSortable.js')}}"></script>
    <script src="{{asset('vendor/menu_manager/adminmenuhandler.js')}}"></script>
@endsection
