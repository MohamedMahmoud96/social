
	<!-- Favicon -->   
	

	<!-- Google Fonts -->
	@extends('layouts/app')

	<!-- Stylesheets -->
	@push('css')
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		
		
	@endpush
	@push('js')
		
		<script src="{{asset('front-end/profile/js/jquery.poptrox.min.js')}}"></script>
		<script src="{{asset('front-end/profile/js/skel.min.js')}}"></script>
		<script src="{{asset('front-end/profile/js/init.js')}}"></script>
@endpush
	@section('content')
        
        
      
		<div id="header" class='col-sm-12 col-lg-6   profile-sidebar'>
      @if(auth()->check() && auth()->user()->id == $user->id)
			<form id='form-upload-user-img' action="{{route('user/image',['id'=> $user->id])}}" method="post" enctype="multipart/form-data">
        @csrf
			   <input id='upload-user-img' type="file" name="image" >
			</form>
			<label for='upload-user-img' class='profile-upload-img'>
				<i class="fa fa-camera"></i>
			</label>
      @endif
				<a href="{{url($user->image)}}" data-lightbox="example-set"class="image avatar center"><img src="{{url($user->image)}}"  class='user-image' style="background:wihte; max-height: 150px"/>

				</a>
				<h2 style="color:#f7e1cc">{{$user->name}}</h2>

				<h5>You are Strong without any persone</h5>

        <button type="button" class="btn btn-primary">{{count($user->posts)}} Posts</button>
        <button type="button" class="btn btn-secondary">{{$user->view}} Views</button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#follower">{{count($user->user_follower)}} Follower</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#following">{{count($user->user_following)}} Following</button>
                  
            	@auth
            	 @if($user->id !== auth()->user()->id && $user->user_follower->where('user_id', auth()->user()->id)->first())
            	 <button class="btn btn-primary">
            	  <a href="{{route('follow')}}" class='btn-follow' post_user="{{$user->id}}" style="color:white">
                <i class="fa fa-check"></i> Follow </a></button>
            
                @else
                 <button class="btn btn-dark ">
                  <a href="{{route('follow')}}" class='btn-follow' post_user="{{$user->id}}" style="color:white">
              	 <i class="fa fa-plus"></i> Follow </a></button>
              	@endif 
              	@endauth
              
               
          	


			</div>
		 <div id="page-content" class="index-page col-sm-12 col-lg-6">
		  @if(auth()->check() && auth()->user()->id == $user->id)
    <div class="card" >
       <div class="card-header" style="color:black; padding: 5px">
          Write Post
        <input class="form-control card-body " data-target="#addPost" data-toggle="modal" type="search" placeholder="What you need to Say.." aria-label="AddPost" style="height: 80px;">
    </div>
    <div class="card-body"></div>
     
    </div>
      @endif
      	

		    @include('posts.show')
      	
	</div>
  @include('layouts.form') 
  @include('user.follower') 
   @include('user.following') 
@endsection
