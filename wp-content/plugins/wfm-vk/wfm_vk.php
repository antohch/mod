<?php 
/*
Plugin Name: vk
Plugin URI: http://страница_с_описанием_плагина_и_его_обновлений
Description: Описание первого плагина
Version: 1.0
Author: Anon
Author URI: http://hz.com
*/
add_action ('widgets_init', 'wfm_vk');

function wfm_vk(){
	register_widget('WFM_VK');
}

class WFM_VK extends WP_Widget{

	public $title, $count;

	function __construct(){
		$args = array(
			'description' => 'вk'
		);
		parent::__construct('wfm_vk', 'Записи со стены вк', $args);
	}

	function widget($args, $instance){
		extract($args);
		extract($instance);
		$title = "39119491";
		$count = 3;

		$this->title = $title;
		$this->count = $count;
		$data = $this->wfm_get_posts_vk();
		echo $data;
	}

	private function wfm_get_posts_vk(){
		if(is_numeric($this->title)){
			$id = "owner_id={$this->title}";
			$this->title = "id{$this->title}";
		}else{
			$id = "domain={$this->title}";
		}
		if(!(int)$this->count){
			$this->count = 3;
		}
		$url = "http://api.vk.com/method/wall.get?{$id}&filter=owner&count={$this->count}";
		$vk_posts = wp_remote_get($url);
		$vk_posts = json_decode($vk_posts['body']);

		if(isset($vk_posts->error)) return false;

		$html = '<div class="wfm-vk">';
		foreach($vk_posts->response as $item){
			if(!empty($item->text)){
				$html .= "<div><a href='http://vk.com/{$this->title}'>{$item->text}</a></div>";
			}elseif(!empty($item->attachment->photo->src_small)){
				$html .= "<div><a href='http://vk.com/{$this->title}'><img src={$item->attachment->photo->src_small}></a></div>";
			}
		}
		$html .='</div>';

		return $html;
		//wp_remote_get();
	}
}