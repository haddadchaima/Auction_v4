<div class="col-12 mt-4 was-validated custom-validate">
    <h5 class="mb-4 color-666">Choose One Address you want to verify :</h5>
    @foreach($addresses as $address)
        @if($address->is_verified == VERIFICATION_STATUS_UNVERIFIED)
            <div class="card custom-validate-hover mb-4">
                <div class="custom-control custom-radio mb-3">
                    {{Form::radio(fake_field('address_id'), old('address_id', $address->id), false, ['class' => 'custom-control-input',  'id' => fake_field('checkerId'. $loop->iteration), 'checked'] )}}
                    <label class="custom-control-label" for="checkerId{{$loop->iteration}}"></label>
                </div>
                <div class="card-body address-card">
                    <div class="agent-info">
                        <div class="personal-info mx-2 my-4">
                            <ul>
                                <li>
                                    <span>
                                        <i class="fa fa-user"></i>
                                        name :
                                    </span>
                                    {{$address->name}}
                                </li>
                                <li>
                                    <span>
                                        <i class="fa fa-map-marker"></i>
                                        location :
                                    </span>
                                    {{$address->city}}
                                    {{$address->country->name}}
                                </li>
                                <li>
                                    <span>
                                        <i class="fa fa-phone"></i>
                                        phone :
                                    </span>
                                    {{$address->phone_number}}
                                </li>
                                <li>
                                    <span>
                                        <i class="fa fa-envelope"></i>
                                        post code :
                                    </span>
                                    {{$address->post_code}}
                                </li>
                                <li>
                                    <span>
                                        <i class="fa fa-check-circle"></i>
                                        Verification Status :
                                    </span>

                                    <span class="badge d-inline-block w-auto badge-pill pr-2 text-white font-weight-normal {{config('commonconfig.verification_status.' . ( $address->is_verified !== VERIFICATION_STATUS_APPROVED ? VERIFICATION_STATUS_UNVERIFIED  : $address->is_verified) . '.color_class')}}"> {{verification_status($address->is_verified) }} </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if($address->is_default == ACTIVE_STATUS_ACTIVE)
                        <div class="default-badge">
                            {{$address->is_default == ACTIVE_STATUS_ACTIVE ? 'Default Address' : ''}}
                        </div>
                    @endif
                </div>
            </div>
        @endif
    @endforeach
</div>
