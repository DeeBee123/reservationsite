<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'hotel_id' => 1,
            'suite_id' => 1,
            'arrival' => '2021-08-11',
            'departure' => '2021-08-12',
            'guests' => 2,
            'price' => 200.52,

        ]);
    }
}
