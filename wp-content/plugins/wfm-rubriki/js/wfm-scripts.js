jQuery(document).ready(function($){
	$('ul.accordion').dcAccordion({
		eventType: wfm_obj.eventType,
		disableLink: false,
		hoverDelay: wfm_obj.hoverDelay,
		speed: wfm_obj.speed
	});
});