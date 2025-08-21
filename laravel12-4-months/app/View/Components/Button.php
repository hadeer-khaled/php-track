<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{

    public string $type ;
    public string $class ;
    /**
     * Create a new component instance.
     */
    
    public function __construct($type = 'button', $class)
    {
        $this->type = $type;
        $this->class = $class;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
