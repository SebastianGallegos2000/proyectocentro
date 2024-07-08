<?php

namespace App\Http\Controllers;

class AboutController
{
    /**
     * Invoca a la vista.
     */
    public function __invoke()
    {
        return view('about');
    }
}
