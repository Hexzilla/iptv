<?php

use Illuminate\Database\Seeder;

class LicenseTermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('license_term')->insert([
            ['name' => 'monthly'], ['name' => 'yearly'], ['name' => 'inlimit']
        ]);
    }
}
