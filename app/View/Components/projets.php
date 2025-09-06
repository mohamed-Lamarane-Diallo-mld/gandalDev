<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class projets extends Component
{
    /**
     * Create a new component instance.
     */
    public $image;
    public $titre;
    public $github;

    public function __construct($image, $titre, $github)
    {
        $this->image = $image;
        $this->titre = $titre;
        $this->github = $github;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projets');
    }
}
