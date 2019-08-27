<?php

namespace App\Http\Controllers;
use App\Posts;
use App\User;
use App\Categories;
use Illuminate\Http\Request;
use App\Follow;
use App\Comment;

class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {  
    if($request)
        {
           $sessionId =   session('id');
        }
        //dd($request->session('id'));
         $view = $request->session()->has('view_user')?  $request->session()->put('view_user', (session('view_user') + 1)) : $request->session()->put('view_user',   1);
        //return Session('view_user');
        
       
       $count = Posts::all();
       $count = $count->groupBy('user_id');
        
      //  $count = Posts::where('user_id', )
        $categories = Categories::paginate(5);
        $followers =[];
        if(auth()->check())
        {
            $followers = Follow::with('user_follower')->where('user_id', auth()->user()->id)->get();
        }
        
        $PopularUsers = User::orderBy('view', 'DESC')->paginate(3);
        
        if($request->ajax())
        {
            if($request->catId)
            {
                  $posts = Posts::orderBy('id', 'DESC')->with('user.user_follower')->where('category_id' , $request->catId)->get();
            
              }else{
               $follower = Follow::with(['post_following', 'post_follower'])->where('user_id', auth()->user()->id)->get();
                
               return view('posts.following_posts', ['follower' => $follower]);
                //return  dd($following->user_following->posts);
              
              }
          
             return view('posts.show', ['posts' => $posts]);
        }else{

            $posts = Posts::orderBy('id', 'DESC')->with(['post_comments','user.user_follower' ])->get();
        }
      
        
       
        return view('home', ['posts' =>$posts, 'categories'=>$categories, 'PopularUsers' =>$PopularUsers, 'followers' =>$followers] );
    }
}
