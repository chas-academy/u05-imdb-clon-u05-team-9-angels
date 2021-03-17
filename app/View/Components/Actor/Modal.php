<?php

namespace App\View\Components\Actor;

use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $title;
    public $name;
    public $age;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $name, $age, $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->name = $name;
        $this->age = $age;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.actor.modal');
    }
}
