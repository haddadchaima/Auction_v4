@component('components.card',['type' => 'info'])
    <img src="{{ get_avatar(auth()->user()->avatar) }}" alt="{{ __('Profile Image') }}" class="img-rounded img-fluid">
    <p class="text-bold mt-2 text-lg text-center font-weight-bold">{{ auth()->user()->profile->full_name }}</p>
    <a class="btn bg-custom-gray fz-14 d-inline-block mt-2 color-666 w-100 {{ is_current_route('user-profile.avatar.edit','active') }}" href="{{ route('user-profile.avatar.edit') }}">{{ __('Change Avatar') }}</a>
@endcomponent

<div class="d-block mt-3">
    <a class="btn text-center w-100 bg-custom-gray fz-14 d-inline-block custom-btn border-0" href="{{route('user-profile.index')}}">Back to Profile</a>
</div>
