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
	//категории
	elseif(is_category()){
		//id категории
		$cat_id = get_query_var('cat');
		//данные категории
		if($cat->parent){
			//если есть родительская категория
			$categories = rtrim(get_category_parents($cat_id, false, $sep), $sep);
			$categories = explode($sep, $categories);
			$categories[] = $site;
			$categories = array_reverse($categories);
			$title[] = $site;
		}else{
			//если это самостоятельная категория
			$title = array($cat->name, $site);
		}
	}
	// записи
	if(is_single()){
		//массив данных о категориях
		$category = get_the_category();
		//ID категории
		$cat_id = $category[0]->cat_ID;
		//родительские категории
		$categories = rtrim(get_category_parents($cat_id, false, $sep), $sep);
		$categories = explode($sep, $categories);
		$categories = get_the_title();
		$categories = array_reverse($categories);
		$title[] = $site;
	}
	//архив
	elseif(is_archive()){
		$title = array('Архив за:' . get_the_time("F Y"), $site);
	}
	$title = implode($sep, $title);
	return $title;
}