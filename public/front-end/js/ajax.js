
$('#upload-user-img').on('change',function(e){
   $("#form-upload-user-img").trigger('submit');
   /*
  btn= $(this);
  img = btn.prop('files');
  if(img[0].type)
  console.log(window.location.pathname);
  console.log(window.location.hostname);
  console.log(window.location.pathname.split('/',2));
  console.log(window.location.pathname.split('/'));
  $.ajax({
    url: window.location+'user/image',
    type:'post',
    data:img,
    success:function(data)
    {
      console.log(data);
    },

  });
*/
});


$(document).on('click','.delete-reply', function(e){
   btn = $(this);
    e.preventDefault();
    $.ajax({
      url: btn.attr('href'),
      type:'post',
      data:{_token:token},
      success:function(){
        btn.parents('.card-footer').remove();
      },
    });
});
 $(document).on('click', '.btn-follow', function(e){
     btn = $(this);
     e.preventDefault();
     var follower = btn.attr('post_user');
      var a = $('.user'+follower);

     i = a.children('i');
     if(i.attr('class') ==  'fa fa-plus')
     {
      type ='post'
       
     }else{
         type = 'delete'
     };
     $.ajax({
      url:btn.attr('href'),
      type:type,
      data:{follower:follower, _token:token},
      success:function(){
          if(type == 'post')
          {
            i.removeClass().addClass('fa fa-check');
          
          }else{
            i.removeClass().addClass('fa fa-plus');            
          }
      },
     });
   
});
/*
 $('.btn-follow').on('click', function(e){
     btn = $(this);
     e.preventDefault();
      form = btn.parents('#follow');
      data = new FormData(form[0]);
      url = form.attr('action');
     if( btn.children('i').attr('class') == 'fa fa-plus')
     {
        url= ;
     }else if(btn.children('i').attr('class') == 'fa fa-check')
     {
      url = ;
     }
     $.ajax({
      url: url,
      type: 'post',
      data: data,
      success: function(){
        if( type == 'post')
        {
         btn.children('i').removeClass().addClass('fa fa-check');
        }else if(type == 'delete')
        {
         btn.children('i').removeClass().addClass('fa fa-plus');
        }
        
      },
      cache: false,
      contentType:false,
      processData:false,
     });
    

   });
   */
  $(document).on('click','.btn-like', function(e){
     btn = $(this);
     e.preventDefault();
      var postId =  btn.attr('id');
      var name =   btn.attr('name');  
      var count = btn.siblings('.like_count');
      if(name == 'disLike'){type = 'delete';}else{type = 'post';}
     $.ajax({
      url: btn.attr('href'),
      type: type,
      data:{postId: postId, _token: token},
      beforeSend:function(){
      },
      success: function(){
        if(name == 'like')
        {
           btn.attr('name', 'disLike');
           btn.css('color', 'red');
           $newCount = parseInt(count.text()) + 1;
           count.text($newCount);
        }else if(name == 'disLike')
        {
          btn.attr('name', 'like');
          btn.removeAttr("style");
          $newCount = parseInt(count.text()) - 1;
           count.text($newCount);

        }
        
      },
      
     });
    

   });

  $(document).on('click', '.following_filter',function(){
     $.ajax({
      url: window.location,
      data:{following:'following'},
       success:function(html){
       $('#page-content .item').remove();
       $('#page-content').append(html);
        
      },

    });
  }); 
  $(document).on('change', '#select-category',function(){
  var catId = {'catId': $('#select-category option:selected').val()};
 
    $.ajax({
      url: window.location,
      data: catId,
      success:function(html){
       $('#page-content .item').remove();
       $('#page-content').append(html);
        
      },
    });
  });
    $('.btn-trash').on('click', function(e){
      var r=  confirm('Are You Sure Delete a Post?!');
      if(r == false){
        e.preventDefault();
      }
    });

    $(document).on('click','.btn-edit', function(e){
        e.preventDefault();
        btn = $(this);
        url = btn.attr('href');
        tar = btn.data('target');        
         $.ajax({
            url: url,
            beforeSend: function(){
                if($(tar).length > 0)
                {
                  $("#editPost").remove();
                  $(".modal-dialog").remove();
                }  
            },
            success: function(html)
            {  
              $('body').append(html); 
              $('#editPost').modal('show'); 
              //$('.form-modal-edit').reset();              
            },
         });
    });

    $(document).on('click','.modal-submit', function(e){
        e.preventDefault();
        btn = $(this);
        form = btn.parents('.form-modal');
        url = form.attr('action');       
        sendData = new FormData(form[0]);
        $.ajax({
            url:url,
            type:'post',
            data:sendData,
           beforeSend: function(){
            $('.name-error input').removeClass('is-invalid');
            $('.name-error strong').html('');
            $('.email-error input').removeClass('is-invalid');
            $('.email-error strong').html('');
            $('.password-error input').removeClass('is-invalid');
             $('.password-error strong').html('');
           },
            success:function(result)
            {
                 location.reload(true);
            },
            error: function(data,error)
            {
                if(error=='error')
                {
                   $.each(data.responseJSON.errors, function(k,v){
                    if(k == 'name'){
                        $('.name-error input').removeClass('is-invalid').addClass('is-invalid');
                        $('.name-error strong').html(v);
                    }else if(k == 'email'){
                        $('.email-error input').addClass('is-invalid');
                        $('.email-error strong').html(v);
                    }else if(k == 'password'){
                        $('.password-error input').addClass('is-invalid');
                        $('.password-error strong').html(v[0]);
                      }else if(k == 'post'){
                        $('.post-error textarea').addClass('is-invalid');
                        $('.post-error strong').html(v[0]);
                    }
                   });
                }
              
            },
            cache:false,
            processData: false,
            contentType:false,
               
        });
        
    });


    ///comments
      $(document).on('click','.submit-comment', function(e){
      e.preventDefault(e);
      btn = $(this);
      item =  btn.parents('.item').children('.bottom-item').children('.btn-comment');
      form = btn.parents('.comment-form');
      url = form.attr('action');
      comment_count =  btn.parents('.item').find('.comment_count');
      console.log(parseInt(item));
      sendData = new FormData(form[0]);
      $.ajax({
        url: url,
        type:'post',
        data:sendData,
        beforeSend:function()
        {
        },
        success: function(html){
           form.trigger("reset");
         $('.main-comments').prepend(html);
          newCount = parseInt(comment_count.text()) +1;
           comment_count.text(newCount + ' Comments');
        },
           cache:false,
          processData: false,
          contentType:false,     
      });

    });

  $(document).on('click','.delete-comment', function(e){
   btn = $(this);
    e.preventDefault();
    comment_count =  btn.parents('.item').find('.comment_count');
    $.ajax({
      url: btn.attr('href'),
      type:'post',
      data:{_token:token},
      success:function(){
        btn.parents('.comment-container').remove();
           newCount = parseInt(comment_count.text()) -1;
           comment_count.text(newCount + ' Comments');
      },
});
  });
   
    $( document).on('click', '.submit-reply ',function(e){
      e.preventDefault(e);
      btn = $(this);

      form = btn.parents('.reply-form');
      url = form.attr('action');
      sendData = new FormData(form[0]);
      $.ajax({
        url: url,
        type:'post',
        data:sendData,
        beforeSend:function()
        {
        },
        success: function(html){
        form.trigger("reset");
       $('.main-reply').prepend(html);
         btn.click();
        },
           cache:false,
          processData: false,
          contentType:false,     
      });

    });

    $(document).on('click', '.comment-profile', function(e){
       e.preventDefault();
       id = $(this).attr('id');
       if($('.comment-profile-'+id).attr("style"))
       {
        $('.comment-profile-'+id).removeAttr("style");
      }else{
        $('.comment-profile-'+id).css("display","none");
      }
      

    });

     $(document).on('click','.comment-home', function(e){
     e.preventDefault();

     id = $(this).attr('id');
     if($('.home-comment-'+id).attr("style"))
     {
      $('.home-comment-'+id).removeAttr("style");
    }else{
      $('.home-comment-'+id).css("display","none");
    }
     });

    
$(document).on('click','.comment-reply',function(e){
  e.preventDefault();
  id = $(this).attr('id');
  if($('.reply-'+id).attr("style")){
       $('.reply-'+id).removeAttr("style");
    }else{
      $('.reply-'+id).css("display","none");
    }

});

$(document).on('click','.profile-comment-reply',function(e){
  e.preventDefault();
  id = $(this).attr('id');
  if($('.'+id).attr("style")){
       $('.'+id).removeAttr("style");
    }else{
      $('.'+id).css("display","none");
    }

});
$(document).on('click', '.close-image' ,function(e){
   btn = $(this);
  btn.siblings('.edit-post-image').remove();
  btn.remove();
  

});
     
    

      