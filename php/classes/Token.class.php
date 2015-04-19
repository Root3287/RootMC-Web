<?php
class Token{
	public static function generate() {
		return Session::put();
	}
	public static function check($token){
		$tokenname = config::get('session/token_name');
	
		if(Session::exsits($tokenname) && $token === Session::get($tokenname)){
			Session::delete($tokenname);
			return true;
		}
		return false;
	}
	
	
}
?>