<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Label extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    public $value;


    public function __construct($value)
    {
        $this->value = $value;
    }
    
    public function render()
    {
        return view('Components.label');
    }
}
