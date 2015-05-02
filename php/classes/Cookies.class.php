<?php
	class Cookies{
		public static function cookieYear($name, $value, $years){
			return setcookie($name, $value,time()+$years*31556926); 
		}
		
		public static function cookieMonth($name, $value, $month){
			return setcookie($name, $value, time()+$month*2629743.83);
		}		
		
		public static function cookieWeek($name, $value, $week){
			return setcooke($name, $value,time()+$week*604800);
		}
		
		public static function cookieDay($name, $value, $day){
			return setcookie($name,$value,time()+$day*86400);
		}
		
		public static function cookieHour($name,$value,$hour){
			return setcookie($name, $value, time()+$hour*3600);
		}
		
		public static function cookieMinute($name, $value, $minute){
			return setcookie($name, $value, time()+$minute*60);
		}
		
		public static function cookieSeconds($name, $value, $seconds){
			return setcookie($name,$value,time()+$seconds);
		}
		public static function exists($cookieName){
			if(isset($_COOKIE[$cookieName])){
				return true;
			}else{
				return false;
			}
		}
		public static function get($name){
			return $_COOKIE['name'];
		}
		public static function cookieExpire($name){
			return setcookie($name, "" , 0000000000);
		}
		public static function put($type, $name = null, $value = null, $expire = null){
			$type = strtolower($type);
			switch ($type){
				case 'year':
					if($this->cookieYear($name, $value, $expire)){
						return true;
					}
					return false;
				break;
				case 'month':
					if($this->cookieMonth($name, $value, $expire)){
						return true;
					}
					return false;
				break;
				case 'day':
					if($this->cookieDay($name, $value, $expire)){
						return true;
					}
					return false;
				break;
				case 'hour':
					if($this->cookieHour($name, $value, $expire)){
						return true;
					}
					return false;
				break;
				case 'minute':
					if($this->cookieMinute($name, $value, $expire)){
						return true;
					}
					return false;
				break;
				case 'delete':
					if($this->cookieExpire($name)){
						return true;
					}
					return false;
				break;
				case '':
					if($this->cookieSeconds($name, $value, $expire)){
						return true;
					}
					return false;
				break;
			}
		}
		public static function isCookieSet($cookie){
			if(isset($_COOKE[$cookie])){
				return true;
			}else{
				return false;
			}
		}
	}	
?>
