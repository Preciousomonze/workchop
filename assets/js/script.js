/* 
 *	Author: Omonzejele Precious
 *	Script that has some elements that need to be in place
 *
*/


$(window).load(function() {
 
    $('.wow').addClass('animated');
	
	/**/
	(function(){
var measurer = $('<span>', {
   							style: "display:none;word-break:break-word;visibility:hidden;white-space:pre-wrap;"})
   .appendTo('body');
function initMeasurerFor(textarea){
  if(!textarea[0].originalOverflowY){
  	textarea[0].originalOverflowY = textarea.css("overflow-y");    
  }  
  var maxWidth = textarea.css("max-width");
  measurer.text(textarea.text())
      .css("max-width", maxWidth == "none" ? textarea.width() + "px" : maxWidth)
      .css('font',textarea.css('font'))
      .css('overflow-y', textarea.css('overflow-y'))
      .css("max-height", textarea.css("max-height"))
      .css("min-height", textarea.css("min-height"))
      .css("min-width", textarea.css("min-width"))
      .css("padding", textarea.css("padding"))
      .css("border", textarea.css("border"))
      .css("box-sizing", textarea.css("box-sizing"))
}
function updateTextAreaSize(textarea){
	textarea.height(measurer.height());
  var w = measurer.width();
  if(textarea[0].originalOverflowY == "auto"){
     	var mw = textarea.css("max-width");
      if(mw != "none"){
     		if(w == parseInt(mw)){
      		textarea.css("overflow-y", "auto");
     		} else {
         	textarea.css("overflow-y", "hidden");
     		}
      }
   }
   textarea.width(w + 2);
}
$('textarea.autofill').on({
    input: function(){      
      	var text = $(this).val();  
        if($(this).attr("preventEnter") == undefined){
      	   text = text.replace(/[\n]/g, "<br>&#8203;");
        }
      	measurer.html(text);                       
        updateTextAreaSize($(this));       
    },
    focus: function(){
     initMeasurerFor($(this));
    },
    keypress: function(e){
    	if(e.which == 13 && $(this).attr("preventEnter") != undefined){
      	e.preventDefault();
      }
    }
});
})();
/**/	
});	
  

var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true        // act on asynchronously loaded content (default is true)
  }
);
wow.init();
