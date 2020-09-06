<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/likes/store/{post_id}/{lang}', function($post_id, $lang) {
    \App::setLocale($lang);
    $post = Post::find($post_id);
    if ($post)
    {
        if ($post->like)
        {
            $post->like->increment('likes_number', 1);
            return response()->json(['like' => $post->like->likes_number]);
        }
        else
        {
            $like = new Like();
            $like->likes_number = 1;
            $like->post_id = $post_id;
            $like->save();

            $post = Post::find($post_id);

            return response()->json(['like' => $post->like->likes_number]);
        }
    }
    else
    {
        abort(404);
    }
});
