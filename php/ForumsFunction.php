<?php
	function getCatById($id){
		$query = "SELECT * FROM cat WHERE id='".$id."'";	
		$result = sql_query($query);
		while($cat = $result->fetch_assoc()){
			foreach($row as $key => $value){
				$row[$key] = $value;
			}
		}
		return $row;
	}
	
	function getForumById($id){
		$query = "SELECT * FROM forums WHERE id='".$id."'";
		$result = sql_query($query);
		while($forums = mysql_fetch_array($result)){
			foreach($row as $key => $value){
				 $row[$key]=$value;
			}
		}
		return $row;
	}
	function getOrignalTopicById($id){
		$query = "SELECT * FROM topics WHERE id='".$id."' AND type='o'";
		$result= sql_query($query);
		while ($topic = mysql_fetch_array($result)){
			foreach($row as $key => $value){
				$row[$key] = $value;
			}
		}
		return $row;
	}
?>