
  <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add New Post</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
        </div>
        <div class="modal-body">
          
            <form class='form-modal' name='addPost' action="{{url('post/store')}}" method='post' enctype="multipart/form-data">
             {{csrf_field()}}
                 <div class='post-error'>
                   <label for='set-img' class='offset-sm-11'>
                <i class="fas fa-image" style="font-size: 40px;"></i>
             </label>
             <input id='set-img' type="file" name="image" style="display: none">
                    
                     <textarea dir="auto" class='form-control' type='textarea' rows="8" cols="60" name='post' placeholder="Typeing..." value="{{ old('name') }}" required autocomplete="name" autofocus></textarea> 
                         <span class="invalid-feedback" role="alert" style="font-size: 18px">
                            <strong></strong>
                        </span>
                    </div> 
                      <br>
                      <label>Category</label>
              <select name='category'>
                <option value=''>...</option>
                 @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select><br>
              <button type="submit" class="btn btn-info modal-submit">Submit</button>
                

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger modal-submit" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>




<!--
  <button class="btn btn-danger pull-right open-popu" type='button' data-modal-target='#addCategory' data-toggle="modal" data-target="">Add New Category</button> -->