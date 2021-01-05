<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Channel::class, 100)->create()->each(function ($u) {
            $u->save();
        });
    }
}
