//Deleting single image
$(".deleteImage").click(function(){
   
	var id = $(this).attr('id');
    var idOfpost =$('.id').val();

     $.ajax({
                type: 'post',
                url: '/deleteImage/'+ id,
                data: {
                    _token: token,
                   
                    id:id
                },
                success: function(result) {
                 var x = $('.x');
                 x.remove();
                 

                }
            });


   });

function Rate(organization_id) {

 
   var invocedRate = "#rateYo" + organization_id;

  $(invocedRate).rateYo({
    ratedFill: '#ff9933',
    fullStar: true
  });
    $(invocedRate).rateYo()
        .on("rateyo.set", function(e, data) {

                console.log(1);
         
            
            $.ajax({
                type: 'post',
                url: '/vote/'+ organization_id,
                data: {
                    _token: token,
                    vote: data.rating,
                    user_id:organization_id
                },
                success: function(result) {
                   var vote = $('#vote'+organization_id);
                   var thankyou = $('#thankyou'+organization_id);
                    vote.hide();     
                    thankyou.show();    
                console.log(result);
                            

                }
            });

        });
}

$(function() {

  $("#rateYo").rateYo({
   ratedFill: '#ff9933',
    fullStar: true
  });
    $("#rateYo").rateYo()
        .on("rateyo.set", function(e, data) {

            var user_id = $("#user_id").val();
         
            
            $.ajax({
                type: 'post',
                url: '/vote/'+ user_id,
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