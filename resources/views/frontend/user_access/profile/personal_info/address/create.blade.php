@extends('frontend.layouts.master')
@section('title', $title)
@section('content')
    <div class="p-b-100 p-t-50">
        <div class="container">
            @include('frontend.user_access.profile.personal_info.title_nav')
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    @include('frontend.user_access.profile.personal_info.avatar')
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        @include('frontend.user_access.profile.personal_info.profile_nav')
                        @component('components.card',['type' => 'info', 'class'=> 'border-top-0 pt-3'])
                            {{ Form::open(['route' => 'user-address.store', 'class' => 'cvalidate', 'id' => 'addressInfo']) }}
                            @method('post')
                            @basekey

                            @include('frontend.user_access.profile.personal_info.address._form')

                            {{ Form::close() }}
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>

    <script>
        var app = new Vue({
            el: '#addressInfo',
            data: {
                states : [],
                selectedState : "{{ old('state_id', isset($address) ? $address->state->id : '' ) }}",
                selectedCountryId : "{{ old('country_id', isset($address) ? $address->country->id : '' ) }}",
                disableStateDom: false,
                isLoading: false
            },

            methods: {
                onChange: function (event) {
                    this.getStates(event.target.value);
                },
                getStates: function (countryId) {
                    this.disableStateDom = true;
                    this.isLoading = true;

                    const thisApp = this
                    axios.post("{{route('get-state.index')}}", {
                        country_id: countryId
                    })
                        .then(function (response) {
                            thisApp.states = response.data.states;
                            console.log(thisApp.states)
                        })
                        .catch(function (error) {
                            alert('Failed to load states! Please try again.');
                        })
                        .finally(function () {
                            thisApp.disableStateDom = false;
                            thisApp.isLoading = false;
                        });
                }
            },

            mounted(){
                if( parseInt(this.selectedCountryId) && this.selectedCountryId > 0 )
                {
                    this.getStates(this.selectedCountryId);
                }
            }
        })
    </script>

    <script>
        $(document).ready(function () {
            $('.cvalidate').cValidate();
        });
    </script>
@endsection
