<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts_count = null;
        $teams_count = null;

        if(Auth::user()->is_admin)
        {
            $posts_count = Post::count();
            $teams_count = Team::count();
            return view('home', ['posts_count' => $posts_count, 'teams_count' => $teams_count]);
        }
        else
        {
            $posts_count = User::find(Auth::user()->id)->posts;
            return view('home', ['posts_count' => count($posts_count)]);
        }
        
    }
}
