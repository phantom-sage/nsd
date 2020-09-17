<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Like;
use App\Lang\Language;

class PostController extends Controller implements Language
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
     * @param string $lang
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $allPosts = Post::paginate(15);
        $likes = Like::all();
        if (in_array($lang, self::array_of_langs))
        {
            \App::setLocale($lang);
            return view('post.index', ['lang' => \App::getLocale(), 'posts' => $allPosts, 'likes' => $likes]);
        }
        else
        {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @param string $lang
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        if (in_array($lang, self::array_of_langs))
        {
            \App::setLocale($lang);
            return view('post.create', ['lang' => \App::getLocale()]);
        }
        else
        {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $lang
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lang)
    {
        if (in_array($lang, self::array_of_langs))
        {
            $validPostData = $request->validate([
                'en_title' => 'required|unique:posts|min:8|max:255',
                'ar_title' => 'required|unique:posts|min:8|max:255',
                'en_body' => 'required|string|min:8|max:255',
                'ar_body' => 'required|string|min:8|max:255',
                'logo' => 'required|image',
            ]);

            $post_logo_path = $request->file('logo')->store('');

            $post = new Post();
            $post->en_title = $validPostData['en_title'];
            $post->ar_title = $validPostData['ar_title'];

            $post->en_body = $validPostData['en_body'];
            $post->ar_body = $validPostData['ar_body'];
            $post->logo = $post_logo_path;
            $post->user_id = Auth::user()->id;

            $post->save();

            \App::setLocale($lang);
            return redirect()->route('posts.index', \App::getLocale())->with('newPostStatus', 'Post Created Successfully');
        }
        else
        {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     * @param string $lang
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $lang)
    {
        $post = Post::find($id);
        if(!$post)
        {
            abort(404);
        }
        else
        {
            if (in_array($lang, self::array_of_langs))
            {
                \App::setLocale($lang);
                return view('post.show', ['lang' => \App::getLocale(), 'post' => $post]);
            }
            else
            {
                abort(404);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param string $lang
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $lang)
    {
        $post = Post::find($id);
        if(!$post)
        {
            abort(404);
        }
        else
        {
           if (in_array($lang, self::array_of_langs))
           {
               if ((Auth::user()->id === $post->user_id) || Auth::user()->is_admin)
               {
                   \App::setLocale($lang);
                   return view('post.edit', ['lang' => \App::getLocale(), 'post' => $post]);
               }
               else
               {
                   abort(403);
               }
           }
           else
           {
               abort(404);
           }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param string $lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $lang)
    {
        $post = Post::find($id);

        if(!$post)
        {
            abort(404);
        }
        else
        {
            if (in_array($lang, self::array_of_langs))
            {

                if ((Auth::user()->id === $post->user_id) || Auth::user()->is_admin)
                {
                    $validPostData = $request->validate([
                        'en_title' => 'required|string|min:8|max:255',
                        'ar_title' => 'required|string|min:8|max:255',
                        'en_body' => 'required|string|min:8|max:1000',
                        'ar_body' => 'required|string|min:8|max:1000',
                        'logo' => 'nullable|image',
                    ]);

                    // comparing en_title
                    if ($validPostData['en_title'] !== $post->en_title)
                    {
                        $post->en_title = $validPostData['en_title'];
                    }

                    // comparing ar_title
                    if ($validPostData['ar_title'] !== $post->ar_title)
                    {
                        $post->ar_title = $validPostData['ar_title'];
                    }

                    // comparing postEnglishBody
                    if ($validPostData['en_body'] !== $post->en_body)
                    {
                        $post->en_body = $validPostData['en_body'];
                    }

                    // comparing postArabicBody
                    if ($validPostData['ar_body'] !== $post->ar_body)
                    {
                        $post->ar_body = $validPostData['ar_body'];
                    }

                    if ($request->hasFile('logo'))
                    {
                        Storage::delete($post->logo);
                        $logo_path = $request->file('logo')->store('');
                        $post->logo = $logo_path;
                    }

                    $post->save();

                    \App::setLocale($lang);
                    return redirect()->route('posts.index', \App::getLocale())->with('newPostStatus', 'Post Updated Successfully');
                }
                else
                {
                    abort(403);
                }
            }
            else
            {
                abort(404);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param string $lang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $lang)
    {
        \App::setLocale($lang);
        $post = Post::find($id);
        if(!$post)
        {
            abort(404);
        }
        else
        {
            if (in_array($lang, self::array_of_langs))
            {
                if ((Auth::user()->id === $post->user_id) || Auth::user()->is_admin)
                {
                    Storage::delete($post->logo);
                    $post->delete();
                    \App::setLocale($lang);
                    return redirect()->route('posts.index', \App::getLocale())->with('deletedPostStatus', 'Post deleted successfully');
                }
                else
                {
                    abort(403);
                }
            }
            else
            {
                abort(404);
            }
        }
    }
}
