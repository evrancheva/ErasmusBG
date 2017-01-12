//Deleting single image
$(".deleteImage").click(function(){
   e.preventDefault();
	var id = $(this).attr('id');
    

    $.ajax({
     method:'POST',
      		url:'./deleteImage',
       		data: {
       		_token:token,
       		id:id
       },
     success: function(){ // What to do if we succeed
         var image=document.getElementById('image'+id+'');
         image.remove();
         var x = document.getElementById(''+id+'');
         x.remove();

    }
    });
   });
//delete PDF
$(".deletePdf").click(function(){
   e.preventDefault();
	var id = $(this).attr('id');
    

    $.ajax({
     method:'POST',
      		url:'./deletePdf',
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