<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopicList extends Component
{

        /**
     * The Topic.
     *
     * @var Topic
     */
    public $topic;


        /**
     * The Posts.
     *
     * @var Post[]
     */
    public $posts;
    /**
     * Create the component instance.
     *
     * @param  string  $topic
     * @return void
     */
    public function __construct($topic, $posts)
    {
        $this->topic = $topic;
        $this->posts = $posts;
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('Components.topic-list');
    }
}
