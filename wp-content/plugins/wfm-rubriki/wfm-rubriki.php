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
		
		add_action('wp_footer', array($this, 'wfm_styles_scripts'));
		
		$title = apply_filters('widget_title', $title);
		/*add_filter('wp_list_categories', array($this, 'wfm_remove_title'));*/
		
		$cats = wp_list_categories(
			array(
				'title_li' => '',
				'echo' => false,
				//'exclude' => $exclude,
				//'' => '',
			)
		);
		
		$cats = preg_replace('#title="[^"]+"#', '', $cats);
		
		$html = $before_widget;
		$html .= $before_title . $title . $after_title;
		$html .= '<ul class="accordion">';
		$html .= $cats;
		$html .= '</ul>';
		$html .= $after_widget;
		echo $html;
	}
	function wfm_styles_scripts(){
		wp_register_script('wfm-cookie', plugins_url('js/jquery.cookie.js', __FILE__), array('jquery'));
		wp_register_script('wfm-hoverInten', plugins_url('js/jquery.hoverIntent.minified.js', __FILE__), array('wfm-cookie'));
		wp_register_script('wfm-accordion', plugins_url('js/jquery.accordion.js', __FILE__), array('wfm-hoverInten'));
		wp_register_script('wfm-scripts', plugins_url('js/wfm-scripts.js', __FILE__), array('wfm-accordion'));
		
		wp_enqueue_script('wfm-scripts');
	}
	/*function wfm_remove_title($atr){
		$str = preg_replace('#title="[^"]+"#', '', $atr);
		return $str;
	}*/
		
}