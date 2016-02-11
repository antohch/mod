<?php
/*
Plugin Name: hooks
Description: работа с хуками
Version: 1.0
Author: Anon
Author URI: http://hz.com
*/
/*add_filter('the_title', 'wfm_title');

function wfm_title($my_title){
	if(is_admin()){
		return $my_title;//если мы в админке то с title мы ничего делать не будем
	}
	$my_title = mb_convert_case($my_title, MB_CASE_TITLE, "UTF-8");
	return $my_title;
}*/
//add_filter('the_title', 'ucwords');

/*add_filter("the_content", "wfm_content");//привязалить к хуку
function wfm_content($content){
	if(is_user_logged_in()) return $content;//проверка на вторизованность
	if(is_page()) return $content;//если эта страница, то вернем контент
	return '<div class="wfm-access"><a href="'.home_url().'/wp-login.php">авторизуйтесь для просмотра контента</a></div>';
}*/

//экшен
add_action('comment_post', 'wfm_comment_post');
function wfm_comment_post(){
	wp_mail(get_bloginfo("admin_email"),'Новый коммент на сайте', 'Создан новый комент');
}

