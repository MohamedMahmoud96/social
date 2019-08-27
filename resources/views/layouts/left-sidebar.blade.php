<div class='col-sm-12 col-lg-4 left-sidebar'>
  <div class="card card-filter">
    <div class="card-header"><h3>Filter!</h3></div>
    <div class="card-body">
      <div>
         <label for='select-category'><h5>Categories:</h5></label>
     <select id='select-category'> 
      <option value=''><h1>All</h1></option>
    @foreach($categories as $category)
    <a href="#">
        <option value='{{$category->id}}'>{{$category->name}}</option>
    </a>
    @endforeach
      </select>
      </div>
        <label for='select-category'><h5>Following:</h5></label>
        <button class='following_filter btn btn-danger btn-lg offset-sm-1'><h6 class='center'>Following Only</h6></button>
    </div>

</div>
<div class="card">
  <h5 class="card-header">Popular Profile</h5>
  <div class="card-body">
    @foreach($PopularUsers as $user)
    
    <div>
      
            
    <a href="{{url('profile/show/'. $user->id)}}">
      <img src="{{url($user->image)}}" class='rounded-circle user-image' style="max-height: 50px">
      <h6 class='user-name'>{{$user->name}} </h6>
      
     </a>
        <span class='float-right'> <i class="fa fa-eye"></i> {{$user->view}} </span>

          </div>
    @endforeach
    </div> 
  </div>
  <!--
  @auth()
    <div class="card">  
    <h5 class="card-header">Followers</h5>
   <div class="card-body">
    @foreach($followers as $follower)
     <a href="{{url('profile/show/'. $follower->user_follower->id)}}">
      <img src="{{url($follower->user_follower->image)}}" class='rounded-circle user-image' style="max-height: 30px">
           <h6 class='user-name' >{{$follower->user_follower->name}}</h6>
      </a>
      <br>
  
    @endforeach
  </div>
  </div>
  @endauth
-->
</div>
