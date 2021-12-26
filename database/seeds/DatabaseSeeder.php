<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(ApplicationSettingsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(NavigationTableSeeder::class);

        if (env('APP_INSTALLED', true)) {
            $this->call(TestSeeder::class);
        }
    }
}
