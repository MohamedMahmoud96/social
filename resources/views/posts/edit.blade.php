<div class="modal fade col-sm-12" id="editPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content ">
            <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Edit Post</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          </div>
     <br>
        <div id="page-content" class="post-edit">
             
        <div class="item col-sm-12">
            <form class='form-modal form-modal-edit' name='editPost' action="{{route('post-update', ['id' => $post->id])}}" method='post' enctype="multipart/form-data">
              
             {{csrf_field()}}

              <label for='edit-img' class='offset-sm-10' style="position: absolute; top:-20px ">
               <i  class="fas fa-image" style="font-size: 40px;"></i>
             </label>
             <input id='edit-img' type="file" name="image" style="display: none">
              @if($post->image != null) 
               <a class='edit-post-image' href="{{url($post->image)}}" data-lightbox="example-set" data-title="" class='col-sm- ml-md-auto'>
               <img class="post-image example-image" src="{{url($post->image)}}" alt="" style="max-height: 350px; width: 350px" />
               <input type="hidden" name="image_value" value="1">
              </a>
             <button type="button" class="close-image" aria-label="Close" style="position: absolute;">
              <span aria-hidden="true">&times;</span>
            </button>

             @endif
                 <div class='post-error'>
                    <br>
                     <textarea type='textarea' class='form-control' rows="8" cols="50" name='post' required autocomplete="name" autofocus>{{$post->post}}</textarea> 
                       <span class="invalid-feedback " role="alert">
                            <strong></strong>
                        </span>
                    </div> 
                    <label>Category</label>
              <select name='category'>
                <option value=''>..</option>
                 @foreach($categories as $category)
                <option value="{{$category->id}}"  {{ $post->category_id == $category->id ? 'selected' : 'no'}}>{{$category->name}}</option>
               
                @endforeach
              </select><br>
              <button type="submit" class="btn btn-info modal-submit">Submit</button>
              
            </form>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-danger modal-submit" data-dismiss="modal">Close</button>
        </div>

  </div>
 </div>
    </div>
  </div>
</div>
