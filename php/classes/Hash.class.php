<?php
class Hash{
	public static function make($string, $salt =''){
		 return password_hash($salt.$string, 'sha256');
	}
	
	public static function salt($length){
		return mcrypt_create_iv($length);
	}
	
	public static function unique(){
		return self::make(uniqid());
	}
}