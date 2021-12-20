
$('.like').on('click',function(){

   var Like_s=$(this).attr('data-like');
   var post_id=$(this).attr('data-post-id');

   post_id=post_id.slice(0,-2);

   //console.log('OK1');

    //alert(post_id);

  $.ajax({
    
      type:'POST',
      url:url,
      data:{Like_s:Like_s,post_id:post_id,_token:token},

      success:function(data){

        // alert(data.is_like);
        if(data.is_like==1){
          $('*[data-post-id="'+ post_id +'-l"]').removeClass('normal').addClass('like_status');
          $('*[data-post-id="'+ post_id +'-d"]').removeClass('dislike_status').addClass('normal');
          var cu_like=$('*[data-post-id="'+ post_id +'-l"]').find('.like_count').text();
          var new_like=parseInt(cu_like)+1;
          var cu_like=$('*[data-post-id="'+ post_id +'-l"]').find('.like_count').text(new_like);

          if(data.change_like==1){
            var cu_dislike=$('*[data-post-id="'+ post_id +'-d"]').find('.dislike_count').text();
          var new_dislike=parseInt(cu_dislike)-1;
          var cu_dislike=$('*[data-post-id="'+ post_id +'-d"]').find('.dislike_count').text(new_dislike);
          }


        }
        if(data.is_like==0){
          $('*[data-post-id="'+ post_id +'-l"]').removeClass('like_status').addClass('normal');

          var cu_like=$('*[data-post-id="'+ post_id +'-l"]').find('.like_count').text();
          var new_like=parseInt(cu_like)-1;
          var cu_like=$('*[data-post-id="'+ post_id +'-l"]').find('.like_count').text(new_like);

        }
        //('hello');
      }
  });
});



$('.dislike').on('click',function(){

  var Like_s=$(this).attr('data-like');
  var post_id=$(this).attr('data-post-id');

  post_id=post_id.slice(0,-2);

  //console.log('OK1');

   //alert(post_id);

 $.ajax({
   
     type:'POST',
     url:url_dis,
     data:{Like_s:Like_s,post_id:post_id,_token:token},

     success:function(data){

       // alert(data.is_like);
       if(data.is_dislike==1){
         $('*[data-post-id="'+ post_id +'-d"]').removeClass('normal').addClass('dislike_status');
         $('*[data-post-id="'+ post_id +'-l"]').removeClass('like_status').addClass('normal');
         var cu_dislike=$('*[data-post-id="'+ post_id +'-d"]').find('.dislike_count').text();
          var new_dislike=parseInt(cu_dislike)+1;
          var cu_dislike=$('*[data-post-id="'+ post_id +'-d"]').find('.dislike_count').text(new_dislike);


          if(data.change_dislike==1){
             var cu_like=$('*[data-post-id="'+ post_id +'-l"]').find('.like_count').text();
              var new_like=parseInt(cu_like)-1;
              var cu_like=$('*[data-post-id="'+ post_id +'-l"]').find('.like_count').text(new_like);
          }

       }
       if(data.is_dislike==0){
         $('*[data-post-id="'+ post_id +'-d"]').removeClass('dislike_status').addClass('normal');

         var cu_dislike=$('*[data-post-id="'+ post_id +'-d"]').find('.dislike_count').text();
          var new_dislike=parseInt(cu_dislike)-1;
          var cu_dislike=$('*[data-post-id="'+ post_id +'-d"]').find('.dislike_count').text(new_dislike);
       }
       //('hello');
     }
 });
});