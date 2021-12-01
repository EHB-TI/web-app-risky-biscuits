<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserEditor extends Component
{
    /**
     * The Users.
     *
     * @var Users[]
     */
    public $users;

    /**
     * Create the component instance.
     *
     * @param  string  $User
     * @return void
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('Components.user-editor');
    }
}
