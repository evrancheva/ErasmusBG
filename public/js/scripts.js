/**
 * Created by user-pc on 9.11.2016 г..
 */
$(document).ready(function() {

    $("#owl-demo").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],

        navigation: true,
        navigationText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
        pagination: false

    });

});
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/bg_BG/sdk.js#xfbml=1&appId=276280935874920&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(document).ready(function() {

    $("#owl-demo3").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 10,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],

        navigation: true,
        navigationText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
        pagination: false

    });

});
$(document).ready(function() {

    $("#owl").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],

        navigation: true,
        navigationText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
        pagination: false

    });

});

function ChangePicture(bigPictureSrc){
    $('.main_image_trip').attr('src',bigPictureSrc);
}