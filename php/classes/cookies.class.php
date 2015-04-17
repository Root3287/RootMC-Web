<?php
	class Cookies{
		public function cookieYear($name, $value, $years){
			setcookie($name, $value,time()+$years*31556926); 
		}
		
		public function cookieMonth($name, $value, $month){
			setcookie($name, $value, time()+$month*2629743.83);
		}		
		
		public function cookieWeek($name, $value, $week){
			setcooke($name, $value,time()+$week*604800);
		}
		
		public function cookieDay($name, $value, $day){
			setcookie($name,$value,time()+$day*86400);
		}
		
		public function cookieHour($name,$value,$hour){
			setcookie($name, $value, time()+$hour*3600);
		}
		
		public function cookieMinute($name, $value, $minute){
			setcookie($name, $value, time()+$minute*60);
		}
		
		public function cookieSeconds($name, $value, $seconds){
			setcookie($name,$value,time()+$seconds);
		}
		public function cookieSet($cookieName){
			if(isset($_COOKIE[$cookieName]) && $cookieName !=null){
				return true;
			}else{
				return false;
			}
		}
		public function expire($name){
			setcookie($name, "" , 0000000000);
		}
	}	
?>
