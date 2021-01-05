<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            StreamTypeTableSeeder::class,
            ChannelsTableSeeder::class,
            RoomsTableSeeder::class,
            DevicesTableSeeder::class,
            ProductTableSeeder::class,
            LicenseTermTableSeeder::class
        ]);
    }
}
