<?php
class Session{
	public static function put($name, $value){
		return $_SESSION[$name] = $value;
	}
	public static function exsits($name){
		if(isset($_SESSION[$name])){
			return true;
		}
		return false;
	}
	public static function delete($name){
		if(self::exsits($name)){
			unset($_SESSION[$name]);
		}
	}
	public static function get($name){
		return $_SESSION[$name];
	}
	public static function flash($name, $stirng =''){
		if(self::exsits($name)){
			$session = self::get($name);
			self::delete($name);
			return $session;
		}else{
			self::put($name, $value);
		}
	}
}
?>