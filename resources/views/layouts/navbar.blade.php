</br>



<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary ">
  <a class="navbar-brand" href="{{route('/')}}">Social Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   @auth()
 <input class="form-control  nav-link card-body col-sm-4 " display='none' data-target="#addPost" data-toggle="modal" type="" placeholder="What you need to Say.." aria-label="AddPost" style="margin:auto; display:none;">
 @endauth
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      

      <li class="nav-item active">
        <a class="nav-link" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      @auth()

      <li class="nav-item active">
        <a class="nav-link" href="{{route('profile/show',  ['id' =>auth()->user()->id])}}" style="padding: 0px">
           <img src="{{asset(auth()->user()->image)}}" class='nav-link rounded-circle user-image' style="    max-height: 50px">
          {{auth()->user()->name}}</a>
      </li>
      
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>
        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown"> 
          
           <a href='{{url("profile/show/". auth()->user()->id)}}' class="dropdown-item"  name='profile'><i class='fa fa-user'></i> Profile</a>
            <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="#"><i class='fa fa-cog'></i> Setting</a>
           <div class="dropdown-divider"></div>
         <form class='dropdown-item' id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf

            <button type='submit'class=" dropdown-item " name='logout' style="padding: 0px"><i class="fas fa-sign-out-alt"></i>Logout</button>
          </form>
        </div>
      </li>
    @endauth
    
       @guest
     
      
    
       <button class="btn  btn-outline-light btn-lg pull-right" type='button' data-toggle="modal" data-target="#login" name='login'>Login</button>
     
       <button class="btn btn-outline-light btn-lg " type='button' data-modal-target='' data-toggle="modal" data-target="#register" name='register'>registerr</button>
     
       @endguest
       
    </ul>
    <!--
       <div id="search-wrapper">
        <form action="#">
            <input type="text" id="search" placeholder="Search something...">
            <div id="close-icon"></div>
            <input class="d-none" type="submit" value="">
        </form>
    </div>-->
  </div>
</nav>

</br>
</br>