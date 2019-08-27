<br>
<div class="card-footer">
  <a href="{{url('profile/show/'. $reply->user->id)}}">
  <img src="{{url($reply->user->image)}}" class='rounded-circle user-image' style=" max-height: 50px">
  
    <i><b>{{auth()->user()->name}}</b></i>&nbsp;&nbsp;
    </a>
    <span>{{$reply->reply}} </span>
    <hr>
    @auth
    <div style="margin-left:10px;">
    @if($reply->user->id == auth()->user()->id)
    <a href="{{route('reply/delete', ['id'=>$reply->id])}}" class="delete-reply">Delete</a>
    @endif
    </div>
    @endauth
    </div>
