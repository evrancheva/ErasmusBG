//Deleting single image
$(".deleteImage").click(function(){
   
	var id = $(this).attr('id');
  var idOfpost =$('.id');
    

    $.ajax({
     method:'POST',
      		url:'./deleteImage/'+id,
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
         window.location.replace('/posts/' + idOfpost + '/edit'); 
    }
    });
   });
//delete PDF
$(".deletePdf").click(function(){
   	var id = $(this).attr('id');
    var idOfpost =$('.id');

    $.ajax({
     method:'POST',
      		url:'./deletePdf/' +id,
       		data: {
       		_token:token,
       		id:id,
       		  data: $(this).serialize(),
       },
     success: function(){ // What to do if we succeed
         var pdf=document.getElementById('pdf'+id+'');
         pdf.remove();
        window.location.replace('/posts/' + idOfpost + '/edit'); 
    }
    });
    
   });
//Admin part
//Deleting single image
$(".deletePostImage").click(function(){
   
  var id = $(this).attr('id');
  var idOfpost =$('.id');
    
 console.log(idOfpost);
    $.ajax({
     method:'POST',
          url:'./deletePostImage/'+id,
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
       
    });
   });
//delete PDF
$(".deletePostPdf").click(function(){
    var id = $(this).attr('id');
    var idOfpost =$('.id');
   
    $.ajax({
     method:'POST',
          url:'./deletePostPdf/' +id,
          data: {
          _token:token,
          id:id,
            data: $(this).serialize(),
       },
     success: function(){ // What to do if we succeed
         var pdf=document.getElementById('pdf'+id+'');
         pdf.remove();
      
    }
    });
    
   });