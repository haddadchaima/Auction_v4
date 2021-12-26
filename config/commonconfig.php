<?php
return [

    'fixed_roles' => [USER_ROLE_SUPER_ADMIN, USER_ROLE_USER],

    'fixed_users' => [FIXED_USER_SUPER_ADMIN],

    'front_end_view' => [
        'filter' => 'frontend.renderable_template.filters',
        'pagination' => 'frontend.renderable_template.pagination'
    ],
    'back_end_view' => [
        'filter' => 'backend.renderable_template.filters',
        'pagination' => 'backend.renderable_template.pagination'
    ],
    'path_profile_image' => 'images/users/',
    'path_image' => 'images/',
    'payment_method_logo' => 'images/payment_method_logo/',
    'currency_logo' => 'images/currency_logo/',
    'know_your_customer_images' => 'images/know_your_customer_images/',
    'seller_profile_images' => 'images/seller_profile_images/',
    'auction_image' => 'images/auction_image/',
    'dispute_image' => 'images/dispute_image/',
    'slider_images' => 'images/slider_images/',

    'language_icon' => '/images/languages/',
    'email_status' => [
        EMAIL_VERIFICATION_STATUS_ACTIVE => ['color_class' => 'success'],
        EMAIL_VERIFICATION_STATUS_INACTIVE => ['color_class' => 'danger'],
    ],
    'account_status' => [
        USER_STATUS_ACTIVE => ['color_class' => 'success'],
        USER_STATUS_INACTIVE => ['color_class' => 'warning'],
        USER_STATUS_DELETED => ['color_class' => 'danger'],
    ],
    'financial_status' => [
        FINANCIAL_STATUS_ACTIVE => ['color_class' => 'success'],
        FINANCIAL_STATUS_INACTIVE => ['color_class' => 'danger'],
    ],
    'active_status' => [
        ACTIVE_STATUS_ACTIVE => ['color_class' => 'bg-success text-white', 'text' => 'ACTIVE'],
        ACTIVE_STATUS_INACTIVE => ['color_class' => 'bg-custom-gray color-666', 'text' => 'INACTIVE'],
    ],
    'is_multi_bid_allowed' => [
        ACTIVE_STATUS_ACTIVE => ['color_class' => 'bg-success text-white', 'text' => 'Yes'],
        ACTIVE_STATUS_INACTIVE => ['color_class' => 'bg-danger text-white', 'text' => 'No'],
    ],
    'verification_status' => [
        VERIFICATION_STATUS_UNVERIFIED => ['color_class' => 'bg-danger', 'text' => 'UNVERIFIED'],
        VERIFICATION_STATUS_APPROVED => ['color_class' => 'bg-success', 'text' => 'APPROVED'],
        VERIFICATION_STATUS_PENDING => ['color_class' => 'bg-warning', 'text' => 'PENDING'],
    ],
    'auction_type' => [
        AUCTION_TYPE_HIGHEST_BIDDER => ['color_class' => 'bg-purple text-white', 'text' => 'Highest Bid'],
        AUCTION_TYPE_BLIND_BIDDER => ['color_class' => 'bg-pink text-white', 'text' => 'Blind Bid'],
        AUCTION_TYPE_UNIQUE_BIDDER => ['color_class' => 'bg-teal text-white', 'text' => 'Unique Bid'],
        AUCTION_TYPE_VICKREY_AUCTION => ['color_class' => 'bg-blue text-white', 'text' => 'Vickrey Auction'],
    ],
    'dispute_type' => [
        DISPUTE_TYPE_AUCTION_ISSUE => ['color_class' => 'bg-purple text-white', 'text' => 'Auction Issue'],
        DISPUTE_TYPE_SELLER_ISSUE => ['color_class' => 'bg-pink text-white', 'text' => 'Seller Issue'],
        DISPUTE_TYPE_TRANSACTION_ISSUE => ['color_class' => 'bg-teal text-white', 'text' => 'Transaction Issue'],
        DISPUTE_TYPE_SHIPPING_ISSUE => ['color_class' => 'bg-info text-white', 'text' => 'Shipping Issue'],
        DISPUTE_TYPE_OTHER_ISSUE => ['color_class' => 'bg-blue text-white', 'text' => 'Other Issue'],
    ],
    'dispute_status' => [
        DISPUTE_STATUS_PENDING => ['color_class' => 'bg-warning text-white', 'text' => 'Pending'],
        DISPUTE_STATUS_ON_INVESTIGATION => ['color_class' => 'bg-blue text-white', 'text' => 'On Investigation'],
        DISPUTE_STATUS_SOLVED => ['color_class' => 'bg-success text-white', 'text' => 'Solved'],
    ],
    'payment_status' => [
        PAYMENT_STATUS_PENDING  => ['color_class' => 'bg-warning text-white', 'text' => 'Pending'],
        PAYMENT_STATUS_COMPLETED  => ['color_class' => 'bg-success text-white', 'text' => 'Completed'],
        PAYMENT_STATUS_CANCELED  => ['color_class' => 'bg-custom-gray color-666', 'text' => 'Canceled'],
        PAYMENT_STATUS_FAILED => ['color_class' => 'bg-danger text-white', 'text' => 'Failed'],
    ],

    'layout_types' => [
        AUCTION_LAYOUT_TYPE_RECENT_AUCTION => ['color_class' => 'bg-purple text-white', 'text' => 'Recent Auction'],
        AUCTION_LAYOUT_TYPE_POPULAR_AUCTION => ['color_class' => 'bg-pink text-white', 'text' => 'Popular Auction'],
        AUCTION_LAYOUT_TYPE_HIGHEST_BIDDER_AUCTION => ['color_class' => 'bg-teal text-white', 'text' => 'Highest Bid'],
        AUCTION_LAYOUT_TYPE_BLIND_BIDDER_AUCTION => ['color_class' => 'bg-blue text-white', 'text' => 'Blind Bid'],
        AUCTION_LAYOUT_TYPE_UNIQUE_BIDDER_AUCTION => ['color_class' => 'bg-indigo text-white', 'text' => 'Unique Bid'],
        AUCTION_LAYOUT_TYPE_VICKREY_BIDDER_AUCTION => ['color_class' => 'bg-success text-white', 'text' => 'Vickrey Bid'],
        AUCTION_LAYOUT_TYPE_LOWEST_PRICE_AUCTION => ['color_class' => 'bg-info text-white', 'text' => 'Lowest Price'],
        AUCTION_LAYOUT_TYPE_HIGHEST_PRICE_AUCTION => ['color_class' => 'bg-warning text-white', 'text' => 'Highest Price'],
    ],

    'product_claim_status' => [
        AUCTION_PRODUCT_CLAIM_STATUS_ON_SHIPPING  => ['color_class' => 'bg-warning text-white', 'text' => 'On Shipping'],
        AUCTION_PRODUCT_CLAIM_STATUS_DISPUTED  => ['color_class' => 'bg-warning text-white', 'text' => 'Disputed'],
        AUCTION_PRODUCT_CLAIM_STATUS_DELIVERED  => ['color_class' => 'bg-success text-white', 'text' => 'Delivered'],
        AUCTION_PRODUCT_CLAIM_STATUS_NOT_DELIVERED_YET  => ['color_class' => 'bg-custom-gray color-666', 'text' => 'Not Delivered Yet'],

    ],
    'auction_status' => [
        AUCTION_STATUS_RUNNING  => ['color_class' => 'bg-success text-white', 'text' => 'Running'],
        AUCTION_STATUS_COMPLETED  => ['color_class' => 'bg-danger text-white', 'text' => 'Completed'],
    ],
    'shipping_type' => [
        SHIPPING_TYPE_FREE  => ['color_class' => 'bg-success text-white', 'text' => 'Free'],
        SHIPPING_TYPE_PAID  => ['color_class' => 'bg-danger text-white', 'text' => 'Paid'],
    ],
    'payment_methods' => [
        PAYMENT_METHOD_PAYPAL  => ['color_class' => 'bg-custom-gray color-666', 'text' => 'PayPal'],
    ],
    'maintenance_accessible_status' => [
        UNDER_MAINTENANCE_ACCESS_ACTIVE => ['color_class' => 'success'],
        UNDER_MAINTENANCE_ACCESS_INACTIVE => ['color_class' => 'danger'],
    ],
    'image_extensions' => ['png', 'jpg', 'jpeg', 'gif'],

    'system_notice_types' => ['warning', 'success', 'danger', 'primary', 'info'],

    'strip_tags' => [
        'escape_text' => ['beginning_text', 'ending_text','company_name', 'product_description'],
        'escape_full_text' => ['terms_description', 'product_description'],
        'allowed_tag_for_escape_text' => '<p><br><b><i><u><strong><ul><ol><li>',
        'allowed_tag_for_escape_full_text' => '<h1><h2><h3><h4><h5><h6><hr><article><section><video><audio><table><tr><td><thead><tfoot><footer><header><p><br><b><i><u><strong><ul><ol><dl><dt><li><div><sub><sup><span>',
    ],

    'available_commands' => [
        'cache' => 'cache:clear',
        'config' => 'config:clear',
        'route' => 'route:clear',
        'view' => 'view:clear',
    ],

];
