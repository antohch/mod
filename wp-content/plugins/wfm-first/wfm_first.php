<?php 
/*
Plugin Name: First
Plugin URI: http://страница_с_описанием_плагина_и_его_обновлений
Description: Описание первого плагина
Version: 1.0
Author: Anon
Author URI: http://hz.com
*/
include dirname(__FILE__) . '/deactivate.php';

register_activation_hook(__FILE__, 'wfm_activate');//процедурный способ привязки к хуку
register_deactivation_hook(__FILE__, 'wfm_deactivate');//исполняется при деактивиции

function wfm_activate(){
	wp_mail(get_bloginfo("admin_email"),'Плагин активирован', 'Произошла успешная активация плагина');
}
/*
register_activation_hook(__FILE__, 'wfm_activate');

function wfm_activate(){
	if(version_compare(PHP_VERSION, '5.3.0', '<')){
		exit('Для работы плагина нужна больше 5.3.0');
	}
}


//способ класса
class WFMActivate{
	function __construct(){
		register_activation_hook(__FILE__, array($this, 'wfm_activate'));
	}
	function wfm_activate(){
		$date = date("Y-m-d H:i:s");
		error_log($date . " Плагин активирован \n", 3, dirname(__FILE__).'/wfm_errors_log.log');
	}
}

$wfm_activate = new WFMActivate;

//способ класса 2
class WFMActivate{
	static function wfm_activate(){
		$date = date("Y-m-d H:i:s");
		error_log($date . " Плагин активирован \n", 3, dirname(__FILE__).'/wfm_errors_log.log');
	
	}
}
register_activation_hook(__FILE__, array("WFMActivate",'wfm_activate'));
*/