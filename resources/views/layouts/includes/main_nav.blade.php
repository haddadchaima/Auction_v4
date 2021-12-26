<nav class="main-header navbar navbar-expand bg-info navbar-dark border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto main-nav">
        @if(settings('lang_switcher'))
            <li class="nav-item dropdown">
                <a href="javascript:" class="nav-link" data-toggle="dropdown">
                    {{ display_language(App::getLocale()) }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right language-bar">
                    @foreach(language() as $language => $parameter)
                        <a class="dropdown-item {{ app()->getLocale() == $language ? 'active' : ''}}"
                           href="{{ generate_language_url($language) }}">
                            {{ display_language($language, $parameter) }}
                        </a>
                    @endforeach
                </div>
            </li>
        @endif
        @php
            $userNotifications = get_user_specific_notice();
        @endphp
        <li class="nav-item dropdown">
            <a href="javascript:" class="nav-link" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-warning navbar-badge">{{ $userNotifications['count_unread'] }}</span>
            </a>
            @if(!$userNotifications['list']->isEmpty())
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span
                        class="dropdown-header">{{ __('You have :count notifications',['count' => $userNotifications['count_unread']]) }}</span>
                    @foreach($userNotifications['list'] as $notification)
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item">
                            <i class="fa fa-bell text-warning"></i>
                            <span class="text-secondary">{{ Str::limit(strip_tags($notification->data), 50)  }}</span>
                        </a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('notices.index') }}" class="dropdown-item dropdown-footer bg-info">See All
                        Notifications</a>
                </div>
            @endif
        </li>
        <li class="nav-item">
            <a href="javascript:" class="nav-link">
                <img class="img-circle elevation-2 user-image" src="{{ get_avatar(auth()->user()->avatar) }}" alt="">
                {{ auth()->user()->profile->full_name }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out"></i></a>
        </li>
    </ul>
</nav>
