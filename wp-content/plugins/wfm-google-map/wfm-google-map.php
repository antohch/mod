<?php
/*
Plugin Name: google карты
Description: Краткое описание плагина.
Version: 1.0
Author: Тоха
Author URI: http://страница_автора_плагина
*/
add_shortcode('test', 'wfm_test');

function wfm_test($atr, $cont){
	/*$text = !empty($cont) ? $cont : 'Тестовые данные';
	$user = isset($atr["user"]) ? $atr['user'] : 'Name';*/
	$atr = shortcode_atts(array(
		'user' => 'Name', 
		'content' => !empty($cont) ? $cont : 'Тестовые данные'
	), $atr);// функция wordpress, получить атрибуты шоркода [test user="Toxa"]Ваши данные:[/test]
	return '<h3>'.$atr['content'].'</h3>Привет, '.$atr['user'];
}