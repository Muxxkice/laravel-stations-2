<?php

namespace Database\Seeders;

use App\Movies;
use App\Practice;
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
        Movies::create([
            'title' => 'リンゴの木の行方',
            'image_url' => 'https://i.picsum.photos/id/56/2880/1920.jpg?hmac=BIplhYgNZ9bsjPXYhD0xx6M1yPgmg4HtthKkCeJp6Fk',
        ]);
        Movies::create([
            'title' => 'ぶどうと梨',
            'image_url' => 'https://i.picsum.photos/id/116/3504/2336.jpg?hmac=C46vgpj3R407e8pCyy8NhIsNaBZCjb4r5d71keNgMJY',
        ]);
    }
}
