<?php
/**
 * Created by PhpStorm.
 * User: rana
 * Date: 7/1/18
 * Time: 11:35 AM
 */

return [
    'route_storage' => env('ROUTE_STORAGE', 'cache'),

    'configurable_routes' => [
        'admin_section' => [
            'settings' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'application-settings.index',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'application-settings.edit',
                    'application-settings.update',
                ],
            ],
            'role_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'roles.index',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'roles.create',
                    'roles.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'roles.edit',
                    'roles.update',
                    'roles.status',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'roles.destroy',
                ],
            ],
            'system_notice' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'system-notices.index',
                    'system-notices.show'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'system-notices.create',
                    'system-notices.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'system-notices.edit',
                    'system-notices.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'system-notices.destroy',
                ]
            ],
            'menu_manager' => [
                ROUTE_GROUP_FULL_ACCESS => [
                    'menu-manager.index',
                    'menu-manager.save',
                ],
            ],
            'log_viewer' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'logs.index'
                ]
            ],
            'language_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'languages.index',
                    'languages.settings',
                    'languages.translations'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'languages.create',
                    'languages.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'languages.edit',
                    'languages.update',
                    'languages.update.settings',
                    'languages.sync',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'languages.destroy'
                ]
            ],
            'users_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'users.index',
                    'users.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'users.create',
                    'users.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'users.edit',
                    'users.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'users.update.status',
                    'users.edit.status',
                ],
            ],
            'auction_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'admin-auction.index',
                    'completed-auction.index',
                    'admin-auction.show',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'admin-release-money.update'
                ],
            ],
            'profit_histories' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'admin-transaction-history.index'
                ],
            ],
            'category_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'category.index',
                    'category.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'category.create',
                    'category.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'category.edit',
                    'category.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'category.destroy'
                ],
            ],
            'currency_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'currency.index',
                    'currency.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'currency.create',
                    'currency.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'currency.edit',
                    'currency.update',
                ],
            ],
            'payment_method_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'payment-method.index',
                    'payment-method.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'payment-method.create',
                    'payment-method.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'payment-method.edit',
                    'payment-method.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'payment-method.destroy'
                ],
            ],
            'KYC_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'verification-with-id.index',
                    'verification-with-address.index',

                    'verification-status.show',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'verification-status.edit',
                    'verification-status.change',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'verification-status.destroy',
                ],
            ],
            'reports' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'admin-dispute.index',
                    'admin-dispute.edit',
                    'admin-dispute.mark-as-read',
                    'admin-dispute.mark-as-unread',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'admin-change-dispute-status.update'
                ],
            ],
            'slide_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'slider.index',
                    'slider.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'slider.create',
                    'slider.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'slider.edit',
                    'slider.update',
                    'slider-make-default.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'slider.destroy'
                ],
            ],
            'home_page_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'layout.index',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'layout.create',
                    'layout.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'layout.edit',
                    'layout.update',
                    'layout-make-active.update',
                ],
            ],
        ],
        'seller_section' => [
            'profile_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'seller-profile.index',
                    'seller-profile.show',
                    'get-state.index',
                    'store-management.index',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'seller-profile.create',
                    'seller-profile.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'seller-profile.edit',
                    'seller-profile.update',
                ],
            ],
            'KYC_verification' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'seller-verification.index',
                    'seller-verification.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'seller-verification-with-id.create',
                    'seller-verification-with-address.create',

                    'seller-verification-with-id.store',
                    'seller-verification-with-address.store',
                ],
            ],
            'address_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'address.index',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'address.create',
                    'address.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'address.edit',
                    'address.update',
                    'change-address-status.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'address.destroy'
                ],
            ],
            'manage_auction' => [
                ROUTE_GROUP_CREATION_ACCESS => [
                    'auction.create',
                    'auction.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'update-shipping-status.update',
                ]
            ],
        ],
        'buyer_section' => [
            'profile_section' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'user-profile.index',
                    'user-profile-won-auction.index',
                    'user-manage-profile.index',
                    'user-login',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'user-profile.edit',
                    'user-profile.update',
                    'user-profile.change-password',
                    'user-profile.update-password',
                    'user-profile.avatar.edit',
                    'user-profile.avatar.update',
                ],
            ],
            'address_section' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'user-address.index',
                    'get-state.index',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'user-address.create',
                    'user-address.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'user-address.edit',
                    'user-address.update',
                    'user-change-address-status.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'user-address.destroy'
                ],
            ],
            'deposit_management' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'deposit.index'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'wallet-deposit.create',
                    'wallet-deposit.store',
                    'paypal.return-url',
                    'paypal.cancel-url'
                ],
            ],
            'withdrawal_managements' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'withdrawal-form',
                    'withdrawal.index',
                    'deposit.index'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'withdrawal-form.store'
                ],
            ],
            'transaction_histories' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'transaction-history',
                ],
            ],
            'wallets' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'user-currency.index',
                ],
            ],
            'biding_access' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'bid.index',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'bid.store',
                ],
            ],
            'comment_access' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'comment.index',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'comment.create',
                    'comment.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'comment.edit',
                    'comment.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'comment.destroy'
                ],
            ],
            'shipping_management' => [
                ROUTE_GROUP_CREATION_ACCESS => [
                    'shipping-description.create',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'shipping-description.update',
                    'update-shipping-status-user.update',
                ],
            ],
            'dispute_access' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'dispute.index',
                    'dispute.edit',
                    'dispute.mark-as-read',
                    'dispute.mark-as-unread',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'dispute.create',
                    'dispute.store',
                    'disputes.specific',
                ],
            ],
            'notifications_access' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'notification.index',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'notification.mark-as-read',
                    'notification.mark-as-unread',
                ],
            ],
            'become_seller_access' => [
                ROUTE_GROUP_CREATION_ACCESS => [
                    'seller-profile.create',
                    'seller-profile.store',
                ],
            ],
            'seller_profile' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'seller-profile.show',
                ],
            ],
        ],
    ],

    ROUTE_CONSTANT_PERMISSION => [
        FIXED_USER_SUPER_ADMIN => [
            ROUTE_MUST_ACCESSIBLE => [
                'admin_section',
            ],
            ROUTE_NOT_ACCESSIBLE => [
            ],
        ],
    ],
    ROUTE_TYPE_AVOIDABLE_MAINTENANCE => [
        'login',
    ],
    ROUTE_TYPE_AVOIDABLE_UNVERIFIED => [

    ],
    ROUTE_TYPE_AVOIDABLE_SUSPENDED => [

    ],
    ROUTE_TYPE_FINANCIAL => [

    ],

    ROUTE_TYPE_PRIVATE => [
        'dashboard',
        'logout',
        'profile.index',
        'profile.edit',
        'profile.update',
        'profile.change-password',
        'profile.update-password',
        'profile.avatar.edit',
        'profile.avatar.update',
        'profile-verification.index',
        'profile-verification-with-id.index',
        'profile-verification.show',
        'profile-verification-with-id.create',
        'profile-verification-with-address.create',
        'profile-verification-with-id.store',
        'profile-verification-with-address.store',
        'account.index',
        'account.update',
        'account.logout',
        'notices.index',
        'notices.mark-as-read',
        'notices.mark-as-unread',
    ],
];
