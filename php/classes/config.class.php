<?php
class config{
	public static function get($path = null){
		if(path){
			$config = $GLOBALS['CONFIG'];
			$path = explode("/", $path);
			
			foreach (path as $bit){
				if(isset($config[$bit])){
					$config = $config[$bit];
				}
			}
			return $config;
		}
	}
	public static function getSql($path = null){
		if($path){
			$config = $GLOBALS['SQL'];
			$path = explode("/", path);
			
			foreach (path as $bit){
				if(isset($config[$bit])){
					$config = $config[$bit];
				}
			}
			return $config;
		}
	}
}