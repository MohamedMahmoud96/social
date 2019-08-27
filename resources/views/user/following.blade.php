
  <div class="modal fade" id="following" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Following</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
        </div>

        <div class="modal-body">
          <ul>
          @foreach($user->user_following as $following)
          <li class='card'>
          <a href="{{url('profile/show/'. $following->user_follower->id)}}" 
            style="margin:10px; ">
            <img src="{{url($following->user_follower->image)}}" class='rounded-circle user-image' style="max-height: 50px; ">
            <h6 class='user-name' style="display:inline;">{{$following->user_follower->name}}</h6>
           @auth
              @if($user->id == auth()->user()->id) 
                <a href="{{route('follow')}}" class='btn-follow' post_user="{{$following->follower}}" style="color:black;position: absolute; right: 20px; top: 20px;">
                <i class="fa fa-check"></i> </a>
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