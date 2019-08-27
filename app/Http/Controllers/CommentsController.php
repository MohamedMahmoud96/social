<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use Carbon\Carbon;
use App\Posts;
use App\ReplyComment;
class CommentsController extends Controller
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
    public function store(Request $request)
    {
        if($request->ajax())
        {
            $this->validate($request, ['comment'=>'required'], [],[]);
            $comment= New comments;
            $comment->comment = $request->comment;
            $comment->post_id = $request->commment_post;
            $comment->user_id = auth()->user()->id;
            $comment->created_at = Carbon::now();
            $comment->save();
       
            return view('posts.comment', ['comment' => $comment]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment_delete( Request $request, $id)
    {
        if($request->ajax())
        {
            Comments::find($id)->delete();
            return 'yes';
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply_store(Request $request)
    {
        if($request->ajax())
        {
            $this->validate($request, ['reply'=>'required'], [],[]);
            $reply= New ReplyComment;
            $reply->reply = $request->reply;
            $reply->comment_id = $request->comment_id;
            $reply->user_id = auth()->user()->id;
            $reply->created_at = Carbon::now();
            $reply->save();
       
            return view('posts.reply', ['reply' => $reply]);
        }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reply_delete( Request $request, $id)
    {
        if($request->ajax())
        {
            ReplyComment::find($id)->delete();
            return 'yes';
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
