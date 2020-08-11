<?php
class Session{
	 public static function init(){
	 	session_start();
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
// Admin Panel login check.........................
	 public static function checkAdminSession(){
	 	self::init();
	 	if (self::get("adminLogin") == false) {
	 		self::destroy();
	 		header("Location:login.php");
	 	}
	 }

	 public static function checkAdminLogin(){
	 	self::init();
	 	if (self::get("adminLogin") == true) {
	 		header("Location:index.php");
	 	}
	 }

	 // User Panel login check..........................

	  public static function checkUserSession(){
	 	if (self::get("userLogin") == false) {
	 		self::destroy();
	 		header("Location:index.php");
	 	}
	 }

	  public static function checkUserLogin(){

	 	if (self::get("userLogin") == true) {
	 		header("Location:exam.php");
	 		exit();
	 	}
	 }

	 public static function destroy(){
	 	session_destroy();
	 	session_unset();
	 }
}

?>