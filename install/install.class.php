<?php
class install{
	private $_path, $_host, $_user, $_pass, $_db, $_port,$_prefix, $_ServName,$_ServIP, $_ServPort, $_ServDISP,$_redirect;
	public function __construct($path, $host, $user,$pass, $db, $port,$prefix, $ServName,$ServIP, $ServDISP, $redirect){
		$this->_path = $path;
		$this->_host = $host;
		$this->_user = $user;
		$this->_pass = $password;
		$this->_db = $db;
		$this->_port = $port;
		$this->_prefix = $prefix;   
		$this->_ServName = $ServName;
		$this->_ServIP =$ServIP;
		$this->_ServDISP = $ServDISP;
		$this->_redirect = $redirect;
		$this->put($path, $host, $user, $password, $db, $port, $prefix, $ServName, $ServIP, $ServDISP);
		$this->createMysql_one();
		$this->queries_one();
		$this->createMysql_two();
		$this->queries_two();
	}
	public function put($path, $host, $user, $password, $db, $port, $prefix, $ServName,$ServIP, $ServDISP ){
		$insert=
		'<?php'.PHP_EOL.
		'$SQL = array('.PHP_EOL.
		'	"HOST"=>"'.$host.'",'.PHP_EOL.
		'	"PORT"=>"'.$port.'",'.PHP_EOL.
		'	"USER"=>"'.$user.'",'.PHP_EOL.
		'	"PASSWORD"=>"'.$password.'",'.PHP_EOL.
		'	"DATABASE"=>"'.$db.'",'.PHP_EOL.
		'	"PREFIX"=>"'.$prefix.'",'.PHP_EOL.
		');'.PHP_EOL.
		''.PHP_EOL.
		'//The configuration for your server'.PHP_EOL.
		'$CONFIG = array('.PHP_EOL.
		'	"SERVERNAME"=>"'.$ServName.'",'.PHP_EOL.
		'	"SERVERIP"=>"'.$ServIP.'",'.PHP_EOL.
		'	"DISPLAYIP"=>"'.$ServDISP.'",'.PHP_EOL.
		');'.PHP_EOL.
		'$GLOBALS[\'SQL\'] = array('.PHP_EOL.
		'	"HOST"=>"'.$host.'",'.PHP_EOL.
		'	"PORT"=>"'.$port.'",'.PHP_EOL.
		'	"USER"=>"'.$user.'",'.PHP_EOL.
		'	"PASSWORD"=>"'.$password.'",'.PHP_EOL.
		'	"DATABASE"=>"'.$db.'",'.PHP_EOL.
		'	"PREFIX"=>"'.$prefix.'",'.PHP_EOL.
		');'.PHP_EOL.
		'$GLOBALS[\'CONFIG\'] = array('.PHP_EOL.
		'	"SERVERNAME"=>"'.$ServName.'",'.PHP_EOL.
		'	"SERVERIP"=>"'.$ServIP.'",'.PHP_EOL.
		'	"DISPLAYIP"=>"'.$ServDISP.'",'.PHP_EOL.
		');'.PHP_EOL.
		'?>';
		
		if(is_writable($path.'php/config.php')){
			$Iconfig = file_get_contents($path.'php/config.php');
			$Iconfig = substr($Iconfig, 6);
		
			$configfile = fopen($path.'php/config.php', 'w');
			fwrite($configfile, $insert.$Iconfig);
			fclose($configfile);
			$this->_redirect->to("index.php?step=finish");
			die();
		}else{
			$Iconfig = file_get_contents('inc/config.php');
			$Iconfig = substr($config, 5);
			$Iconfig = nl2br(htmlspecialchars($insert . $config));
				
			return $Iconfig.'<br/>Woops! Something went wrong! The file is not readable! you have to insert it manually into home/php/config.php! <a href=\'?step=finished\'>CLICK ME!</a>';
		}
	}
	public function createMysql_one(){
		$conn = new mysqli($this->_host, $this->_user, $this->_pass,null,$this->_port);
		return $conn;
	}
	public function close_one(){
		$this->createMysql_one()->close();
	}
	public function queries_one($db){
		$this->createMysql_one()->query("CREATE DATABASE ".$db);
		$this->close_one();
	}
	public function createMysql_two(){
		$conn = new mysqli($this->_host, $this->_user, $this->_pass,null,$this->_port);
		return $conn;
	}
	public function close_two(){
		$this->createMysql_two()->close();
	}
	public function queries_two(){
		$queries = array(
				//Create Table user
				"CREATE TABLE users(Id int NOT NULL AUTO_INCREMENT, First_Name text(30), Last_Name text(30), UserName varchar(100), Email varchar(100), MCUser varchar(20), UUID varchar(100), Password varchar(255), Salt varchar(255), RankId int(20), PRIMARY KEY(id))",
				//Create Table Cat
				"CREATE TABLE categories(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, Cat_Title varchar(255), Cat_Desc varchar(255), Parent int(11) DEFAULT '0', Parent_ID int(22) DEFAULT '0', Cat_Order int(11), Front_Page int(11) DEFAULT '0', view_access int(11) DEFAULT '0')",
				//Create Table Reply
				"CREATE TABLE reply(Id int PRIMARY KEY NOT NULL AUTO_INCREMENT, TId int(20), Title varchar(255), Content LONGTEXT, Author int(11), Time datetime)",
				//Create Table Topic
				"CREATE TABLE topics(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, Cid int(20), Title text(225), Author int(11), Content LONGTEXT, data datetime)",
				//Create Table Topic Pref
				"CREATE TABLE topic_pref(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, Tid int(11) NOT NULL, Locked int(11) NOT NULL, Stickey int(11) NOT NULL)",
				//Create Table Links 
				"CREATE TABLE links(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, name varchar(255), Link_Path varchar(255))",
				// Create Table Friends
				"CREATE TABLE friends(Id int PRIMARY KEY NOT NULL AUTO_INCREMENT, UserID int(255), FriendID int(255))",
				//Create Table PM
				"CREATE TABLE pm(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, UserId int(11), UserId2 int(11), Message LONGTEXT)",
				//Create Table Forums Perm
				"CREATE TABLE forums_perms(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, group_id int(11) NOT NULL, Cat_id int(11) NOT NULL, view int(11) NOT NULL, create_post int(11) NOT NULL, create_reply int(11) NOT NULL)",
				//Create Table Ranks
				// a= ADMINISTRATOR D= DONOR S=Special m=DEFAULT
				"CREATE TABLE ranks(id int NOT NULL AUTO_INCREMENT, name text, Display_Name text, Rank Enum('a','d','s','m'), PRIMARY KEY(id))",
				
				//INSERT THE FIRST RANK
				"INSERT INTO ranks(name, Display_Name, Rank) VALUES ('Admin','ADMIN','a')",
		);
		
		foreach ($queries as $query){
			$this->createMysql_two()->query($query);
		}
		
		
		$this->close_two();
	}
}
?>