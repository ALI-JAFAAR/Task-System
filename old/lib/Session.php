<?php

class Session{

	public static function init(){

	 	session_start();

	}
	 
	public static function checkAdminSession(){
	 	self::init();
	 	if (self::get('User_id') == "") {
	 		self::destroy();
	 		header("Location:login.php");
	 	}
	}

	public static function set($key, $val){

	 	$_SESSION[$key] = $val;

	}

	public static function get($key){

	 	if (isset($_SESSION[$key])) {

	 		return $_SESSION[$key];

	 	} else {

	 		return false;

	 	}

	}

	public static function checkSession(){

	 	//self::init();

	 	if (self::get("userId") == "") {

	 		self::destroy();

	 		header("Location:index.php");

	 	}

	}

	public static function checkLogin(){

	 	//self::init();

	 	if (self::get("login") == true) {

	 		header("Location:exam.php");

	 	}

	}

	public static function checkUser(){

	 	//self::init();

	 	if (self::get("userId") != "") {

	 		header("Location:exam.php");

	 	}

	}

	public static function destroy(){

	 	session_destroy();
	 	session_unset();

	}

}

?>