
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