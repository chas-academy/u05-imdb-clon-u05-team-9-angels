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

      $numberOfMovies = 10; //Input amount of Movies to be imported from API to DB.

      $movieCount = 0;
      $movieRetriveTries = 0;

      while ($movieCount < $numberOfMovies)
      {

            $data = Http::get("https://api.themoviedb.org/3/movie/{$movieRetriveTries}?api_key=df7b9ec54824bdaded1b2ad9585f13a4")->json();

            if (isset($data['title']) && isset($data['overview']) && isset($data['release_date']) && isset($data['poster_path'])) {

                Movie::factory()
                    ->count(1)
                    ->create([
                        'title' => $data['title'],
                        'description' => $data['overview'],
                        'year' => $data['release_date'],
                        'runtime' => $data['runtime'],
                        'rating' => $data['vote_average'],
                        'poster' => $data['poster_path'],

                    ]);
                    $movieCount++;
            }
            $movieRetriveTries++;
        }
        //For creating DB without external API
        // Movie::factory()
        //         ->count(1)
        //         ->create();

    }
}