<?php

use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $date = Carbon::now();

        $users = [
            [
                'role_id' => USER_ROLE_SUPER_ADMIN,
                'username' => 'superadmin',
                'email' => 'superadmin@codemen.org',
                'ref_id' => Str::uuid(),
                'password' => Hash::make('superadmin'),
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_INACTIVE,
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'role_id' => USER_ROLE_USER,
                'username' => 'buyer',
                'email' => 'buyer@codemen.org',
                'ref_id' => Str::uuid(),
                'password' => Hash::make('buyer'),
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_INACTIVE,
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'role_id' => USER_ROLE_USER,
                'username' => 'buyer2',
                'email' => 'buyer2@codemen.org',
                'ref_id' => Str::uuid(),
                'password' => Hash::make('buyer2'),
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_INACTIVE,
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'role_id' => USER_ROLE_SELLER,
                'username' => 'seller',
                'email' => 'seller@codemen.org',
                'ref_id' => Str::uuid(),
                'password' => Hash::make('seller'),
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_INACTIVE,
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
        ];

        User::insert($users);
    }
}
