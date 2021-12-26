@include('frontend.layouts.includes.header')

@include('frontend.layouts.includes.main_nav')

<div class="position-relative p-t-80 p-t-md-200" role="main" id="app">
    @if(!empty(auth()->user()) && auth()->user()->role_id != USER_ROLE_USER && auth()->user()->role_id != USER_ROLE_SELLER)
        <div class="dashboard-switcher border">
            <a href="{{route('dashboard')}}"><i class="fa fa-tachometer"></i></a>
        </div>
    @endif
    @yield('content')
</div>

@include('frontend.layouts.includes.content_footer')

@include('frontend.layouts.includes.footer')
