<?php

use App\Models\User\Address;
use App\Models\User\Auction;
use App\Models\User\Seller;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class SellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('role_id', 3)->with('profile')->get();
        foreach ($users as $user) {
            factory(Seller::class)->create(['user_id' => $user->id])->each(function ($seller) use ($user) {
                $seller->auctions()->saveMany(factory(Auction::class, 30)->make());
                $seller->address()->save(factory(Address::class)->make([
                    'name' => $user->profile->full_name,
                    'ownerable_type' =>get_class($seller),
                    'ownerable_id' => $seller->id,
                ]));
            });
        }
    }
}
