<?php

use App\Models\Core\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $date = Carbon::now();

        $inputs = [
            [
                'name' => 'Admin',
                'permissions' => '{"seller_section":{"profile_management":["reader_access","creation_access","modifier_access"],"KYC_verification":["reader_access","creation_access"],"address_management":["reader_access","creation_access","modifier_access","deletion_access"],"manage_auction":["creation_access","modifier_access"]},"buyer_section":{"profile_section":["reader_access","modifier_access"],"address_section":["reader_access","creation_access","modifier_access","deletion_access"],"deposit_management":["reader_access","creation_access"],"withdrawal_managements":["reader_access","creation_access"],"transaction_histories":["reader_access"],"wallets":["reader_access"],"biding_access":["reader_access","creation_access"],"comment_access":["reader_access","creation_access","modifier_access","deletion_access"],"shipping_management":["creation_access","modifier_access"],"dispute_access":["reader_access","creation_access"],"notifications_access":["reader_access","modifier_access"],"become_seller_access":["creation_access"]},"user_managements":{"role_managements":["reader_access","creation_access","modifier_access","deletion_access"]}}',
                'created_at' => $date,
                'updated_at' => $date

            ],
            [
                'name' => 'Buyer',
                'permissions' => '{"buyer_section":{"profile_section":["reader_access","modifier_access"],"address_section":["reader_access","creation_access","modifier_access","deletion_access"],"deposit_management":["reader_access","creation_access"],"withdrawal_managements":["reader_access","creation_access"],"transaction_histories":["reader_access"],"wallets":["reader_access"],"biding_access":["reader_access","creation_access"],"comment_access":["reader_access","creation_access","modifier_access","deletion_access"],"shipping_management":["creation_access","modifier_access"],"dispute_access":["reader_access","creation_access"],"notifications_access":["reader_access","modifier_access"],"become_seller_access":["creation_access"],"seller_profile":["reader_access"]}}',
                'created_at' => $date,
                'updated_at' => $date
            ],[
                'name' => 'Seller',
                'permissions' => '{"seller_section":{"profile_management":["reader_access","creation_access","modifier_access"],"KYC_verification":["reader_access","creation_access"],"address_management":["reader_access","creation_access","modifier_access","deletion_access"],"manage_auction":["creation_access","modifier_access"]},"buyer_section":{"profile_section":["reader_access","modifier_access"],"address_section":["reader_access","creation_access","modifier_access","deletion_access"],"deposit_management":["reader_access","creation_access"],"withdrawal_managements":["reader_access","creation_access"],"transaction_histories":["reader_access"],"wallets":["reader_access"],"biding_access":["reader_access","creation_access"],"comment_access":["reader_access","creation_access","modifier_access","deletion_access"],"shipping_management":["creation_access","modifier_access"],"dispute_access":["reader_access","creation_access"],"notifications_access":["reader_access","modifier_access"]}}',
                'created_at' => $date,
                'updated_at' => $date
            ],
        ];


        Role::insert($inputs);

        foreach ($inputs as $key => $input) {

            cache()->forever("roles" . ($key + 1), json_decode($input['permissions'], true));
        }
    }
}
