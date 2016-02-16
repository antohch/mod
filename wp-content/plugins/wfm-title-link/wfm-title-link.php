<?php
/*
Plugin Name: Хлебные крошки в title
Description: Хлебные крошки в title
Version: 1.0
Author: Тоха
*/
add_filter('wp_title', 'wfm_title', 20);

function wfm_title($title){
	$title = null;
	$sep = ' - ';
	$site = get_bloginfo('name');
	//главная страница
	if(is_home() || is_front_page()){
		$title = array($site);
	}
	//постоянная страница
	elseif(is_page()){
		$title = array(get_the_title(), $site);
	}
	//метка
	elseif(is_tag()){
		$title = array(single_tag_title('Метка: ', false), $site);
	}
	elseif(is_search()){
		$title = array('Результаты поиска по запросу:'. get_search_query());
	}
	//архив
	elseif(is_archive()){
		$title = array('Архив за:' . get_the_time("F Y"), $site);
	}
	$title = implode($sep, $title);
	return $title;
}