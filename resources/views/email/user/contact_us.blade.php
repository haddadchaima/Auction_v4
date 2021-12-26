@component('mail::message')
# {{ __('Hello, Admin') }}

{{$data['message']}}

{{ __('Thanks You,') }}<br>
{{$data['name']}}<br>
@if($data['phone_number'])
{{ __('Phone: ') }}{{$data['phone_number']}}
@endif
@endcomponent
