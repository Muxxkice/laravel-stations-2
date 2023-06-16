<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::factory()->create([
            'movie_id' => 160,
            'start_time' => '09:00:00',
            'end_time' => '11:00:00',
        ]);

        Schedule::factory()->create([
            'movie_id' => 160,
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
        ]);
        Schedule::factory()->create([
            'movie_id' => 160,
            'start_time' => '14:00:00',
            'end_time' => '12:00:00',
        ]);
        //
    }
}
