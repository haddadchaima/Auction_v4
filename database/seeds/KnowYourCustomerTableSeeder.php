<?php

use App\Models\User\KnowYourCustomer;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class KnowYourCustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('role_id', '>=', 2)->get();
        foreach ($users as $user) {
            factory(KnowYourCustomer::class)->create(['user_id' => $user->id]);
        }


    }
}
