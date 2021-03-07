<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Http;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 100; $x <= 110; $x++){
        $data = Http::get("https://api.themoviedb.org/3/movie/{$x}?api_key=df7b9ec54824bdaded1b2ad9585f13a4")->json();
        Movie::factory()
        ->count(1)
        ->create([
            'title' => $data['original_title'],
            'description' => $data['overview'],
            'year' => $data['release_date'],
        ]);
         
}
        // Movie::factory()
        //         ->count(1)
        //         ->create();

    }
    
}
