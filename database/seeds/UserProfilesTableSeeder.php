<?php

use App\Models\User\UserProfile;
use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon\Carbon::now();
        $profiles = [
            [
                'user_id' => 1,
                'first_name' => "Super",
                'last_name' => "User",
                'address' => 'address 32/1 khulna, Bangladesh',
                'phone' => '01114548545',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 2,
                'first_name' => "Mr",
                'last_name' => "Buyer",
                'address' => 'address 32/1 khulna, Bangladesh',
                'phone' => '01114548545',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 3,
                'first_name' => "Mr",
                'last_name' => "Buyer2",
                'address' => 'address 32/1 khulna, Bangladesh',
                'phone' => '01114548545',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 4,
                'first_name' => "Mr",
                'last_name' => "Seller",
                'address' => 'address 32/1 khulna, Bangladesh',
                'phone' => '01114548545',
                'created_at' => $date,
                'updated_at' => $date
            ],
        ];

        UserProfile::insert($profiles);
    }
}
