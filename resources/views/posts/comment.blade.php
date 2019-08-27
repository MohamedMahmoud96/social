       <div class="card comment-container" >
      <div class="card-header">
        <a href="{{url('profile/show/'. auth()->user()->id)}}">
           <img src="{{url(auth()->user()->image)}}" class='rounded-circle user-image' style=" max-height: 50px">
          <i><b>{{auth()->user()->name}}</b></i></a>&nbsp;&nbsp;
          <span>{{$comment->comment}}</span>
          <hr>
          <div style="margin-left:10px;">
              @auth
              <a class="comment-reply" id='comment-{{$comment->id}}' style="cursor: pointer;">Reply</a>&nbsp;    
                 @if($comment->user->id == auth()->user()->id)
                   <a href="{{route('comment/delete', ['id'=>$comment->id])}}" class="delete-comment" style="cursor: pointer;">Delete</a>
                @endif
              <br>
              <div class="reply-comment-{{$comment->id}}" style="display: none">
                <form method="post" action="{{route('reply/store')}}" class='reply-form'>
                  <br>
                  @csrf
                  <input type="hidden" name="comment_id" value="{{$comment->id}}">
                  <textarea class="form-control col-sm-10" name="reply" placeholder="Enter your reply" > </textarea> 
                     <input type="submit"  class='btn btn-primary submit-reply offset-sm-8' name="reply">
                 </form>
             </div>
              @endauth
      </div>
    </div>
  </div>