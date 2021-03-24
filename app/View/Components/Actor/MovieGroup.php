<?php

namespace App\View\Components\Actor;

use Illuminate\View\Component;

class MovieGroup extends Component
{
    public $movies;
    public $title;
    public $isCarousel;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($movies, $title, $carousel = false)
    {
        $this->movies = $movies;
        $this->title = $title;
        $this->isCarousel = $carousel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.actor.movie-group');
    }
}
