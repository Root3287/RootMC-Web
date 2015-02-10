<?php
	class user{
	private $_db, $_cookie;
	
		public function __construct(){
			$this->_db = db::getInstance();
		}
		public function getRank($user){
			return $this->$_db->sql_query("SELECT Rank_id FROM users WHERE UNAME='".$user."'");
		}
		
		public function getUser($user){
			return $db->sql_query("SELECT * FROM users");
		}
	}
?>