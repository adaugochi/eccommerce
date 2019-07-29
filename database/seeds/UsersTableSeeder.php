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
            'name' => 'Admin',
            'email' => 'adaamgbede@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('12345678'),
            'phone_number' => '08109030672',
            'country' => 'Nigeria'
        ]);
    }
}
