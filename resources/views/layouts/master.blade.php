@include('layouts.includes.header')

@include('layouts.includes.main_nav')

@include('layouts.includes.left_sidebar')

<div class="content-wrapper">

    @include('layouts.includes.content_header')

    <div class="content">
        <div class="container-fluid">

            @yield('content')
        </div>
        @yield('extended-content')
    </div>
</div>
@include('layouts.includes.content_footer')

@include('layouts.includes.footer')
