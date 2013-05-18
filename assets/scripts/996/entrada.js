$(document).ready(function() {
	$('.iosSliderEntrada').iosSlider({
		desktopClickDrag: true,
		snapToChildren: true,
		snapSlideCenter: true,
		infiniteSlider: true,
		responsiveSlides: true,
		autoSlide: true,
		navPrevSelector: $('#prevSlide'),
		navNextSelector: $('#nextSlide')
	});		
	$(".various").fancybox({
		autoScale	: true,
		autoDimensions: true,
		fitToView	: true,	
		afterLoad: function() {	
			setInterval(function(){$.fancybox.update();},1000);
		}	
	});	
	$("img.lazy").lazyload(({threshold : 200, effect : "fadeIn"}));		
});