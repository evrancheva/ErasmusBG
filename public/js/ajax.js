//Deleting single image
$(".deleteImage").click(function(){
   
	var id = $(this).attr('id');
  var idOfpost =$('.id');
    


   });
//delete PDF//Admin part
$(function() {
  $("#rateYo").rateYo({
  
    fullStar: true
  });
    $("#rateYo").rateYo()
        .on("rateyo.set", function(e, data) {

            var user_id = $("#user_id").val();
            console.log(user_id);
            console.log("The rating is set to " + data.rating + "!");
            $.ajax({
                type: 'post',
                url: '/vote/',
                data: {
                    _token: token,
                    vote: data.rating,
                    user_id:user_id
                },
                success: function(result) {
                   var vote = $('#vote');
                    var message = $('#thankyou');
                    message.show();
                    vote.hide();
                   

                }
            });

        });
});