<?php

namespace Database\Seeders;

use App\Models\Movie;
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
        Movie::create([
            'title' => 'リンゴの木の行方',
            'image_url' => 'https://i.picsum.photos/id/56/2880/1920.jpg?hmac=BIplhYgNZ9bsjPXYhD0xx6M1yPgmg4HtthKkCeJp6Fk',
            'published_year' => '1990',
            'description' => '10年前、りんごの木の前で再び待ち合わせることを約束した。',
            'is_showing' => '0'

        ]);
        Movie::create([
            'title' => 'ぶどうと梨',
            'image_url' => 'https://i.picsum.photos/id/116/3504/2336.jpg?hmac=C46vgpj3R407e8pCyy8NhIsNaBZCjb4r5d71keNgMJY',
            'published_year' => '2021',
            'description' => '青春ストーリー',
            'is_showing' => '1'
        ]);
    }
}
