<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Lang\Language;

class CommentController extends Controller implements Language
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id, $lang)
    {
        if($post_id && in_array($lang, self::array_of_langs))
        {
            $validCommentData = $request->validate([
                'person_name' => 'required|string|max:255',
                'comment_text' => 'required|string',
            ]);
            $comment = new Comment();
            $comment->person_name = $validCommentData['person_name'];
            $comment->comment_text = $validCommentData['comment_text'];
            $comment->post_id = $post_id;
            $comment->save();

            \App::setLocale($lang);
            return redirect()->route('posts.show', ['id' => $post_id, 'lang' => \App::getLocale()]);
        }
        else
        {
            abort(404);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
