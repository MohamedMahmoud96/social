
  <div class="modal fade" id="follower" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Followers</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
        </div>

        <div class="modal-body">
          <ul>

          @foreach($user->user_follower as $i=>$follower)
          <li class='card'>
          <a href="{{url('profile/show/'. $follower->user_following->id)}}" style="margin:10px;" >
            <img src="{{url($follower->user_following->image)}}" class='rounded-circle user-image' style="max-height: 50px; ">
            <h6 class='user-name' style="display:inline;">{{$follower->user_following->name}}</h6>
          
          
            
          @auth
            @if($user->id == auth()->user()->id)
              @if($user->user_following->where('follower',$follower->user_id)->first())
                <a href="{{route('follow')}}" class='btn-follow' post_user="{{$follower->user_id}}" style="color:black;position: absolute; right: 20px; top: 20px;">
                <i class="fa fa-check"></i> </a>
                @else
                  <a href="{{route('follow')}}" class='btn-follow' post_user="{{$follower->user_id}}" style="color:black;position: absolute; right: 20px; top: 20px;">
                 <i class="fa fa-plus"></i></a>
                @endif 
             @endif    
          @endauth
          </a>
          </li>
          @endforeach
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger modal-submit" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>




<!--
  <button class="btn btn-danger pull-right open-popu" type='button' data-modal-target='#addCategory' data-toggle="modal" data-target="">Add New Category</button> -->