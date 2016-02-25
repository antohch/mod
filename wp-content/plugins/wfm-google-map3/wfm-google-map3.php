<?php
/*
Plugin Name: google 3
Description: Краткое описание плагина. Динамически изменяются координаты, через шорт код. Пример шорткода: [map cords1="47.235073" cords2="39.596175" zoom="10"]
Version: 1.0
Author: Тоха
Author URI: http://страница_автора_плагина
*/
add_shortcode('map', 'wfm_map_2');
$wfm_maps_array = array();
//получить значения шорткода
function wfm_map_2($atts){
	global $wfm_maps_array;
	$atts = shortcode_atts(
		array(
			'cords1' => 50.422310,
			'cords2' => 30.329132,
			'zoom' => 8
		), $atts
	);
	extract($atts);
	$wfm_maps_array = array(
		'zoom' => $zoom,
		'cords1' => $cords1,
		'cords2' => $cords2
	);
	add_action('wp_footer', 'wfm_styles_scripts');
	return '<div id="map"></div>';
}
//подключить скрипт с google картами
function wfm_styles_scripts(){
	global $wfm_maps_array;
	wp_register_script('wfm-maps-google', 'https://maps.googleapis.com/maps/api/js?callback=initMap' );
	wp_register_script('wfm-maps-2', plugins_url('wfm-maps2.js', __FILE__));
	wp_register_style('wfm-style', plugins_url('wfm-style.css', __FILE__));
	
	wp_enqueue_script('wfm-maps-google');
	wp_enqueue_script('wfm-maps-2');
	wp_enqueue_style('wfm-style');
	//передать массив из php в js скрипт
	wp_localize_script('wfm-maps-2', 'wfmObj', $wfm_maps_array);
	
}