@component('components.card',['type' => 'info'])
    <img src="{{ get_avatar($user->avatar) }}" alt="{{ __('Profile Image') }}" class="img-rounded img-fluid">
    <p class="text-bold mt-2 text-lg text-center">{{ $user->profile->full_name }}</p>
@endcomponent
