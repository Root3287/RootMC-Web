<?php
function getInfraction(){
	if($infraction['enable'] === "true"){
		$infractionConn = new mysqli($infraction['database']['Host'], $infraction['Database']['User'], $infraction['Database']['Pass'], $infraction['Database']['Database']);
		if($infractionConn->connect_error){
			die("Error".mysql_error());
		}else{
			return $infractionConn;
		}
	}else{
		return;
	}
}
function infractionQuery($query){
	getInfraction()->query($query);
}

///////////////////////////////////
//	SQL BAN INFOMATION	//
//////////////////////////////////
function infractionGetBan($mcname){
	//IF NAME NOT NULL
	//CHANGE NAME TO UUID 
	//RETURN BAN
}
function infractionGetAllBanToHTML_Table(){
	$bans = infractionQuery("SELECT * FROM bans");
	$row = mysql_fetch_assoc($ban);
	while($row){
		//HTML TABEL
	}
}
////////////////////////////////////
//	SQL KICK INFORMATION	  //
////////////////////////////////////

function infractionGetKick($mcname){
	//IF NAME NOT NULL
	//CHANGE NAME TO UUID 
	//RETURN BAN
}
function infractionGetAllKickToHTML_Table(){
	$kick = infractionQuery("SELECT * FROM kick");
	$row = mysql_fetch_assoc($kick);
	while($row){
		//HTML TABEL
	}
}
?>
