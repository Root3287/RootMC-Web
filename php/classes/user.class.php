<?php
	class user{
	private $_db, $_cookie;
	
		public function __construct(){
			$this->_db = new db();
		}
		public function getRank($user){
			return $this->_db->sql_query("SELECT RankId FROM users WHERE UNAME='".$user."'");
		}
		public function hasRank($rank){
			$data = $this->_db->query("SELECT * FROM users WHERE RankId='$rank'");
		}
		public function getUser($user){
			return $db->sql_query("SELECT * FROM users");
		}
		public function isLoggedIn(){
			if(isset($_COOKIE['user'])){
				return true;
			}else{
				return false;
			}
		}
	}
?>