<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link fixer">
        <img src="{{ company_logo_dashboard() }}" alt="Laraframe Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-normal">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div id="mScroll" class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            {{ get_nav('back-end') }}
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
