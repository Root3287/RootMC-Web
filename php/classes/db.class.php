<?php
	require $path.'php/config.php';
	class db{
		private static $_instance = null;
		private $_query,$_results;
		public function getInstance(){
			if(!isset(self::$_instance)){
				self::$_instance = new db();
			}
			return self::$_instance;
		}
		
		public function getMySQL(){
			 $conn = new mysqli($GLOBALS['SQL']['HOST'],$GLOBALS['SQL']['USER'],$GLOBALS['SQL']['PASS'],$GLOBALS['SQL']['DATABASE'],$GLOBALS['SQL']['PORT']);
			 if($conn->connect_error){
			 	die("Error: ". $conn->connect_error);
			 }
			 return $conn;
		}
		
		public function results() {
			return $this->_results;
		}
		
		public function sql_query($query){
			db::getMySQL()->query($query);
		}
		
		public function sql_query_limit($query, $total, $offset = 0){

			// if $total is set to 0 we do not want to limit the number of rows
			if ($total == 0)
			{
				// MySQL 4.1+ no longer supports -1 in limit queries
				$total = '18446744073709551615';
			}

			$query .= "\n LIMIT " . ((!empty($offset)) ? $offset . ', ' . $total : $total);

			return db::sql_query($query);
		}
		
		public function createTable($name ,$prams){
			db::sql_query("CREATE ".$name."(".$prams.")");
		}
		public function orderAll($table, $order, $sort){
			if(isset($sort)){
				$sql="SELECT * FROM ".$table."ORDER BY ".$order." ".$sort;
			}else{
				$sql="SELECT * FROM ".$table."ORDER BY ".$order;
			}
		
			if(!db::sql_query($sql)){
				return $this;
			}
			return false;
		}
	}
?>