
var ident123 = true;
var expand_all = false;
$(document).ready(function(){ 
 
$('#b2').hover(function(){
$('#b21').stop(false, true).slideDown(500);
	},function(){
if(ident123 == true){
$('.img_box1').stop(false, true).animate({height: "hide"}, 500);}
}
)

$('#b4').hover(function(){
$('#b41').stop(false, true).slideDown(500);
	},function(){
if(ident123 == true){
$('.img_box1').stop(false, true).animate({height: "hide"}, 500);}
}
)

$('#b3').hover(function(){
$('#b31').stop(false, true).slideDown(500);
	},function(){
if(ident123 == true){
$('.img_box1').stop(false, true).animate({height: "hide"}, 500);}
}
)

$('.price_section').click(function(){
if($(this).next(".price").css("display") == "none"){
$('div.price').stop(false, true).animate({height: "hide"}, 500);
$('.price_section').css({background: "#FFFFFF", color: "#838383"});
$(this).css({background: "#009797", color: "#FFFFFF"});
$(this).next(".price").stop(false, true).animate({height: "show"}, 500);
exit;
	}if($(this).next(".price").css("display") == "block"){
$('div.price').stop(false, true).animate({height: "hide"}, 500);
$('.price_section').css({background: "#FFFFFF", color: "#838383"});
	}
})

$('#expand_all').click(function(){
if(expand_all == false){
$('#expand_all').html(' cвернуть все');
$('.price_section').css({background: "#009797", color: "#FFFFFF"});
$(".price").stop(false, true).animate({height: "show"}, 500);
expand_all = true;
	}else{
$('#expand_all').html('развернуть все');
$('.price_section').css({background: "#FFFFFF", color: "#838383"});
$(".price").stop(false, true).animate({height: "hide"}, 500);
expand_all = false;
	}
})

$('#upload_price').click(function() {

     location.href = $(this).attr('data-href');
})

})
