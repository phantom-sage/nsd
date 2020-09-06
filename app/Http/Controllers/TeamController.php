<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Team;
use App\Lang\Language;

class TeamController extends Controller implements Language
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('throttle:360,1');
        $this->middleware('auth')->except([
            'index',
            'show'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        if(in_array($lang, self::array_of_langs))
        {
            \App::setLocale($lang);
            return view('team.index', ['teams' => Team::all()]);
        }
        else
        {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        if(Auth::user())
        {
            if(Auth::user()->is_admin)
            {
                if(in_array($lang, self::array_of_langs))
                {
                    \App::setLocale($lang);
                    return view('team.create');
                }
                else
                {
                    abort(404);
                }
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lang)
    {
        if(Auth::user())
        {
            if(Auth::user()->is_admin)
            {
                if (in_array($lang, self::array_of_langs))
                {
                    $validTeamInfo = $request->validate([
                        'en_username' => 'required|unique:teams|string|min:8|max:255',
                        'ar_username' => 'required|unique:teams|string|min:8|max:255',
                        'en_job_title' => 'required|string|min:8|max:255',
                        'ar_job_title' => 'required|string|min:8|max:255',
                        'en_fullname' => 'required|string|min:8|max:255',
                        'ar_fullname' => 'required|string|min:8|max:255',
                        'email' => 'required|string|min:8|max:255',
                        'en_education' => 'required|string|min:8|max:255',
                        'ar_education' => 'required|string|min:8|max:255',
                        'en_language' => 'required|string|min:8|max:255',
                        'ar_language' => 'required|string|min:8|max:255',
                        'en_skills' => 'required|string|min:8|max:255',
                        'ar_skills' => 'required|string|min:8|max:255',
                        'logo' => 'required|image',
                    ]);

                    $teammate = new Team();

                    $teammateLogoPath = $request->file('logo')->store('');

                    $teammate->en_username = $validTeamInfo['en_username'];
                    $teammate->ar_username = $validTeamInfo['ar_username'];
                    $teammate->en_job_title = $validTeamInfo['en_job_title'];
                    $teammate->ar_job_title = $validTeamInfo['ar_job_title'];
                    $teammate->en_fullname = $validTeamInfo['en_fullname'];
                    $teammate->ar_fullname = $validTeamInfo['ar_fullname'];
                    $teammate->email = $validTeamInfo['email'];
                    $teammate->en_education = $validTeamInfo['en_education'];
                    $teammate->ar_education = $validTeamInfo['ar_education'];
                    $teammate->en_language = $validTeamInfo['en_language'];
                    $teammate->ar_language = $validTeamInfo['ar_language'];
                    $teammate->en_skills = $validTeamInfo['en_skills'];
                    $teammate->ar_skills = $validTeamInfo['ar_skills'];
                    $teammate->logo = $teammateLogoPath;
                    $teammate->save();

                    \App::setLocale($lang);
                    return redirect()->route('posts.index', ['lang' => \App::getLocale()])
                        ->with('newTeammate', 'New Teammate added successfully');
                }
                else
                {
                    abort(404);
                }
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $lang)
    {
        if(Auth::user())
        {
            if(Auth::user()->is_admin)
            {
                if(in_array($lang, self::array_of_langs))
                {
                    \App::setLocale($lang);
                    $teammate = Team::find($id);
                    if (!$teammate)
                    {
                        abort(404);
                    }
                    else
                    {
                        return view('team.edit', ['teammate' => $teammate]);
                    }
                }
                else
                {
                    abort(404);
                }
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $lang)
    {
        if(Auth::user())
        {
            if(Auth::user()->is_admin)
            {
                if (in_array($lang, self::array_of_langs))
                {
                    $teammate = Team::find($id);

                    if(!$teammate)
                    {
                        abort(404);
                    }
                    else
                    {

                        $validTeammateData = $request->validate([
                            'en_username' => 'required|string|min:8|max:255',
                            'ar_username' => 'required|string|min:8|max:255',
                            'en_job_title' => 'required|string|min:8|max:255',
                            'ar_job_title' => 'required|string|min:8|max:255',
                            'en_fullname' => 'required|string|min:8|max:255',
                            'ar_fullname' => 'required|string|min:8|max:255',
                            'email' => 'required|string|min:8|max:255',
                            'en_education' => 'required|string|min:8|max:255',
                            'ar_education' => 'required|string|min:8|max:255',
                            'en_language' => 'required|string|min:8|max:255',
                            'ar_language' => 'required|string|min:8|max:255',
                            'en_skills' => 'required|string|min:8|max:255',
                            'ar_skills' => 'required|string|min:8|max:255',
                            'logo' => 'nullable|image',
                        ]);

                        // en_username
                        if($validTeammateData['en_username'] !== $teammate->en_username)
                        {
                            $teammate->en_username = $validTeammateData['en_username'];
                        }

                        // ar_username
                        if($validTeammateData['ar_username'] !== $teammate->ar_username)
                        {
                            $teammate->ar_username = $validTeammateData['ar_username'];
                        }

                        // en_job_title
                        if($validTeammateData['en_job_title'] !== $teammate->en_job_title)
                        {
                            $teammate->en_job_title = $validTeammateData['en_job_title'];
                        }

                        // ar_job_title
                        if($validTeammateData['ar_job_title'] !== $teammate->ar_job_title)
                        {
                            $teammate->ar_job_title = $validTeammateData['ar_job_title'];
                        }


                        // en_fullname
                        if($validTeammateData['en_fullname'] !== $teammate->en_fullname)
                        {
                            $teammate->en_fullname = $validTeammateData['en_fullname'];
                        }


                        // ar_fullname
                        if($validTeammateData['ar_fullname'] !== $teammate->ar_fullname)
                        {
                            $teammate->ar_fullname = $validTeammateData['ar_fullname'];
                        }


                        // email
                        if($validTeammateData['email'] !== $teammate->email)
                        {
                            $teammate->email = $validTeammateData['email'];
                        }


                        // en_education
                        if($validTeammateData['en_education'] !== $teammate->en_education)
                        {
                            $teammate->en_education = $validTeammateData['en_education'];
                        }


                        // ar_education
                        if($validTeammateData['ar_education'] !== $teammate->ar_education)
                        {
                            $teammate->ar_education = $validTeammateData['ar_education'];
                        }


                        // en_language
                        if($validTeammateData['en_language'] !== $teammate->en_language)
                        {
                            $teammate->en_language = $validTeammateData['en_language'];
                        }


                        // ar_language
                        if($validTeammateData['ar_language'] !== $teammate->ar_language)
                        {
                            $teammate->ar_language = $validTeammateData['ar_language'];
                        }


                        // en_skills
                        if($validTeammateData['en_skills'] !== $teammate->en_skills)
                        {
                            $teammate->en_skills = $validTeammateData['en_skills'];
                        }


                        // ar_skills
                        if($validTeammateData['ar_skills'] !== $teammate->ar_skills)
                        {
                            $teammate->ar_skills = $validTeammateData['ar_skills'];
                        }


                        // logo
                        if($request->hasFile('logo'))
                        {
                            Storage::delete($teammate->logo);
                            $teammate_logo_path = $request->file('logo')->store('');
                            $teammate->logo = $teammate_logo_path;
                        }

                        $teammate->save();
                        \App::setLocale($lang);

                        return redirect()->route('teams.index', \App::getLocale())
                            ->with('updateTeammateStatus', 'Teammate info updated successfully');
                    }
                }
                else
                {
                    abort(404);
                }
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            return redirect('/login');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $lang)
    {
        if(Auth::user())
        {
            if(Auth::user()->is_admin)
            {
                if (in_array($lang, self::array_of_langs))
                {
                    $teammate = Team::find($id);
                    if(!$teammate)
                    {
                        abort(404);
                    }
                    else
                    {
                        Storage::delete($teammate->logo);
                        $teammate->delete();
                        \App::setLocale($lang);
                        return redirect()->route('teams.index', \App::getLocale())
                            ->with('deleteTeammateStatus', 'Teammate deleted successfully');
                    }
                }
                else
                {
                    abort(404);
                }
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            return redirect('/login');
        }
    }
}
