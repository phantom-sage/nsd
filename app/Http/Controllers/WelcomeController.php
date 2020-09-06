<?php

namespace App\Http\Controllers;


class WelcomeController extends Controller
{

    /**
     * Show the welcome page.
     * @param $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        return redirect()->route('posts.index', \App::getLocale());
    }
}