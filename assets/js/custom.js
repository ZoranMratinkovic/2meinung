!function(n){"use strict";var i={slide_fun:function(){n("#carousel-div").carousel({interval:4e3})},wow_fun:function(){(new WOW).init()},custom_fun:function(){}};n(document).ready(function(){i.slide_fun(),i.wow_fun(),i.custom_fun()})}(jQuery),$(window).load(function(){$(".flexslider").flexslider({animation:"slide",animationLoop:!1,itemWidth:200,itemMargin:15,pausePlay:!1,start:function(n){$("body").removeClass("loading")}})});
