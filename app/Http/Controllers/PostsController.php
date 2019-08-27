<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Posts;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Likes;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       $data = $this->validate($request, 
        [
            'post' => 'required',
            'image' => 'image',
        ],[], []);
        $post = new Posts;
        $post->post = $request->post;
        $post->category_id =  $request->category;
        $post->user_id = auth()->user()->id;
        $post->created_at = Carbon::now();
        if($request->hasFile('image'))
        {
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/posts'), $imgName); 
        $post->image = 'uploads/posts/'.$imgName ;
        }
       $post->save();
       return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $categories = Categories::all();
        return  view('posts.edit', ['post' => $post, 'categories' => $categories]);

        //return json_encode($json);
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
         $data = $this->validate($request, 
        [
            'post' => 'required',
            'image' => 'image',
        ],[], []);
        $post = Posts::find($id);
        $post->post = $request->post;
        $post->category_id =  $request->category;
        $post->user_id = auth()->user()->id;
        $post->updated_at = Carbon::now();
        if($request->hasFile('image'))
        {
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/posts'), $imgName); 
          $post->image = 'uploads/posts/'.$imgName ;
        }else{
           if(!$request->image_value){
           $post->image = null ;
            }
        }
        
       $post->update();
       return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::where('id', $id)->delete();
        return redirect()->back();
    }

    public function like(Request $request)
    {
        Likes::create(['post_id' => $request->postId, 'user_id' =>auth()->user()->id]);
        return;
     
    }
     public function disLike(Request $request)
    {
        $user = auth()->user();
        $like= $user->like()->where('post_id', $request->postId)->delete();
        return('yes');
        
    }
}
