  

    @foreach($posts as $post)    
          <div class="item col-sm-12">
            <div class="content-item">
            	<div class='item-header'>
              <a href="{{url('profile/show/'. $post->user->id)}}" class='col-sm-3 user-link'>
             <img src="{{url($post->user->image)}}" class='rounded-circle user-image'  style="max-height: 60px">
              <h6 class='user-name'>{{$post->user->name}}</h6>
                  </a>
                 
              @if(auth()->check() && auth()->user()->id != $post->user_id && empty($user->id))
              <!--
              <form action='follow' method='post' id='follow' class='pull-right' style="position: absolute; right: 70px; top: 15px ">
              	@csrf
              	<input type="hidden" value='{{auth()->user()->id}}' name="user_id">
              	<input type="hidden" value='{{$post->user_id}}' name="follower">
              	<button name="" type="submit" class="btn-follow btn">
                </button>
                 </form>
              -->
                @if($post->user->user_follower->where('user_id', auth()->user()->id)->first())
                 <a href="{{route('follow')}}" class='btn-follow user{{$post->user_id}}' post_user="{{$post->user_id}}" style="position: absolute; right: 70px; top: 15px "><i class="fa fa-check"></i></a>
                @else
              		  <a href="{{route('follow')}}" class='btn-follow user{{$post->user_id}}'
                    post_user="{{$post->user_id}}" style="position: absolute; right: 70px; top: 15px "><i class="fa fa-plus"></i></a>
              	@endif 
        
              @endif
              </div>
              <div class="time "> 
                <span> <b>Posted:</b> {{$post->created_at->diffForHumans()}} </span>
                <span style="padding-left:30px;"><b> Category </b>:@isset($post->category) {{$post->category->name}} @endisset</span>
              </div>

              @if($post->image != null)
              <div class='center'>
               <a href="{{url($post->image)}}" class='' data-lightbox="example-set" data-title="">
              <img class="post-image example-image " src="{{url($post->image)}}" alt="" style="max-height: 400px; width: 80%"/>
            </a>
            </div>
            @endif
            <br>
              <p dir="auto">{{$post->post}}</p>
              
            </div>
            <div class="bottom-item">
              <!--<a href="#" class="btn btn-share share"><i class="fa fa-share-alt"></i> Share</a>-->
              @auth()
              <i class='like_count'> {{count($post->like)}}</i>
              @isset($post->like->first()->user_id)
                @if($post->like->first()->user_id == auth()->user()->id)
                  <a href="{{route('post-like')}}" class="btn btn-like"  id='{{$post->id}}' name='disLike'  style="color: red">
                  <i class="far fa-heart"></i>
                </a> 
                @elseif($post->like->first()->user_id !== auth()->user()->id)
                  <a href="{{route('post-like')}}" class="btn btn-like"  id='{{$post->id}}' name='like'>
                  <i class="far fa-heart"></i>
                </a> 
                @endif
              @else
                <a href="{{route('post-like')}}" class="btn btn-like"  id='{{$post->id}}' name='like'>
                <i class="far fa-heart"></i>
              </a>
              @endisset

            
          
             

              

         
             
              @endauth
              <button class="btn btn-comment comment-home" id='post-{{$post->id}}'><i class="far fa-comment"></i>
              </button>

              @if(auth()->check() && auth()->user()->id == $post->user_id)        
              <div class='pull-right offset-sm-8' style="display: inline;">
             <a href="{{route('post-edit', ['id' =>$post->id])}}"  data-target="#editPost" data-toggle="modal" class="btn btn-edit padding-right" ><i class="fa fa-edit"></i></a>
            <form action="{{route('post-delete', ['id'=> $post->id])}}" method='post'  style="display: inline;">
              @csrf
             @method('delete')
             <button type='submit' class="btn btn-trash "><i class="fa fa-trash "></i> </button>
             </form>
             </div> 
            @endif
            </div>

            <!--Comments-->
      <div class="row  home-comment-post-{{$post->id}}" style="display: none">
        <div class="parent-comments col-md-8">
           <div class="card-heading"><h5 class='comment_count'>{{count($post->post_comments)}} Comments</h5></div>
          <hr>
          @if(auth()->check())

            <div class='row'>

              <div class='col-sm-12'>    
                <a href="{{url('profile/show/'. $post->user->id)}}" class=''>
                <img src="{{url(auth()->user()->image)}}" class=''  style="max-height: 40px;width: 40px; margin-top: -65px ">
              
                  </a>
            
                <form class='comment-form' class='' action="{{route('comment/store')}}" style="display: inline">
                  @csrf
                  @method('post')
                  <input type="hidden" name="commment_post" value='{{$post->id}}'>
                  <textarea class='form-control col-sm-10' name='comment' style="display: inline"></textarea> 
                 <input type="submit"  class='btn btn-primary submit-comment offset-sm-9' name="Post">
                </form>
                <!--
                      var form = '<form method="post" action="/replies"><input type="hidden" name="_token" value="'+token+'">
            <input type="hidden" name="comment_id" value="'+ cid +'">
            <input type="hidden" name="name" value="'+name+'"><div class="form-group">
            <textarea class="form-control" name="reply" placeholder="Enter your reply" > </textarea> 
            </div> <div class="form-group">
             <input class="btn btn-primary" type="submit"> 
             </div></form>';
               -->
            </div>
          </div>
          @endif
              <div class='main-comments'>
          @foreach($post->post_comments as $comment)
             
                <div class="card comment-container" >
                        <div class="card-header">
                          <a href="{{url('profile/show/'. $comment->user->id)}}">
                             <img src="{{url($comment->user->image)}}" class='rounded-circle user-image' style=" max-height: 50px">
                            <i><b>{{$comment->user->name}}</b></i></a>&nbsp;&nbsp;
                            <span>{{$comment->comment}}</span>
                          
                        
                            <div style="margin-left:10px;">
                                @auth
                                  <hr>
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
                              <div class='main-reply'>
                                 @foreach($comment->reply as $reply)
                                 <br>
                                <div class="card-footer">
                                  <a href="{{url('profile/show/'. $reply->user->id)}}">
                                  <img src="{{url($reply->user->image)}}" class='rounded-circle user-image' style=" max-height: 50px">
                                  
                                    <i><b>{{$reply->user->name}}</b></i>&nbsp;&nbsp;
                                    </a>
                                    <span>{{$reply->reply}} </span>
                                    @auth
                                    <div style="margin-left:10px;">
                                      
                                       <hr>
                                        @if($reply->user->id == auth()->user()->id)
                                        <a href="{{route('reply/delete', ['id'=>$reply->id])}}" class="delete-reply">Delete</a>
                                        @endif
                                    </div>
                                    @endauth
                                    </div>
                                  
                                  @endforeach
                                  </div>
                             </div>
                        </div>
                    </div>
                    @endforeach
                   </div>
            </div>
        </div>
          </div>
      @endforeach

    
      <script>
         var token = '{{csrf_token()}}';
      </script>
  