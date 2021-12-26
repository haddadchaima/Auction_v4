<div class="common-nav">
    <ul class="nav nav-tabs" id="profileTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ is_current_route(['store-management.index','seller-profile.edit'],'active') }}" href="{{ route('store-management.index') }}">{{ __('Store Information') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route(['address.index', 'address.create','address.edit'], 'active') }}" href="{{ route('address.index') }}">{{ __('Addresses') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ is_current_route(['seller-verification-with-address.create','seller-verification.index'],'active') }}" href="{{ route('seller-verification.index') }}">{{ __('Verify Your Address') }}</a>
        </li>
    </ul>
</div>
