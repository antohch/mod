<?php
/*
Plugin Name: Количесто просмотров статей
Description: Выводит количество просмотров статей
Version: Номер версии плагина, например: 1.0
Author: Тоха
*/
register_activation_hook(__FILE__, 'wfm_create_filed');

function wfm_create_filed(){
	global $wpdb;
	$query = "ALTER TABLE $wpdb->posts ADD wfm_views INT NOT NULL DEFAULT '0'";
	$wpdb->query($query);
}

