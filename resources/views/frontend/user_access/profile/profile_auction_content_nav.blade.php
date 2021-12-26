
    <ul class="nav nav-tabs justify-content-end mt-3" id="profileTab" role="tablist">

        <li class="nav-item">
            <a class="nav-link text-muted {{is_current_route('user-profile.index', 'active border-bottom-white')}}" href="{{route('user-profile.index')}}">{{__('My All Auctions')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-muted {{is_current_route('user-profile-won-auction.index', 'active')}}" href="{{route('user-profile-won-auction.index')}}">{{__('Won Auctions')}}</a>
        </li>

    </ul>
