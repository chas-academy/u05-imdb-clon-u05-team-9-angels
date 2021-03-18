<?php

namespace Database\Seeders;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\Cast;

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
      $ActorsPerMovie = 5;  //Imput amount of Actors per movie.



      $movieCount = 0;
      $movieRetriveTries = 0;
      $actorsIDs = array();
     
      

      while ($movieCount < $numberOfMovies)
      {

        

            $Movies = Http::get("https://api.themoviedb.org/3/movie/{$movieRetriveTries}?api_key=df7b9ec54824bdaded1b2ad9585f13a4")->json();
            $Casts = Http::get("https://api.themoviedb.org/3/movie/{$movieRetriveTries}/credits?api_key=df7b9ec54824bdaded1b2ad9585f13a4")->json();

            if (isset($Movies['id']) && isset($Movies['title']) && isset($Movies['overview']) && isset($Movies['release_date']) && isset($Movies['poster_path']) && isset($Casts['cast'][$ActorsPerMovie])) {

              //Importing Movies
                Movie::factory()
                    ->count(1)
                    ->create([
                        'id' => $movieRetriveTries,
                        'title' => $Movies['title'],
                        'description' => $Movies['overview'],
                        'year' => $Movies['release_date'],
                        'runtime' => $Movies['runtime'],
                        'rating' => $Movies['vote_average'],
                        'poster' => $Movies['poster_path'],

                    ]);
                  
                    
                    //Imorting Actors and updating Casts table 
                    for($inc=1; $inc<$ActorsPerMovie; $inc++){

                      
                        //Updating Casts Table for current Movie and Actor.
                      Cast::factory()
                        ->count(1)
                        ->create([
                           'actors_id' => $Casts['cast'][$inc]['id'],
                           'movies_id' => $movieRetriveTries,
                           'character' => $Casts['cast'][$inc]['character'],
                        ]);
                        

                        //Retriving the Actors for the current Movie and checking for duplicates.
                        if(!in_array($Casts['cast'][$inc]['id'], $actorsIDs)){
                            
                             Actor::factory()
                              ->count(1)
                              ->create([
                               'id' => $Casts['cast'][$inc]['id'],
                               'name' => $Casts['cast'][$inc]['name'],

                               
                        ]);


                        }
                          array_push($actorsIDs, $Casts['cast'][$inc]['id']);
                        

                    };


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