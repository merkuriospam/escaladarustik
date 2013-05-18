$(document).ready(function() {
	/*$(window).resize(function(){
		$('.logo').css({
			position:'absolute',
			left: ($(window).width() - $('.logo').outerWidth())/2,
			top: ($(window).height() - $('.logo').outerHeight())/2
		});
	});
	$(window).resize();*/
		
    /*$('ul.sf-menu').superfish({ 
	    hoverClass:    'sfHover',          // the class applied to hovered list items 
	    pathClass:     'overideThisToUse', // the class you have applied to list items that lead to the current page 
	    pathLevels:    1,                  // the number of levels of submenus that remain open or are restored using pathClass 
	    delay:         700,                // the delay in milliseconds that the mouse can remain outside a submenu without it closing 
	    animation:     {opacity:'show'},   // an object equivalent to first parameter of jQuery’s .animate() method 
	    speed:         'normal',           // speed of the animation. Equivalent to second parameter of jQuery’s .animate() method 
	    autoArrows:    true,               // if true, arrow mark-up generated automatically = cleaner source code at expense of initialisation performance 
	    dropShadows:   true,               // completely disable drop shadows by setting this to false 
	    disableHI:     false,              // set to true to disable hoverIntent detection 
	    onInit:        function(){},       // callback function fires once Superfish is initialised – 'this' is the containing ul 
	    onBeforeShow:  function(){},       // callback function fires just before reveal animation begins – 'this' is the ul about to open 
	    onShow:        function(){},       // callback function fires once reveal animation completed – 'this' is the opened ul 
	    onHide:        function(){}        // callback function fires after a sub-menu has closed – 'this' is the ul that just closed 
    });*/
 
	$(".rslides").responsiveSlides({
	  auto: true,             // Boolean: Animate automatically, true or false
	  speed: 1000,            // Integer: Speed of the transition, in milliseconds
	  timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
	  pager: false,           // Boolean: Show pager, true or false
	  nav: true,             // Boolean: Show navigation, true or false
	  random: false,          // Boolean: Randomize the order of the slides, true or false
	  pause: false,           // Boolean: Pause on hover, true or false
	  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
	  prevText: "Previous",   // String: Text for the "previous" button
	  nextText: "Next",       // String: Text for the "next" button
	  maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
	  controls: "",           // Selector: Where controls should be appended to, default is after the 'ul'
	  namespace: "centered-btns",   // String: change the default namespace used
	  before: function(){},   // Function: Before callback
	  after: function(){}     // Function: After callback
	});   
	//$.backstretch("assets/images/ice-climbing.jpg");
}); 