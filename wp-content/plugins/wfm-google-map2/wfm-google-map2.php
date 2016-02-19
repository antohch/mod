<?php
/*
Plugin Name: google 2
Description: Краткое описание плагина.
Version: 1.0
Author: Тоха
Author URI: http://страница_автора_плагина
*/
add_filter('the_content', 'wfm_maps_2');
add_action('wp_enqueue_scripts', 'wfm_styles_scripts');

function wfm_maps_2($content){
	return $content.'<div id="map" style="width:650; height:400px"></div>';
}

function wfm_styles_scripts(){
	wp_register_script('wfm-maps-google', 'https://maps.googleapis.com/maps/api/js?callback=initMap' );
	wp_register_script('wfm-maps-2', plugins_url('wfm-maps2.js', __FILE__));
	
	wp_enqueue_script('wfm-maps-google');
	wp_enqueue_script('wfm-maps-2');
}