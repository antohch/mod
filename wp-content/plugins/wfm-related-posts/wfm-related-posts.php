<?php
/*
Plugin Name: Похожие посты
Description: Выводит похожие посты
Version: Номер версии плагина, например: 1.0
Author: Тоха
*/
add_filter('the_content', 'wfm_related_posts');//установить фильтр к функции the_content
add_action('wp_enqueue_scripts', 'wp_register_styles_scripts');//подключить js скрипт и стили. Подвесить на экшен

function wp_register_styles_scripts(){
	wp_register_script('wfm-jquery-tools-js', plugins_url('js/jquery.tools.min.js', __FILE__), array('jquery'));//зарегистрировать js скрипт
	wp_register_script('wfm-script-tools-js', plugins_url('js/wfm-scripts.js', __FILE__), array('jquery'));//зарегистрировать js скрипт
	wp_register_style('wfm-related-post', plugins_url('css/wfm_style.css', __FILE__));//зарегистрируем стили
	//можно было и не регистрировать, тогда пришлось бы указывать второй параметр в подключении
	wp_enqueue_script('wfm-jquery-tools-js');//подключить скрипты
	wp_enqueue_script('wfm-script-tools-js');//подключить скрипты
	wp_enqueue_style('wfm-related-post');//подключить стили
}

function wfm_related_posts($content){
	if(!is_single()) return $content;//если мы находимся вне записи, то вывести контент
    $id = get_the_ID();//получаем id текущей записи. По этому ID будем искать категории
    $categories = get_the_category($id);//получим массив категорий
    foreach($categories as $category){//переберем массив с объектом и выберем только ID категорий
        $cats_id[] = $category->cat_ID;
    }
    $related_posts = new WP_Query(array(//создадим объект только с теми записями в которых есть найденные категории
        'posts_per_page' => 5,//выводить только 5 записей
        'category__in' => $cats_id,//только с данными категориями
        'orderby' => 'rand',//случайно
        'post__not_in' => array($id),//кроме текущей записи
    ));
    if ($related_posts->have_posts()){//запускаем цикл wordpress
        $content .= '<div class="related-posts"><h3>Возможно вас заинтересуют эти записи:</h3>';
        while($related_posts->have_posts()){//запускаем цикл wordpress
		$related_posts->the_post();//если это не указать то записи не будут перебираться и всё зациклется
		if(has_post_thumbnail()){
			$img = get_the_post_thumbnail(get_the_ID(), array(100, 100), array('alt'=>'', 'title'=>get_the_title()));
		}else{
			$img = '<img src="'. plugins_url('image/no_img.jpg', __FILE__) .'" alt="" title="'.get_the_title().'" width="100" height="100">';
		}
		$content .= '<a href="' . get_permalink() . '">' . $img . '</a>';//составим ссылку
        }
		$content .= "<div class='wfm-clear'></div>";
        $content .= '</div>';
        wp_reset_query();//сбросить глобальные атрибуты, если не сделать, то будут работать некорректно остальные плагины
    }
	return $content;
}
