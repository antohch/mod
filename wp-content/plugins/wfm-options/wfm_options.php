<?php
/*
Plugin Name: Option and settings
Plugin URI: http://страница_с_описанием_плагина_и_его_обновлений
Description: Краткое описание плагина.
Version: Номер версии плагина, например: 1.0
Author: Имя автора плагина
Author URI: http://страница_автора_плагина
*/

add_action("admin_init", 'wfm_first_option');

function wfm_first_option(){
	register_setting(
		'general',//место размещения Настройки -> Общие
		'wfm_first_option'  //название опции
		);
	add_settings_field(
		'wfm_first_option',//id опции (использовать для ID поля формы)
		'первая опция',//заголовок
		'wfm_option_cb',//callback-функция, для html - кода поля формы
		'general' //место размещения Настройки -> Общие
	);
}

function wfm_option_cb(){
?>
	<input type="text" name="wfm_first_option" id="wfm_first_option" value="<?php echo esc_attr(get_option('wfm_first_option'))?>" class='regular-text'>
<?php
}