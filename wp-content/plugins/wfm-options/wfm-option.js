jQuery(document).ready(function($){
	if(wfmObj.wfm_theme_options_body){
		$('body').css('background', wfmObj.wfm_theme_options_body);
	}	
	if(wfmObj.wfm_theme_options_header){
		$('#mashead').css('background', wfmObj.wfm_theme_options_header);
	}
});