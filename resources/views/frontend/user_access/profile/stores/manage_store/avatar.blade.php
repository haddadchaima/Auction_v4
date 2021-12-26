@component('components.card',['type' => 'info'])
    <img src="{{ get_seller_profile_image(auth()->user()->seller->image) }}" alt="{{ __('Profile Image') }}" class="img-rounded img-fluid">
    <p class="text-bold mt-2 text-lg text-center">{{ auth()->user()->seller->name }}</p>
@endcomponent

<div class="d-block mt-3">
    <a class="btn d-block fz-14 custom-btn" href="{{route('seller-profile.index')}}">Back to Profile</a>
</div>
