<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['key' => 'in-stock', 'name' => 'In Stock'],
            ['key' => 'out-stock', 'name' => 'Out Stock'],
            ['key' => 'pending', 'name' => 'Pending'],
            ['key' => 'delivered', 'name' => 'Delivered']
        ]);
    }
}
