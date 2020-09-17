<?php

namespace App\Http\Controllers;
use App\Lang\Language;

class AboutUsController extends Controller implements Language
{

    /**
     * Show the about us page.
     * @param $lang
     * @return \Illuminate\Http\Response
     */
    public function __invoke($lang)
    {
        if (in_array($lang, self::array_of_langs))
        {
            \App::setLocale($lang);
            return view('about_us');
        }
        else
        {
            abort(404);
        }
    }
}
