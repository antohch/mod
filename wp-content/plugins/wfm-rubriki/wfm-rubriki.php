<?php
/*
Plugin Name: Рубрики акардион
Description: Краткое описание плагина.
Version: 1.0
Author: Тоха
Author URI: http://страница_автора_плагина
*/

add_action('widgets_init', 'wfm_cats');

function wfm_cats(){
	register_widget('WFM_Cats');
}

class WFM_Cats extends WP_Widget{
	function __construct(){
		$arg = array(
			'name' => 'Рубрики Акардион',
			'description' => 'Выводит рубрики в виде акардиона',
		);
		parent::__construct('wfm_cats', '', $arg);
	}
	function widget($args, $instance){
		extract($args);
		extract($instance);
		
		$title = apply_filters('widget_title', $title);
		
		$cats = wp_list_categories(
			array(
				'title_li' => '',
				'echo' => false,
				//'exclude' => $exclude,
				//'' => '',
			)
		);
		
		$html = $before_widget;
		$html .= $before_title . $title . $after_title;
		$html .= '<ul class="accordion">';
		$html .= $cats;
		$html .= '</ul>';
		$html .= $after_widget;
		echo $html;
	}
}