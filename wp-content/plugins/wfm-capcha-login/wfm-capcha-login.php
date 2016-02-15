<?php
/*
Plugin Name: Капча для логина
Description: Краткое описание плагина.
Version: 1.0
Author: Тоха
*/
/*add_filter('login_errors', 'wfm_login_errors_my');

function wfm_login_errors_my(){
	return "Ошибка авторизации";
}
add_action('login_form', 'wfm_captcha_login');
add_action('wp_authenticate', 'wfm_wp_authenticate', 10, 2);

function wfm_wp_authenticate($username, $password){
	if(isset($_POST['check']) && $_POST['check'] == 'check'){
		//wp_die('<b>Ошибка</b>: Вы не прошли проверку на человечность');
		add_filter('login_errors', 'wfm_login_errors_my');
		$username = null;
	}
}

function wfm_captcha_login(){
	echo '<p><label for="check"><input type="checkbox" name="check" id="check" value="check" checked> Снимите галочку</label></p>';
}

function wfm_login_errors_my(){
	return '<b>Ошибка</b>: Вы не прошли проверку на человечность';
}
*/
add_action('login_form', 'wfm_captcha_login');
add_filter('authenticate', 'wp_auth_signon', 30, 3);//3-количество параметров

function wfm_captcha_login(){
	echo '<p><label for="check"><input type="checkbox" name="check" id="check" value="check" checked> Снимите галочку</label></p>';
}

function wp_auth_signon($user, $username, $password){
	if(isset($_POST['check']) && $_POST['check'] == 'check'){
		$user = new WP_Error('broke', '<b>Ошибка</b>: вы бот?');
	}
	if(isset($user->errors['incorrect_password']) || isset($user->errors['invalid_username'])){
		$user = new WP_Error('broke', '<b>Ошибка</b>: неверный логин или пароль');
	}
	return $user;
}

