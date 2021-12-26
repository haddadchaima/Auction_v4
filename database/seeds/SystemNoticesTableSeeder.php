<?php

use App\Models\Core\SystemNotice;
use Illuminate\Database\Seeder;

class SystemNoticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SystemNotice::class, 3)->create();
    }
}
