<?php 
	class db{
		private static $_instance = null;
		private $_connect, 
				$_result, 
				$_query, 
				$_error = false,
				$_count = 0;
		
		private function __construct(){
			try{
				$this->_connect = new PDO('mysql:host='.config::getSql('HOST').';mysql:database='.config::getSql('DATABASE').';',config::getSql('USER'),config::getSql('PASSWORD'));
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
			 $this->_result = $this->_query->fetchAll();
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
			return $this;
		}
		
		public function query($query, $params = array()){
			$this->_error = false;	
			if($this->_query = $this->_connect->prepare($query)){
				if(count($prams)){
					$i = 1;
					foreach ($prams as $pram){
						$this->_query->bindParam($i, $pram);
						$i++;
					}
				}
			}
			if($this->_query->execute()){
				$this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			}else{
				$this->_error = true;
			}
			return $this;
		}
		
		public function action($action, $table , $where = array()){
			if (count($where) == 3){
				$operators = array('=','>','<','>=','<=');
				
				$field = $where[0];
				$operator = $where[1];
				$value = $where[2];
				
				if(in_array($operator, $operators)){
					$sql = "$action * FROM $table WHERE $field $operator ?";
					if(!$this->query($sql, array($value))->error()){
						return $this;
					}
				}
			}
		}
		
		public function insert($table, $fields = array()){
			if(count($fields)){
				$key =array_keys($fields);
				$values = null;
				$i = 1;
				
				foreach($fields as $field){
					$values .="?";
					if($x< count($fields)){
						$values .= ', ';
					}
					$i++;
				}
				
				$sql = "INSERT INTO $table(`".implode('`, `', $key)."`) VALUES ($values)";
				
				if(!$this->query($sql, $fields)->error()){
					return true;
				}
			}
			return false;
		}
		
		public function update($table, $id ,$fields = array()){
			$set = '';
			$i = 1;
			
			foreach ($fields as $name => $values){
				$set .= "{$name} = ?";
				if($i < count($fields)){
					$set.= ', ';
				}
				$i++;
			}
			
			$sql = "UPDATE $table SET $set WHREE id = $id";
			if(!$this->query($sql, $fields)->error()){
				return true;
			}
			return false;
		}
		
		public function get($table, $where){
			return $this->action('SELECT *', $where);
		}
		
		public function delete($table, $where){
			return $this->action('DELETE *', $where);
		}
		
		public function results(){
			return $this->_result;
		}
		
		public function first(){
			return $this->results()[0];
		}
		
		public function error(){
			return $this->_error;
		}
		
		public function count(){
			return $this->_count;
		}
	}
?>
