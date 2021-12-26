<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link {{ is_current_route(['profile.index','profile.edit'],'rounded bg-info') }}" href="{{ route('profile.index') }}">{{ __('Profile') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ is_current_route('profile.change-password','rounded bg-info') }}" href="{{ route('profile.change-password') }}">{{ __('Change Password') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ is_current_route('profile.avatar.edit','rounded bg-info') }}" href="{{ route('profile.avatar.edit') }}">{{ __('Change Avatar') }}</a>
    </li>
</ul>
