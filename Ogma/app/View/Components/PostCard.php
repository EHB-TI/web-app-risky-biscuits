<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostCard extends Component
{

            /**
     * The Post.
     *
     * @var Post
     */
    public $post;


     /**
     * Create the component instance.
     *
     * @param  Post  $post
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('Components.post-card');
    }
}
