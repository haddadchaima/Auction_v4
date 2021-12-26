<?php

use App\Models\Admin\Layout;
use Illuminate\Database\Seeder;

class LayoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Layout::class, 8)->create();
    }
}
