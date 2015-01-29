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
function getForumTopic(){
	$query = "SELECT * FROM topics";
	$result = getMysql()->query($query);
	$row = $result->fetch_assoc();
}
function getCatToHTML($id){
	$query = "SELECT * FROM Cat WHERE id='".$id."'";
	$result = getMysql()->query($query);
	$row = $result->fetch_assoc();
	
	$fquery = "SELECT * FROM Forums WHERE CAT_id='".$row['id']."'";
	$result = getMysql()->query($fquery);
	$frow = $result->fetch_assoc();
	while($row){
		echo"
			<div class='panel panel-default'>
				<div class='panel-heading'>".
				$row['CAT_NAME']."
				</div>
				<table class='table'>
					<thread>
						<tr>
							<th>Discussion</th>
							<th>By:</th>
						</tr>
					</thread>
					<tbody>";
				while($frow){
					echo '<tr>';
					echo '<td>';
					echo $frow['Title'];
					echo '</td>';
					echo '<td>';
					echo $frow['USER'];
					echo '</td>';
					echo '</tr>';
				}
		echo"
				</tbody>
				</table>
			</div>	
			";
	}
}
function getAllCatToHTML(){
	$query = "SELECT * FROM Cat";
	$result = getMysql()->query($query);
	$row = $result->fetch_assoc();
	
	$fquery = "SELECT * FROM Forums WHERE CAT_id='".$row['id']."'";
	$result = getMysql()->query($fquery);
	$frow = $result->fetch_assoc();
	while($row){
		echo"
			<div class='panel panel-default'>
				<div class='panel-heading'>".
				$row['CAT_NAME']."
				</div>
				<table class='table'>
					<thread>
						<tr>
							<th>Discussion</th>
							<th>By:</th>
						</tr>
					</thread>
					<tbody>";
				while($frow){
					echo '<tr>';
					echo '<td>';
					echo $frow['Title'];
					echo '</td>';
					echo '<td>';
					echo $frow['USER'];
					echo '</td>';
					echo '</tr>';
				}
		echo"
				</tbody>
				</table>
			</div>	
			";
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
function catNotNull($id){
	$q = "SElECT * FROM cat WHERE id='".$id."'";
	$r = getMysql()->query($q);
	$row = mysqli_fetch_row($r);
	return ($row[0] == 1) ? true: false;
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
