
var itemWraper = $('.category');


var itemWraper_OnHover = function(){
  $(this).children('.cover').show();


}

var itemWraper_OnHoverOut = function(){
   $(this).children('.cover').hide();
   
}
itemWraper.hover(itemWraper_OnHover,itemWraper_OnHoverOut);


var itemWraper2 = $('.category2');


var itemWraper_OnHover2 = function(){
  $(this).children('.cover2').show();
  

}

var itemWraper_OnHoverOut2 = function(){
   $(this).children('.cover2').hide();
   
}
itemWraper2.hover(itemWraper_OnHover2,itemWraper_OnHoverOut2);

var itemWraper3 = $('.layer');


var itemWraper_OnHover3 = function(){
  $(this).children('a').css('color','#ff9933');
  

}

var itemWraper_OnHoverOut3 = function(){
    $(this).children('a').css('color','black');
   
}
itemWraper3.hover(itemWraper_OnHover3,itemWraper_OnHoverOut3);

var itemWraper4 = $('.layer2');


var itemWraper_OnHover4 = function(){
  $(this).children('a').css('color','#ff9933');
  

}

var itemWraper_OnHoverOut4 = function(){
    $(this).children('a').css('color','black');
   
}
itemWraper4.hover(itemWraper_OnHover4,itemWraper_OnHoverOut4);