
@extends('layouts.app')

@section('content')
 
   @error('name')
                
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                @enderror

 <div class='row'>
 
  @include('layouts.left-sidebar')
   <div id="page-content" class="index-page col-lg-6 col-sm-12">
      @if(auth()->user())
    <div class="card" >
       <div class="card-header" style="color:black; padding: 5px;">
          Write Post
          
        <input class="form-control card-body " data-target="#addPost" data-toggle="modal" type="search" placeholder="What you need to Say.." aria-label="AddPost" style="height: 80px;">
    </div>
    <div class="card-body"></div>
     
    </div>
      @endif
          <!-- These are our grid blocks -->
       @include('posts.show')

    </div>
 </div>
@include('layouts.form') 


@endsection
