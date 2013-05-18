function showCoords(c)
{
	jQuery('#x1').val(c.x);
	jQuery('#y1').val(c.y);
	jQuery('#x2').val(c.x2);
	jQuery('#y2').val(c.y2);
	jQuery('#w').val(c.w);
	jQuery('#h').val(c.h);
};
$(document).ready(function() {
	$('#cropeame').Jcrop({
		onChange: showCoords,
		onSelect: showCoords,
		aspectRatio: xcrop / ycrop		
	});	
});