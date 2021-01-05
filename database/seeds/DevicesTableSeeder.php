<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Device::class, 20)->create()->each(function ($u) {
            $u->save();
        });
    }
}
