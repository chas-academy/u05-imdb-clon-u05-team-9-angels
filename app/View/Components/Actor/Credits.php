<?php

namespace App\View\Components\Actor;

use Illuminate\View\Component;

class Credits extends Component
{
    public $movies;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($movies)
    {
        $this->movies = $movies;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.actor.credits');
    }
}
