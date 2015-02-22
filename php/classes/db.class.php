<?php 
	class db extends mysqli{
		private $_host, $_user, $_pass, $_port, $_db, $_connect, $_result;
		public function __construct($_host, $_user, $_pass, $_port, $_db){
			$this->_db = $db;
			$this->_host = $host;
			$this->_user = $user;
			$this->_pass = $password;
			$this->_port = $port;
			$this->connect();
		}
		public function connect(){
			$this->_connect = new mysqli($host, $user, $password, $database, $port) or Die("Error: can not connect to my sql database plese recheck the init.php");
		}
		
		public function createTable($table, $tableVal){
			return $this->query("CREATE TABLE $table($tableVal)");
		}
		
		public function asc($table, $row){
			return self::getMysql()->query("SELECT * FROM $table ORDER BY $row ASC");
		}
		public function limit($table, $limit){
			if($limit >= 1){
				return $this->query("SELECT * FROM $table LIMIT $limit");
			}else{
				return null;
			}
		}
		public function asc_Where($table, $where, $row){
			return $this->query("SELECT * FROM $table WHERE $where ORDER BY $row ASC");
		}
		public function query($query){
			return $this->connect()->query($query);
		}
	}
?>