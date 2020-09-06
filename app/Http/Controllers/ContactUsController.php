<?php

namespace App\Http\Controllers;
use App\Lang\Language;

class ContactUsController extends Controller implements Language
{

    /**
     * Show the contact us page.
     * @param $lang
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke($lang)
    {
        if (in_array($lang, self::array_of_langs))
        {
            \App::setLocale($lang);
            return view('contact_us');
        }
        else
        {
            abort(404);
        }
    }
}
