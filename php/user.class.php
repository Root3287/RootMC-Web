<?php
	class user{
		private $db = new db();
		
		public function getRank($user){
			return $db->sql_query("SELECT Rank_id FROM users WHERE UNAME='".$user."'");
		}
		
		public function getUser($user){
			return $db->sql_query("SELECT * FROM users");
		}
	}
?>