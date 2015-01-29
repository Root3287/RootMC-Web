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
?>