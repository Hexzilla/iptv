<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@exop.com',
            'password' => bcrypt('admin'),
        ]);

        factory(App\User::class, 5)->create()->each(function ($u) {
            $u->save();
        });
    }
}
