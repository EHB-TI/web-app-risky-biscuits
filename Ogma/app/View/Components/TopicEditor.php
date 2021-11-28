<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopicEditor extends Component
{

        /**
     * The Topic.
     *
     * @var Topic
     */
    public $topics;


    /**
     * Create the component instance.
     *
     * @param  string  $topic
     * @return void
     */
    public function __construct($topics)
    {
        $this->topics = $topics;
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('Components.topic-editor');
    }
}
