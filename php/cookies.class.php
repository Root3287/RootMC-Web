<?php
	class Cookies{
		function makeCookies($name, $value, $expire){
			setCookies($name, $value, );
		}
		
		function cookieYear($years){
			return time()+$years*31556926;
		}
		
		function cookieMonth($month){
			return time()+$month*2629743.83;
		}		
		
		function cookieWeek($week){
			return time()+$week*604800;
		}
		
		function cookieDay($day){
			return time()+$day*86400;
		}
		
		function cookieHour($hour){
			return time()+$hour*3600;
		}
		
		function cookieMinute($minute){
			return time()+$minute*60;
		}
		
		function cookieSeconds($seconds){
			return time()+$seconds;
		}
	}	
?>