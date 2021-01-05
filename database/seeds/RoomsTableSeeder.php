<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Room::class, 6)->create()->each(function ($u) {
            $u->save();
        });
    }
}
