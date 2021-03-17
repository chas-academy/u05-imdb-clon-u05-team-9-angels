<?php

namespace App\View\Components\Actor;

use Illuminate\View\Component;

class ActorPoster extends Component
{
    public $name;
    public $imageUrl;
    public $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $imageUrl, $url)
    {
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.actor.actor-poster');
    }
}
