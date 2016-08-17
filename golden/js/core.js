jQuery(function() {
	
	jQuery('.print').click(function() {
		var container = jQuery(this).attr('rel');
		jQuery('#' + container).printArea();
		window.print();
		return false;
	});
	
});