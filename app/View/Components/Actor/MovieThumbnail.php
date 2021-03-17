<?php

namespace App\View\Components\Actor;

use Illuminate\View\Component;

class MovieThumbnail extends Component
{
    public $imageUrl;
    public $title;
    public $year;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imageUrl, $title, $year)
    {
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->year = $year;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.actor.movie-thumbnail');
    }
}
