<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lang\Language;

class SetLocaleController extends Controller implements Language
{

    /**
     * Set website language
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        if($request->language && in_array($request->language, self::array_of_langs))
        {
            \App::setLocale($request->language);
            return redirect()->route('posts.index', \App::getLocale());
        }
        else
        {
            abort(404);
        }
    }
}
