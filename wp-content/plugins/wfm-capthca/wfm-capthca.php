<?php
/*
Plugin Name: Капча
Description: капча
Version: 1.0
Author: Тоха
*/

add_filter('comment_form_default_fields', 'wfm_captcha');
add_filter('preprocess_comment', 'wfm_check_captcha');
//add_filter('comment_form_field_comment', 'wfm_captcha2');

function wfm_captcha($fields){
	unset($fields['url']);
	$fields['captcha'] = '<p>
	<label for="captcha">Капча<span class="required">*</span></label>
	<input type="checkbox" name="captcha" id="captcha">
	</p>';
	return $fields;
}

function wfm_check_captcha($commentdata){
	if(is_user_logged_in()){
		return $commentdata;
	}else{
		if(!isset($_POST['captcha'])){
			 wp_die('<b>Ошибка</b>: вы не прошли проверку на человечность'); 
		}
	}


}

function wfm_captcha2($comment_field){
	if(is_user_logged_in()){
		return $comment_field;
	}
	$comment_field .= '<p>
	<label for="captcha">Капча<span class="required">*</span></label>
	<input type="checkbox" name="captcha" id="captcha">
	</p>';
	return $comment_field;
}