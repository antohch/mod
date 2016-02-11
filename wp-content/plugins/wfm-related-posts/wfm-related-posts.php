<?php
/*
Plugin Name: Похожие посты
Description: Выводит похожие посты
Version: Номер версии плагина, например: 1.0
Author: Тоха
*/
add_filter('the_content', 'wfm_related_posts');//установить фильтр к функцие the_content

function wfm_related_posts($content){
	if(!is_single()) return $content;//если мы находимся вне записи, то вывести контент
    echo $id = get_the_ID();//получаем id текущей записи. По этому ID будем искать категории
    $categories = get_the_category($id);//получим массим категорий
    foreach($categories as $category){//переберем массив с объктом и выберем только ID категорий
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
		$content .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a><br>';//составим ссылку
        }
        $content .= '</div>';
        wp_reset_query();//сбросить глобальные атрибуты, если не сделать, то будут работать не корректно остальные плагины
    }
	return $content;
}
