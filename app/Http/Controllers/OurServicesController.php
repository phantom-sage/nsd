<?php

namespace App\Http\Controllers;
use App\Lang\Language;

class OurServicesController extends Controller implements Language
{
    /**
     * Show the our services page.
     * @param string $lang
     * @return \Illuminate\Http\Response
     */
    public function __invoke($lang)
    {
        if (in_array($lang, self::array_of_langs))
        {
            \App::setLocale($lang);
            return view('our_services');
        }
        else
        {
            abort(404);
        }
    }
}
