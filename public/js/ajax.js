//Deleting single image
$(".deleteImage").click(function(){
   
	var id = $(this).attr('id');
  var idOfpost =$('.id');
    

    $.ajax({
     type:'post',
      		url:'/deleteImage/'+id,
       		data: {
       		_token:token,
       		id:id
       },
     success: function(result){ // What to do if we succeed
        console.log(result);
         var image=document.getElementById('image'+id+'');
         image.remove();
         var x = document.getElementById(''+id+'');
         x.remove();
         
    }
    });
   });
//delete PDF//Admin part
