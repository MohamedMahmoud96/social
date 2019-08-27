<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Posts;
use App\user;
use Illuminate\Validation\Rule;
use App\Follow;
use App\Categories;
use Illuminate\Support\Str;
class UsersController extends Controller
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        
     
        $user = User::with(['user_follower','user_following'])->where('id', $id)->first();
        $viewed = Session::get('view_profile', []);
        if(! in_array($user->id, $viewed ))
        {
            $user->increment('view');
            Session::push('view_profile', $user->id);
        }

        $posts = Posts::with(['user','post_comments.user', 'post_comments.reply.user', 'category'])->where('user_id', $id)->orderBy('id', 'DESC')->get();

        $categories = Categories::paginate(5);
        return view('user.profile', ['user' => $user,'posts'=> $posts,'categories' => $categories]);
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
      $roule = ['name' => 'required', 'email' => 'required|unique:users'];
      $data = $this->validate($request, $roule, [], ['name'=> 'name', 'email' =>'email'] );
      user::find($id)->update($data);
      return redirect()->route('setting');
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

    public function upload_img()
    {
       
    }

    public function add_follow(Request $request)
    {
         Follow::create(['follower' => $request->follower, 'user_id' =>auth()->user()->id]);
        return 'done';

        /*
        if($request->ajax())
        {
            $data = $this->validate($request, ['user_id' =>'integer', 'follower' => 'integer' ], [], ['user_id'=> 'user', 'follower'=> 'follower']);
           Follow::create($data);
           return;
        }
        */
    }

    public function delete_follow(Request $request)
    {  
       
        $user = auth()->user();
        $user->user_following()->where('follower', $request->follower)->delete();
        return 'done';

    /*
         if($request->ajax())
        {
           Follow::where('user_id',$request->user_id )->delete();
           return;
        }
         */
    }
    public function change_image(Request $request, $id)
    {
        if($request->hasFile('image')){
        $this->validate($request, ['image' => 'required|image']);
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/users'), $imgName); 
          $image = 'uploads/users/'.$imgName ;
          User::find($id)->update(['image'=>$image]);
          return back();
        }
     
    }
}
