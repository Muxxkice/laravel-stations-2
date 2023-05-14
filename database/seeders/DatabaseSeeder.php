<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Genre::factory()->count(5)->create();

        Movie::factory()->count(30)->create();
    }
}
