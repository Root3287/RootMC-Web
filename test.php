<?php
	$path = "";
	require $path.'php/includes.php';
	
	$result = sql_query("SELECT * FROM users");
	while($row = $result->fetch_assoc()){
		echo $row['id'];
	}
?>