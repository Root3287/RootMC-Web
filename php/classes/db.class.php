<?php 
	class db extends mysqli{
		private $_host, $_user, $_pass, $_port, $_db, $_connect, $_result;
		public function __construct($host, $user, $pass, $port, $db){
			$this->_db = $db;
			$this->_host = $host;
			$this->_user = $user;
			$this->_pass = $pass;
			$this->_port = $port;
			parent::__construct($host, $user, $pass, $db, $port);
		}
		public function createTable($table, $tableVal){
			return $this->_connect->query("CREATE TABLE $table($tableVal)");
		}
		public function asc($table, $row){
			$this->_result = $this->_connect->query("SELECT * FROM $table ORDER BY $row ASC");
			return $this->_result;
		}
		public function limit($table, $limit){
			if($limit >= 1){
				$this->_result = $this->query("SELECT * FROM $table LIMIT $limit");
				return $this->_result;
			}else{
				return null;
			}
		}
		public function asc_Where($table, $where, $row){
			$this->_result = $this->query("SELECT * FROM $table WHERE $where ORDER BY $row ASC");
			return $this->_result;
		}
		public function query($query){
			 $this->connect()->query($query);
		}
		public function result(){
			return $this->_result;
		}
	}
?>
