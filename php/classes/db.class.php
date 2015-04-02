<?php 
	class db{
		private static $_instance;
		private $_host, $_user, $_pass, $_port, $_db, $_connect, $_result, $_query;
		public function __construct(){
			try{
				$this->_connect = new PDO('mysql:host='.$GLOBALS['SQL']['HOST'].';mysql:database='.$GLOBALS['SQL']['DATABASE'].';',$GLOBALS['SQL']['USER'],$GLOBALS['SQL']['PASSWORD']);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
		public function getInstance(){
			if(!isset(self::$_instance)){
				self::$_instance = new db();
			}
			return self::$_instance;
		}
		
		public function createTable($table, $tableVal){
			 $this->_query = $this->query("CREATE TABLE $table($tableVal)");
			 $this->_result = $this->_query->FetchAll();
			 return $this;
		}
		
		public function asc($table, $row){
			$this->_query = $this->query("SELECT * FROM $table ORDER BY $row ASC");
			$this->_result = $this->_query->fetchAll();
			return $this;
		}
		public function limit($table, $limit){
			if($limit >= 1){
				$this->_query = $this->query("SELECT * FROM $table LIMIT $limit");
				$this->_result = $this->_query->fetchAll();
				return $this;
			}else{ 
				return null;
			}
		}
		public function asc_Where($table, $where, $row){
			$this->_query = $this->query("SELECT * FROM $table WHERE $where ORDER BY $row ASC");
			$this->_result = $this->_query->fetchAll();
			return $this;		}
		public function query($query){
			 $this->_query = $this->_connect->query($query);
			 $this->_result = $this->_query->fetchAll();
			 return $this;
		}
		public function result(){
			return $this->_result;
		}
	}
?>
