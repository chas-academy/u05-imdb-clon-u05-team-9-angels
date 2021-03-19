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

      $numberOfMovies = 20; //Input amount of Movies to be imported from API to DB.
      $ActorsPerMovie = 5;  //Imput amount of Actors per movie.



      $movieCount = 0;
      $movieRetriveTries = 0;
      $actorsIDArray = array();
     
      $APIkey=env('TMDB_KEY');

      while ($movieCount < $numberOfMovies)
      {

        
        
        

            $Movies = Http::get("https://api.themoviedb.org/3/movie/{$movieRetriveTries}?api_key={$APIkey}")->json();
            $Casts = Http::get("https://api.themoviedb.org/3/movie/{$movieRetriveTries}/credits?api_key={$APIkey}")->json();
            

            if (isset($Movies['id']) && isset($Movies['title']) && isset($Movies['overview']) && isset($Movies['release_date']) && isset($Movies['poster_path']) && isset($Movies['backdrop_path']) && isset($Casts['cast'][5])) {

              //Importing Movies
                Movie::factory()
                    ->count(1)
                    ->create([
                        'id' => $movieRetriveTries,
                        'title' => $Movies['title'],
                        'description' => $Movies['overview'],
                        'year' => $Movies['release_date'],
                        'runtime' => $Movies['runtime'],
                        'genre' =>  implode("|",array_column($Movies['genres'],'name')),
                        'rating' => $Movies['vote_average'],
                        'poster' => $Movies['poster_path'],
                        'backdrop' => $Movies['backdrop_path'],

                    ]);
                  
                    
                    //Imorting Actors and updating Casts table 
                for($inc=1; $inc<$ActorsPerMovie; $inc++){

                      
                        //Updating Casts Table for current Movie and Actor.
                      Cast::factory()
                        ->count(1)
                        ->create([
                           'actors_id' => $Casts['cast'][$inc]['id'],
                           'movies_id' => $movieRetriveTries,
                           'department' => $Casts['cast'][$inc]['known_for_department'],
                           'name' => $Casts['cast'][$inc]['name'],
                           'character' => $Casts['cast'][$inc]['character'],
                        ]);




                        //Retriving the Actors for the current Movie and checking for duplicates.
                        $actorID = $Casts['cast'][$inc]['id'];
                        $Actors = Http::get("https://api.themoviedb.org/3/person/{$actorID}?api_key={$APIkey}")->json();

                        if(!in_array($actorID, $actorsIDArray)){
                            
                             Actor::factory()
                              ->count(1)
                              ->create([
                               'id' => $actorID,
                               'name' => $Actors['name'],
                               'birthday' => $Actors['birthday'],
                               'deathday' => $Actors['deathday'],
                               'description' => $Actors['biography'],
                               'popularity' => $Actors['popularity'],
                               'poster' => $Actors['profile_path'],



                               
                        ]);


                        }
                          array_push($actorsIDArray, $actorID);
                        

                    };

                    //Retriving Writers, Producers and Directors into cast table for current movie
                    for($inc=1; $inc<count($Casts['crew']); $inc++){

                        if($Casts['crew'][$inc]['job'] == "Writer" || $Casts['crew'][$inc]['job'] == "Producer"|| $Casts['crew'][$inc]['job'] == "Director"){


                            Cast::factory()
                            ->count(1)
                            ->create([
                               'actors_id' => $Casts['crew'][$inc]['id'],
                               'movies_id' => $movieRetriveTries,
                               'department' => $Casts['crew'][$inc]['job'],
                               'name' => $Casts['crew'][$inc]['name'],
                               
                            ]);



                        }

                    }


                      $movieCount++;

            }
            $movieRetriveTries++;


        }


        
    }

  
    
}