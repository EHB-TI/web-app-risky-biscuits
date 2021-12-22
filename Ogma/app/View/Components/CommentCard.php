<?php

namespace App\View\Components;

use Illuminate\View\Component;

class commentCard extends Component
{


    public $comment;


    /**
     * Create the component instance.
     *
     * @param  Comment  $comment
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('Components.comment-card');
    }
}
