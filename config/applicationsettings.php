<?php
return [
    'settings' => [
        'general' => [
            'lang' => [
                'field_type' => 'select',
                'field_value' => 'language_short_code_list',
                'default' => config('app.locale'),
                'field_label' => 'Default Site Language',
            ],
            'lang_switcher' => [
                'field_type' => 'switch',
                'field_label' => 'Language Switcher',
            ],
            'lang_switcher_item' => [
                'field_type' => 'select',
                'field_value' => 'language_switcher_items',
                'default' => 'icon',
                'field_label' => 'Display Language Switch Item',
            ],
            'maintenance_mode' => [
                'field_type' => 'switch',
                'field_label' => 'Maintenance mode',
            ],
            'is_id_verified' => [
                'field_type' => 'switch',
                'field_label' => 'Require ID verification to bid',
            ],
            'is_address_verified' => [
                'field_type' => 'switch',
                'field_label' => 'Require Address verification to bid',
            ],
            'default_role_to_register' => [
                'field_type' => 'select',
                'field_value' => 'get_user_roles',
                'field_label' => 'Default registration role',
            ],
            'signupable_user_roles' => [
                'field_type' => 'checkbox',
                'previous' => 'default_role_to_register',
                'validation' => 'required|array|in:get_user_roles',
                'field_label' => 'Allowed role for signup',
                'input_class' => 'flat-blue'
            ],
            'require_email_verification' => [
                'field_type' => 'switch',
                'field_label' => 'Require Email Verification',
            ],
            'display_google_captcha' => [
                'field_type' => 'switch',
                'field_label' => 'Google Captcha Protection',
            ],
            'admin_receive_email' => [
                'field_type' => 'text',
                'validation' => 'required|email',
                'field_label' => 'Email to receive customer feedback',
            ],
            'company_name' => [
                'field_type' => 'text',
                'validation' => 'required',
                'field_label' => 'Company Name',
            ],
            'company_logo' => [
                'field_type' => 'image',
                'height' => 40,
                'width' => 160,
                'validation' => 'image|size:512',
                'field_label' => 'Company Logo (frontend)',
            ],
            'company_logo_dashboard' => [
                'field_type' => 'image',
                'height' => 40,
                'width' => 160,
                'validation' => 'image|size:512',
                'field_label' => 'Company Logo (dashboard)',
            ],
            'favicon' => [
                'field_type' => 'image',
                'height' => 64,
                'width' => 64,
                'validation' => 'image|size:100',
                'field_label' => 'Favicon',
            ],
        ],
        'auction_settings' => [
            'auction_fee_type' => [
                'field_type' => 'select',
                'field_value' => 'auction_fee_type',
                'field_label' => 'Auction Fee Type',
            ],
            'auction_fee_in_percent' =>[
                'field_type'=>'text',
                'validation' => 'numeric|between:0,100',
                'field_label' => 'Auction Fee in Percent',
            ],
            'auction_fee_in_fixed_amount' =>[
                'field_type'=>'text',
                'validation' => 'numeric|between:0,100',
                'field_label' => 'Auction Fee in Fixed Amount',
            ],
            'withdrawal_fee' =>[
                'field_type'=>'text',
                'validation' => 'required|numeric|between:0,100',
                'field_label' => 'withdrawal Fee in Percent',
            ],
            'default_currencies' =>[
                'field_type'=>'text',
                'validation' => 'required|string',
                'field_label' => 'default currencies',
            ],
            'min_withdrawal_amount' =>[
                'field_type'=>'text',
                'validation' => 'required|numeric|between:1,99999999999.99',
                'field_label' => 'Minimum withdrawal'
            ],
            'bidding_fee_on_highest_bidder_auction' =>[
                'field_type'=>'text',
                'validation' => 'required|numeric|between:0,100',
                'field_label' => 'Bidding Fee On ' .'<strong>'. 'Highest Bidder Auction' . '</strong>',
            ],
            'bidding_fee_on_blind_bidder_auction' =>[
                'field_type'=>'text',
                'validation' => 'required|numeric|between:0,100',
                'field_label' => 'Bidding Fee On ' .'<strong>'. 'Blind Bidder Auction' . '</strong>',
            ],
            'bidding_fee_on_unique_bidder_auction' =>[
                'field_type'=>'text',
                'validation' => 'required|numeric|between:0,100',
                'field_label' => 'Bidding Fee On ' .'<strong>'. 'Unique Bidder Auction' . '</strong>',
            ],
            'bidding_fee_on_vickrey_bidder_auction' =>[
                'field_type'=>'text',
                'validation' => 'required|numeric|between:0,100',
                'field_label' => 'Bidding Fee On ' .'<strong>'. 'Vickrey Bidder Auction' . '</strong>',
            ],
            'seller_money_release_request' => [
                'field_type' => 'switch',
                'field_label' => 'Seller Money Release Request',
            ],
            'dispute_time' => [
                'field_type' => 'text',
                'field_label' => 'Buyer Report Time (In Days)',
            ],
        ],
        'paypal_settings' => [
            'paypal_client_id' => [
                'field_type' => 'text',
                'field_label' => 'Client ID',
                'encryption' => true
            ],
            'paypal_secret' => [
                'field_type' => 'text',
                'field_label' => 'Secret',
                'encryption' => true
            ],
            'paypal_webhook_id' => [
                'field_type' => 'text',
                'field_label' => 'Paypal Webhook ID',
                'encryption' => true
            ],
            'paypal_mode' => [
                'field_type' => 'select',
                'field_label' => 'Mode',
                'field_value' => 'get_paypal_mode',
            ],
        ],
        'page_information' => [
            'business_address' => [
                'field_type' => 'text',
                'validation' => 'string',
                'field_label' => 'Business Address',
            ],
            'business_contact_number' => [
                'field_type' => 'text',
                'validation' => 'string',
                'field_label' => 'Business Contact Number',
            ],
            'copy_rights_year' => [
                'field_type' => 'text',
                'validation' => 'string',
                'field_label' => 'Copy Rights Year',
            ],
            'rights_reserved' => [
                'field_type' => 'text',
                'validation' => 'string',
                'field_label' => 'Footer All Rights Reserved By',
            ],
        ],
    ],


    /*
     * ----------------------------------------
     * ----------------------------------------
     * ALL WRAPPER HERE
     * ----------------------------------------
     * ----------------------------------------
    */
    'common_wrapper' => [
        'section_start_tag' => '<tr>',
        'section_end_tag' => '</tr>',
        'slug_start_tag' => '<td>',
        'slug_end_tag' => '</td>',
        'value_start_tag' => '<td>',
        'value_end_tag' => '</td>',
    ],
    'common_text_input_wrapper' => [
        'input_start_tag' => '<div class="form-group">',
        'input_end_tag' => '</div>',
        'input_class' => 'form-control',
    ],
    'common_textarea_input_wrapper' => [
        'input_start_tag' => '<div>',
        'input_end_tag' => '</div>',
        'input_class' => 'form-control',
    ],
    'common_select_input_wrapper' => [
        'input_start_tag' => '<div>',
        'input_end_tag' => '</div>',
        'input_class' => 'form-control',
    ],
    'common_checkbox_input_wrapper' => [
        'input_start_tag' => '<div class="setting-checkbox">',
        'input_end_tag' => '</div>',
//        'input_class'=>'setting-checkbox',
    ],
    'common_radio_input_wrapper' => [
        'input_start_tag' => '<div class="setting-checkbox">',
        'input_end_tag' => '</div>',
        'input_class' => 'setting-radio',
    ],
    'common_toggle_input_wrapper' => [
        'input_start_tag' => '<div class="text-right">',
        'input_end_tag' => '</div>',
//        'input_class'=>'setting-checkbox',
    ],
];
