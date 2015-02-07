<?php
require 'MinecraftUUID.php';
//SQL FUNCTIONS
function getMysql(){
	$conn = new mysqli($mySql['HOST'], $mySql['USER'], $mySql['PASSWORD'], $mySql['DATABASE'], $mySql['PORT']);
	if($conn->connect_error){
		die("Error: ". $conn->connect_error);
	}
	return $conn;
}
function sql_query($query){
	if($query !=''){
		getMysql()->query($query);
	}
}
/*
 * PRAMS
 * $user => mysql user
 * $rank => mysql rank
 */
function getRank($user,$rank){
	$user_Rank = sql_query("SELECT Ranks FROM users WHERE user='".$user."'");
	$rank = sql_query("SELECT * FROM ranks");
	$row = mysql_fetch_assoc($rank);
	while($row){
		if($user_Rank==$rank){
			return true;
		}else{
			return false;
		}
	}
}


//MYSQL QUERY:
// SELECT * FROM table WHERE id = id
function sql_query_limit($query, $total, $offset = 0){

	// if $total is set to 0 we do not want to limit the number of rows
	if ($total == 0)
	{
		// MySQL 4.1+ no longer supports -1 in limit queries
		$total = '18446744073709551615';
	}

	$query .= "\n LIMIT " . ((!empty($offset)) ? $offset . ', ' . $total : $total);

	return sql_query($query);
}
function addUser($FNAME, $LNAME, $UNAME ,$EMAIL, $MCUSER ,$PASS){
	$profile = ProfileUtils::getProfile($MCUSER);
	$result = $profile->getProfileAsArray();
	$HASH = password_hash($PASS, 'sha256');
	$QUERY="INSERT INTO ".$mySqlTables['USER']." (FIRST_NAME, LAST_NAME, UNAME ,EMAIL, MCUSER, UUID. PASSWORD) VALUES ('".$FNAME."','".$LNAME."','".$UNAME."','".$EMAIL."','".$MCUSER."','".$result['UUID']."','".$HASH."')";
	getMysql()->query($QUERY);
}
function getUser($name){
	// SELECT * FROM site_USERS WHERE UNAME=$name OR MCUSERS="$NAME"
	$QUERY = "SELECT * FROM user WHERE UNAME='".$name."' OR MCUSER='".$name."'";
	getMysql()->query($QUERY);
}

//COOKIES
//setCookie($name $value $expire)
//setCookie(name, value, cookieTime(years , $time);
function cookieTime($type,$time){
	switch($type){
		case "years":
			return $time*31556926;
			break;
		case "monthes":
			return $time*2629743.83;
			break;
		case "weeks":
			return $time*604800;
			break;
		case "days":
			return $time*86400;
			break;
		case "hours":
			return $time*3600;
			break;
		case "minutes":
			return $time*60;
			break;
		case "seconds":
			return $time;
			break;
	}
}
?>
