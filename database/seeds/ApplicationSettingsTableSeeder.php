<?php

use App\Models\Core\ApplicationSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class ApplicationSettingsTableSeeder extends Seeder
{
    public function run()
    {
        $date_time = date('Y-m-d H:i:s');
        $adminSettingArray = [
            'lang' => 'en',
            'lang_switcher' => ACTIVE_STATUS_ACTIVE,
            'lang_switcher_item' => 'icon',
            'registration_active_status' => ACTIVE_STATUS_ACTIVE,
            'default_role_to_register' => 2,
            'signupable_user_roles' => [2],
            'require_email_verification' => ACTIVE_STATUS_ACTIVE,
            'company_name' => 'Auctioneer',
            'company_logo' => '_company_logo_.png',
            'company_logo_dashboard' => '_company_logo_dashboard_.png',
            'favicon' => '_favicon_.png',
            'item_per_page' => 10,
            'maintenance_mode' => 0,
            'admin_receive_email' => 'youremail@gmail.com',
            'business_address' => '105, Address, Behind Address, Khulna, Bangladesh.',
            'business_contact_number' => '+88 123456678',
            'copy_rights_year' => '2020',
            'rights_reserved' => 'Codemen',
            'display_google_captcha' => ACTIVE_STATUS_INACTIVE,
            'auction_fee_type' => 1,
            'auction_fee_in_percent' => 0,
            'auction_fee_in_fixed_amount' => 0,
            'withdrawal_fee' => 0,
            'min_withdrawal_amount' => 0,
            'bidding_fee_on_highest_bidder_auction' => 0,
            'bidding_fee_on_blind_bidder_auction' => 0,
            'bidding_fee_on_unique_bidder_auction' => 0,
            'bidding_fee_on_vickrey_bidder_auction' => 0,
            'seller_money_release_request' => 0,
            'dispute_time' => 7,
        ];

        $jsonFields = ['signupable_user_roles'];

        $adminSetting = [];
        foreach ($adminSettingArray as $key => $value) {
            $adminSetting[] = [
                'slug' => $key,
                'value' => in_array($key, $jsonFields) ? json_encode($value, true) : $value,
                'created_at' => $date_time,
                'updated_at' => $date_time
            ];
        }
        ApplicationSetting::insert($adminSetting);

        Cache::forever("application_settings", $adminSettingArray);
    }
}
