<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class timeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
         DB::table('time')->truncate();
            $times = [
        [
            'id' => 1,
            'day' => 'Monday',
            'open_time' => '12:00am',
            'close_time' => '11:59pm',
            'always_close' => 2,
            'created_at' => '2021-02-12 12:30:30',
            'updated_at' => '2021-02-12 19:30:30',
        ],
        [
            'id' => 2,
            'day' => 'Tuesday',
            'open_time' => '12:00am',
            'close_time' => '11:59pm',
            'always_close' => 2,
            'created_at' => '2021-02-12 12:30:30',
            'updated_at' => '2021-02-12 19:30:30',
        ],
        [
            'id' => 3,
            'day' => 'Wednesday',
            'open_time' => '12:00am',
            'close_time' => '11:59pm',
            'always_close' => 2,
            'created_at' => '2021-02-12 12:30:30',
            'updated_at' => '2021-02-12 19:30:30',
        ],
        [
            'id' => 4,
            'day' => 'Thursday',
            'open_time' => '12:00am',
            'close_time' => '11:59pm',
            'always_close' => 2,
            'created_at' => '2021-02-12 12:30:30',
            'updated_at' => '2021-02-12 19:30:30',
        ],
        [
            'id' => 5,
            'day' => 'Friday',
            'open_time' => '12:00am',
            'close_time' => '11:59pm',
            'always_close' => 2,
            'created_at' => '2021-02-12 12:30:30',
            'updated_at' => '2021-02-12 19:30:30',
        ],
        [
            'id' => 6,
            'day' => 'Saturday',
            'open_time' => '12:00am',
            'close_time' => '11:59pm',
            'always_close' => 2,
            'created_at' => '2021-02-12 12:30:30',
            'updated_at' => '2021-02-12 19:30:30',
        ],
        [
            'id' => 7,
            'day' => 'Sunday',
            'open_time' => '12:00am',
            'close_time' => '11:59pm',
            'always_close' => 2,
            'created_at' => '2021-02-12 12:30:30',
            'updated_at' => '2021-02-12 19:30:30',
        ],
    ];

    DB::table('time')->insert($times);

    }
}
