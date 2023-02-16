<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::factory() -> count(200) -> make() -> each(function($m) {
            $genre = Genre :: inRandomOrder() -> first();

            $m -> genre() -> associate($genre);

            $m -> save();

            $tags = Tag::inRandomOrder() -> limit(rand(1,4)) -> get();

            $m -> tags() -> sync($tags);
        });
    }
}
