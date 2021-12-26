
    {{ Form::open(['route'=>['auction.store'],'class'=>'form-horizontal cvalidate', 'files' => true]) }}
    @method('post')
    @basekey

        <div class="card">
            <div class="card-header py-4">
                <h3 class="font-weight-bold d-inline text-secondary">{{__($title)}}</h3>
            </div>
            <div class="card-body p-5">

                <!-- Start: auction main content -->
                <div class="form-group form-row">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('main_content') }}">{{__('Main Content')}} :</label>

                    <div class="col-lg-10">

                        <!-- Start: currency type -->
                        {{ Form::select(fake_field('currency_id'), $currencies, old('currency_id', null), ['class' => 'custom-select color-666', 'id' => fake_field('currency_id'), 'placeholder' =>  __('Select Currency Type')]) }}
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('currency_id') }}">{{ $errors->first('currency_id') }}</span>
                        <!-- End: currency type -->

                        <!-- Start: auction type -->
                        {{ Form::select(fake_field('auction_type'), auction_type(), old('auction_type', null), ['class' => 'custom-select color-666 mt-3', 'id' => fake_field('auction_type'), 'placeholder' =>  __('Select Auction Type')]) }}
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('auction_type') }}">{{ $errors->first('auction_type') }}</span>
                        <!-- End: auction type -->

                        <!-- Start: category -->
                        {{ Form::select(fake_field('category_id'), $categories, old('category_id', null), ['class' => 'custom-select color-666 mt-3', 'id' => fake_field('category_id'), 'data-cval-name' => 'The Category field', 'placeholder' =>  __('Select Category')]) }}
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('category_id') }}">{{ $errors->first('category_id') }}</span>
                        <!-- End: category -->

                    </div>

                </div>
                <!-- End: auction main content -->

                <!-- Start: basic information -->
                <div class="form-group form-row mt-4">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('content') }}">{{__('Inscription')}} :</label>

                    <div class="col-md-10">

                        <div class="cm-switch mr-3">
                            {{ Form::radio('gratuit', ACTIVE_STATUS_ACTIVE, (string)old('shipping_type', isset($paymentMethod) ? $paymentMethod->shipping_type : ACTIVE_STATUS_ACTIVE) === (string)ACTIVE_STATUS_ACTIVE ? true : false, ['id' => fake_field('gratuit') . '-active', 'class' => 'cm-switch-input', 'data-cval-name' => 'The active status field', 'data-cval-rules' => 'required|integer|in:' . array_to_string(active_status())]) }}
                            <label id="gratuitOn" for="{{ fake_field('gratuit') }}-active" class="cm-switch-label">{{ __('Free') }}</label>

                            {{ Form::radio('gratuit', ACTIVE_STATUS_INACTIVE, (string)old('gratuit', isset($paymentMethod) ? $paymentMethod->shipping_type : false) === (string)ACTIVE_STATUS_INACTIVE ? true : false, ['id' => fake_field('gratuit') . '-inactive', 'class' => 'cm-switch-input']) }}
                            <label id="gratuitOff" for="{{ fake_field('gratuit') }}-inactive" class="cm-switch-label">{{ __('Paid') }}</label>
                        </div>


                            <label id="labelCounterType" class="" for="{{ fake_field('content') }}">{{__('Counter Type')}} :</label>
                            <div id="switchCounterType" class="cm-switch">
                                {{ Form::radio('counter_type', ACTIVE_STATUS_ACTIVE, (string)old('counter_type', isset($paymentMethod) ? $paymentMethod->shipping_type : ACTIVE_STATUS_ACTIVE) === (string)ACTIVE_STATUS_ACTIVE ? true : false, ['id' => fake_field('counter_type') . '-active', 'class' => 'cm-switch-input', 'data-cval-name' => 'The active status field', 'data-cval-rules' => 'required|integer|in:' . array_to_string(active_status())]) }}
                                <label id="gratuitOn" for="{{ fake_field('counter_type') }}-active" class="cm-switch-label">{{ __('Normal') }}</label>

                                {{ Form::radio('counter_type', ACTIVE_STATUS_INACTIVE, (string)old('counter_type', isset($paymentMethod) ? $paymentMethod->shipping_type : false) === (string)ACTIVE_STATUS_INACTIVE ? true : false, ['id' => fake_field('counter_type') . '-inactive', 'class' => 'cm-switch-input']) }}
                                <label id="gratuitOff" for="{{ fake_field('counter_type') }}-inactive" class="cm-switch-label">{{ __('Rapid') }}</label>
                            </div>


                        <div id="inscriptionField" class="form-row mt-3">
                         <!-- Start: frais d'inscription -->
                        <div id="fraisInscription" class="col-6">
                                {{ Form::number(fake_field('frais_inscription'), old('frais_inscription'), ['class'=> 'form-control', 'id' => fake_field('frais_inscription'),'data-cval-name' => 'Frais_inscription field','data-cval-rules' => 'decimal', 'placeholder' => __('Inscription Fee')]) }}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('frais_inscription') }}">{{ $errors->first('frais_inscription') }}</span>
                        </div>
                        <!-- End: frais d'inscription -->

                         <!-- Start: nbr d'inscripteur requise -->
                         <div id="nbrInscripteurRequise" class="col-6">
                                {{ Form::number(fake_field('nbr_inscripteur_requise'), old('nbr_inscripteur_requise'), ['class'=> 'form-control', 'id' => fake_field('nbr_inscripteur_requise'),'data-cval-name' => 'Nbr_inscripteur_requise field','data-cval-rules' => 'required|decimal', 'placeholder' => __('Number of required inscriptor  ')]) }}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('nbr_inscripteur_requise') }}">{{ $errors->first('nbr_inscripteur_requise') }}</span>
                        </div>
                        <!-- End: nbr d'inscripteur requise -->
                        </div>
                </div>
            </div>



                <!-- Start: auction main content -->
                <div class="form-group form-row mt-4">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('auction_about') }}">{{__('About Auction')}} :</label>

                    <div class="col-lg-10">

                        <div class="form-row">
                            <div class="col-12" id="title">
                                <!-- Start: title -->
                                {{ Form::text(fake_field('title'), old('title'), ['class'=> 'form-control', 'id' => fake_field('title'),'data-cval-name' => 'The title field','data-cval-rules' => 'required|decimal', 'placeholder' => __('Contest Title')]) }}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('title') }}">{{ $errors->first('title') }}</span>
                                <!-- End: title -->
                            </div>
                        </div>

                        <!-- Start: bid initial price and bid increment difference -->
                        <div class="form-row mt-3">

                            <!-- Start: bid initial price -->
                            <div class="col-6">
                                {{ Form::text(fake_field('bid_initial_price'), old('bid_initial_price'), ['class'=> 'form-control', 'id' => fake_field('bid_initial_price'),'data-cval-name' => 'The bid_initial_price field','data-cval-rules' => 'required|decimal', 'placeholder' => __('Bid Initial Price')]) }}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('bid_initial_price') }}">{{ $errors->first('bid_initial_price') }}</span>
                            </div>
                            <!-- End: bid initial price -->

                            <!-- Start: bid increment difference -->
                            <div class="col-6">
                                {{ Form::text(fake_field('bid_increment_dif'), old('bid_increment_dif'), ['class'=> 'form-control', 'id' => fake_field('bid_increment_dif'),'data-cval-name' => 'The bid_increment_dif field','data-cval-rules' => 'required|decimal', 'placeholder' => __('Bid Increment Difference')]) }}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('bid_increment_dif') }}">{{ $errors->first('bid_increment_dif') }}</span>
                            </div>
                            <!-- End: bid increment difference -->

                        </div>
                        <!-- End: bid initial price and bid increment difference -->

                        <!-- Start: prix de reserve & nbr de stock -->
                        <div class="form-row mt-3" id="pxNbr">

                            <!-- Start: prix de reserve -->
                            <div class="col-6" id="pxReserve">
                                {{ Form::text(fake_field('prix_reserve'), old('prix_reserve'), ['class'=> 'form-control', 'id' => fake_field('prix_reserve'),'data-cval-name' => 'Prix_reserve field','data-cval-rules' => 'required|decimal', 'placeholder' => __('Prix de réserve')]) }}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('prix_reserve') }}">{{ $errors->first('prix_reserve') }}</span>
                            </div>
                            <!-- End: prix de reserve -->

                            <!-- Start: nbr de stock -->
                            <div class="col-6" id="nbrStock">
                                {{ Form::text(fake_field('nbr_stock'), old('nbr_stock'), ['class'=> 'form-control', 'id' => fake_field('nbr_stock'),'data-cval-name' => 'Nbr_stock field','data-cval-rules' => 'decimal', 'placeholder' => __('Nombre de Stock')]) }}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('nbr_stock') }}">{{ $errors->first('nbr_stock') }}</span>
                            </div>
                            <!-- End: nbr de stock -->

                        </div>
                        <!-- End: prix de reserve & nbr de stock -->

                        <!-- Start: starting and ending date -->
                        <div class="form-row mt-3">
                            <div class="col-6">

                                <!-- Start: starting date -->
                                {{ Form::text(fake_field('starting_date'), old('starting_date'), ['class'=> 'form-control datepicker', 'id' => fake_field('starting_date'),'data-cval-name' => 'The starting_date field','data-cval-rules' => 'required|dateTime', 'placeholder' => __('Starting Date')]) }}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('starting_date') }}">{{ $errors->first('starting_date') }}</span>
                                <!-- End: starting date -->

                            </div>
                            <div class="col-6" id="endingDate">
                                <!-- Start: ending date -->
                                {{ Form::text(fake_field('ending_date'), old('ending_date'), ['class'=> 'form-control datepicker', 'id' => fake_field('ending_date'),'data-cval-name' => 'The ending_date field','data-cval-rules' => 'dateTime', 'placeholder' => __('Ending Date')]) }}
                                <span class="" data-cval-error="{{ fake_field('ending_date') }}">{{ $errors->first('ending_date') }}</span>
                                <!-- End: ending date -->
                            </div>
                        </div>
                        <!-- End: starting and ending date -->

                    </div>

                </div>
                <!-- End: auction main content -->


                <div id="rapidCounter" class="form-group form-row mt-4">
                         <!-- Start: nbr d'inscripteur requise -->
                         <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('auction_session') }}">{{__('Counter Time')}} :</label>

                        <div class="col-lg-10">
                            <div class="form-row">
                                <div id="timeWaitingBid" class="col-6">
                                        {{ Form::number(fake_field('time_waiting_bid'), old('time_waiting_bid'), ['class'=> 'form-control', 'id' => fake_field('time_waiting_bid'),'data-cval-name' => 'time_waiting_bid field','data-cval-rules' => 'decimal', 'placeholder' => __(' Time Bid Counter (seconds)')]) }}
                                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('time_waiting_bid') }}">{{ $errors->first('time_waiting_bid') }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End: nbr d'inscripteur requise -->
                </div>
                <!-- start:  -->
                <div id="normalCounter" class="form-group form-row mt-4">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('auction_session') }}">{{__('Frequence of Auction Session')}} :</label>

                    <div class="col-lg-10">

                        <div class="form-row">

                            <div class="col-6">
                                <!-- Start: frequence_time -->
                                {{ Form::number(fake_field('frequence_time'), old('frequence_time'), ['class'=> 'form-control ', 'id' => fake_field('frequence_time'),'data-cval-name' => 'The frequence_time field', 'placeholder' => __('Frequence Time (per hour)')]) }}
                                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('frequence_time') }}">{{ $errors->first('frequence_time') }}</span>
                                <!-- End: auction_session -->
                            </div>


                        </div>
                    </div>
               </div>

               <!-- End: information -->

                <!-- Start: descriptions -->
                <div class="form-group form-row mt-4">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('main_content') }}">{{__('Product Description')}} :</label>

                    <div class="col-lg-10">

                        <!-- Start: description -->
                        {{ Form::textarea(fake_field('product_description'), old('product_description'), ['class'=> 'form-control', 'id' => fake_field('product_description'),'data-cval-name' => 'The product_description field','data-cval-rules' => 'required', 'placeholder' => __('Description'), 'rows' => '3']) }}
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('product_description') }}">{{ $errors->first('product_description') }}</span>
                        <!-- End: description -->

                    </div>

                </div>
                <!-- End: descriptions -->

                <!-- Start: terms descriptions -->
                <div class="form-group form-row mt-4">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('main_content') }}">{{__('Terms Description')}} :</label>

                    <div class="col-lg-10">

                        <!-- Start: terms description -->
                        {{ Form::textarea(fake_field('terms_description'), old('terms_description'), ['class'=> 'form-control', 'id' => fake_field('terms_description'),'data-cval-name' => 'The terms_description field','data-cval-rules' => 'required|decimal', 'placeholder' => __('Terms Description'), 'rows' => '3']) }}
                        <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('terms_description') }}">{{ $errors->first('terms_description') }}</span>
                        <!-- End: terms description -->

                    </div>

                </div>
                <!-- End: terms descriptions -->

                 <!-- Start: basic information -->
                 <div class="form-group form-row mt-4">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('main_content') }}">{{__('Shippable')}} :</label>

                    <div class="col-md-10">
                        <div class="cm-switch">
                            {{ Form::radio(fake_field('is_shippable'), ACTIVE_STATUS_ACTIVE, (string)old('is_shippable', isset($paymentMethod) ? $paymentMethod->is_shippable : ACTIVE_STATUS_ACTIVE) === (string)ACTIVE_STATUS_ACTIVE ? true : false, ['id' => fake_field('is_shippable') . '-active', 'class' => 'cm-switch-input', 'data-cval-name' => 'The active status field', 'data-cval-rules' => 'required|integer|in:' . array_to_string(active_status())]) }}
                            <label for="{{ fake_field('is_shippable') }}-active" class="cm-switch-label">{{ __('Yes') }}</label>

                            {{ Form::radio(fake_field('is_shippable'), ACTIVE_STATUS_INACTIVE, (string)old('is_shippable', isset($paymentMethod) ? $paymentMethod->is_shippable : false) === (string)ACTIVE_STATUS_INACTIVE ? true : false, ['id' => fake_field('is_shippable') . '-inactive', 'class' => 'cm-switch-input']) }}
                            <label for="{{ fake_field('is_shippable') }}-inactive" class="cm-switch-label">{{ __('No') }}</label>
                        </div>
                    </div>
                </div>
                <!-- End: basic information -->

                <!-- Start: basic information -->
                <div class="form-group form-row mt-4">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('content') }}">{{__('Shipping Type')}} :</label>

                    <div class="col-md-10">
                        <div class="cm-switch">
                            {{ Form::radio(fake_field('shipping_type'), ACTIVE_STATUS_ACTIVE, (string)old('shipping_type', isset($paymentMethod) ? $paymentMethod->shipping_type : ACTIVE_STATUS_ACTIVE) === (string)ACTIVE_STATUS_ACTIVE ? true : false, ['id' => fake_field('shipping_type') . '-active', 'class' => 'cm-switch-input', 'data-cval-name' => 'The active status field', 'data-cval-rules' => 'required|integer|in:' . array_to_string(active_status())]) }}
                            <label for="{{ fake_field('shipping_type') }}-active" class="cm-switch-label">{{ __('Free') }}</label>

                            {{ Form::radio(fake_field('shipping_type'), ACTIVE_STATUS_INACTIVE, (string)old('shipping_type', isset($paymentMethod) ? $paymentMethod->shipping_type : false) === (string)ACTIVE_STATUS_INACTIVE ? true : false, ['id' => fake_field('shipping_type') . '-inactive', 'class' => 'cm-switch-input']) }}
                            <label for="{{ fake_field('shipping_type') }}-inactive" class="cm-switch-label">{{ __('Paid') }}</label>
                        </div>
                    </div>
                </div>
                <!-- End: basic information -->

                <!-- Start: basic information -->
                <div class="form-group form-row mt-4">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('content') }}">{{__('Multiple Bid')}} :</label>

                    <div class="col-md-10">
                        <div class="cm-switch">
                            {{ Form::radio(fake_field('is_multiple_bid_allowed'), ACTIVE_STATUS_ACTIVE, (string)old('is_multiple_bid_allowed', isset($paymentMethod) ? $paymentMethod->is_multiple_bid_allowed : ACTIVE_STATUS_ACTIVE) === (string)ACTIVE_STATUS_ACTIVE ? true : false, ['id' => fake_field('is_multiple_bid_allowed') . '-active', 'class' => 'cm-switch-input', 'data-cval-name' => 'The active status field', 'data-cval-rules' => 'required|integer|in:' . array_to_string(active_status())]) }}
                            <label for="{{ fake_field('is_multiple_bid_allowed') }}-active" class="cm-switch-label">{{ __('Allowed') }}</label>

                            {{ Form::radio(fake_field('is_multiple_bid_allowed'), ACTIVE_STATUS_INACTIVE, (string)old('is_multiple_bid_allowed', isset($paymentMethod) ? $paymentMethod->is_multiple_bid_allowed : false) === (string)ACTIVE_STATUS_INACTIVE ? true : false, ['id' => fake_field('is_multiple_bid_allowed') . '-inactive', 'class' => 'cm-switch-input']) }}
                            <label for="{{ fake_field('is_multiple_bid_allowed') }}-inactive" class="cm-switch-label">{{ __('Not Allowed') }}</label>
                        </div>
                    </div>
                </div>
                <!-- End: basic information -->

                <!-- Start: product image -->
                <div class="form-group form-row mt-4">
                    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('content') }}">{{__('Multiple Image')}} :</label>
                    <div class="col-lg-10">
                        <div id="preview-multi-img">
                            <div class="row" id="TextBoxContainer">
                                <div class="col-lg-4">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new img-thumbnail mb-3">
                                                <img class="img" src="{{know_your_customer_images('preview.png')}}"  alt="">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists mb-3 img-thumbnail"></div>
                                            <div>
                                                <span class="btn btn-sm btn-outline-success btn-file mr-2">
                                                    <span class="fileinput-new">{{__('Select')}}</span>
                                                    <span class="fileinput-exists">{{__('Change')}}</span>
                                                    {{ Form::file('images[]', [old('images'),'class'=>'multi-input', 'id' => fake_field('images'),])}}
                                                </span>
                                                <a href="#" class="btn btn-sm btn-outline-danger fileinput-exists" data-dismiss="fileinput">">{{__('Remove')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="btnAdd" type="button" class="btn btn-primary mt-3" data-toggle="tooltip">{{__('Add Image')}}</button>
                        </div>
                    </div>
                </div>
                <!-- End: product image -->

            </div>

            <div class="card-footer text-muted">
                <button value="Submit Design" type="submit" class="btn custom-btn float-right has-spinner my-2" id="two">{{__('Create Auction')}}</button>
            </div>

        </div>

    {{ Form::close() }}

    <!-- jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template script -->
    <script src="{{ asset('frontend/assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('vendor/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/cvalidator.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('vendor/moment.js/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap4-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
    $(document).ready(function () {

        if($('input:radio[name="gratuit"]').val() == 1){
            $("#switchCounterType").hide();
            $("#labelCounterType").hide();
            $("#inscriptionField").hide();
            $("#rapidCounter").hide();
        }else{
            console.log("You selected the paid auction option");
            $("#switchCounterType").show();
            $("#labelCounterType").show();
            $("#inscriptionField").show();
            // $("#normalCounter").hide();
            $("#pxNbr").hide();
            // $("#endingDate").show();


            if ($('input:radio[name="counter_type"]').val() == '1') {
                console.log("You selected the normal counter option");
                $("#normalCounter").hide();
                $("#rapidCounter").hide();
                $("#endingDate").show();
            } else {
                console.log("You selected the rapid counter option");
                $("#rapidCounter").show();
                $("#normalCounter").hide();
                $("#endingDate").hide();

            }
        }


        $('input:radio[name="gratuit"]').change(function() {
        if ($(this).val() == '1') {
            console.log("You selected the free auction option ");
            $("#normalCounter").show();
            $("#switchCounterType").hide();
            $("#labelCounterType").hide();
            $("#inscriptionField").hide();
            $("#pxNbr").show();
            $("#rapidCounter").hide();
            $("#endingDate").show();
        } else {
            console.log("You selected the paid auction option");
            $("#switchCounterType").show();
            $("#labelCounterType").show();
            $("#inscriptionField").show();
            // $("#normalCounter").hide();
            $("#pxNbr").hide();
            // $("#endingDate").show();

            $('input:radio[name="counter_type"]').change(function() {
            if ($(this).val() == '1') {
                console.log("You selected the normal counter option");
                $("#normalCounter").hide();
                $("#rapidCounter").hide();
                $("#endingDate").show();
            } else {
                console.log("You selected the rapid counter option");
                $("#rapidCounter").show();
                $("#normalCounter").hide();
                $("#endingDate").hide();

            }
            });
        }
        });



    });

    </script>
