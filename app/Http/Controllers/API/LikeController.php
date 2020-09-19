<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Like;
use App\Post;

class LikeController extends Controller
{
    /**
     * @param $post_id
     * @param $lang
     * @return \Illuminate\Http\JsonResponse
     */
    public function increment_post_likes_number($post_id, $lang)
    {
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
    }
}
