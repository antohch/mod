<?php
/*
Plugin Name: google карты
Description: Краткое описание плагина.
Version: 1.0
Author: Тоха
Author URI: http://страница_автора_плагина
*/
add_shortcode('map', 'wfm_map');

function wfm_map($atts, $content){
	$atts = shortcode_atts(
		array(
			'center' => 'Ейск, Краснодарский край',
			'width' => 600,
			'height' => 300,
			'zoom' => 13,
			'content' => !empty($content) ? "<h2>$content</h2>" : "<h2>Карта от google</h2>"
		), $atts
	);
	
	$atts['size'] = $atts['width'].'x'.$atts['height'];
	$atts['center'] = str_replace(' ', '+', $atts['center']);
	extract($atts);
	$map = $content;
	$map .= "<img src='http://maps.googleapis.com/maps/api/staticmap?center=".$center."&zoom=".$zoom."&size=".$size."&sensor=false' alt=''>";
	return $map;
}