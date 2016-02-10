<?php
function wfm_deactivate(){
	$date = date("Y-m-d H:i:s");
	error_log($date . " Плагин дективирован\r\n", 3, dirname(__FILE__).'/wfm_errors_log.log');
}