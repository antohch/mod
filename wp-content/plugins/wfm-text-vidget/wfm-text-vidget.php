<?php
/*
Plugin Name: Текстовый виджет
Description: Краткое описание плагина.
Version: 1.0
Author: Тоха
Author URI: http://страница_автора_плагина
*/

add_action('widgets_init', 'wfm_first_widget');//инициализация виджетов widgets_init и можно выполнить нашу функция

function wfm_first_widget(){
	register_widget('WFM_Widget');//регистрируем виджет, будет класс
}

class WFM_Widget extends WP_Widget{
	function __construct() {
		//вывод виджета
		/*parent::__construct(
			'wfm_fw', // Base ID
			'Мой первый виджет', // Name
			array( 'description' => 'Описание виджета') // Args
		);*/
		$args = array(
			'name' => 'Мой первый виджет',
			'description' => 'Описание виджета два',
			'classname' => 'wfm-test',
		);
		parent::__construct('wfm', '', $args);
	}
	
	public function widget($args, $instance){
		extract($args);
		extract($instance);
		
		$title = apply_filters('widget_title', $title);
		$text = apply_filters('widget_text', $text);
		
		echo $before_widget;
		echo $before_title . $title . $after_title;
		echo $text;
		echo $after_widget;
	}
	function form($instance){
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		$text = ! empty( $instance['text'] ) ? $instance['text'] : __( 'Новый текст', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Текст</label> 
		
		<textarea cols="20" rows="5" class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo  $text; ?></textarea>
		
		<?php 
	}
	
	function update($new_instance, $old_instance){
		$new_instance['title'] = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
		$new_instance['text'] = str_replace('<p>', '', $new_instance['text']);
		$new_instance['text'] = str_replace('</p>', '', $new_instance['text']);
		return $new_instance;
	}
}