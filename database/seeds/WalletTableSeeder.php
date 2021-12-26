<?php

use App\Models\User\User;
use App\Models\User\Wallet;
use Illuminate\Database\Seeder;

class WalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            factory(Wallet::class)->create(['user_id' => $user->id]);
        }
    }
}
