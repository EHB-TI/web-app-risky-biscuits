<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthValidationErrors extends Component
{
    /**
     * The Errors.
     *
     * @var Errors[]
     */
    public $errors;
    /**
     * Create the component instance.
     *
     * @param  string  $errors
     * @return void
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('Components.auth-validation-errors');
    }
}
