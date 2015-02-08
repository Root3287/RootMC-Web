<?php
	require $path.'php/config.php';
	class db{
		public function getMySQL(){
			 $conn = new mysqli($mySql['HOST'],$mySql['USER'],$mySql['PASS'],$mySql['DATABASE'],$mySql['PORT']);
			 if($conn->connect_error){
			 	die("Error: ". $conn->connect_error);
			 }
			 return $conn;
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
	}
?>