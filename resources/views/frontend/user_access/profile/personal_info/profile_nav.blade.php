<div class="common-nav">
    <ul class="nav nav-tabs" id="profileTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ is_current_route(['user-manage-profile.index','user-profile.edit'],'active') }}" href="{{ route('user-manage-profile.index') }}">{{ __('Personal Information') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route('user-profile.change-password','active') }}" href="{{ route('user-profile.change-password') }}">{{ __('Change Password') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route(['user-address.index','user-address.create','user-address.edit'],'active') }}" href="{{ route('user-address.index') }}">{{ __('Addresses') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route(['profile-verification.index','profile-verification-with-address.create'],'active') }}" href="{{ route('profile-verification.index') }}">{{ __('Verify Your Address') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route(['profile-verification-with-id.index','profile-verification-with-id.create'],'active') }}" href="{{ route('profile-verification-with-id.index') }}">{{ __('Verify Your Identity') }}</a>
        </li>
    </ul>
</div>
