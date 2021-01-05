<?php

use Illuminate\Database\Seeder;

class StreamTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stream_types')->insert([
            ['name' => 'auto'], 
            ['name' => 'rtp'], 
            ['name' => 'rtsp'],
            ['name' => 'ifm'],
            ['name' => 'fm'],
            ['name' => 'ffmpeg'],
            ['name' => 'ffrt'],
            ['name' => 'ffrt2'],
            ['name' => 'ffrt3'],
            ['name' => 'ffrt4']
        ]);
    }
}
