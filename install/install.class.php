<?php
class install{
	private $_path, $_host, $_user, $_pass, $_db, $_port,$_prefix, $_ServName,$_ServIP, $_ServPort, $_ServDISP,$_redirect;
	public function __construct($redirect){
		$this->_redirect = $redirect;
		
	}
	public function insert($path, $host, $user,$pass, $db, $port,$prefix, $ServName,$ServIP, $ServDISP){
		$this->_path = $path;
		$this->_host = $host;
		$this->_user = $user;
		$this->_pass = $pass;
		$this->_db = $db;
		$this->_port = $port;
		$this->_prefix = $prefix;
		$this->_ServName = $ServName;
		$this->_ServIP =$ServIP;
		$this->_ServDISP = $ServDISP;
	}
	public function put(){
		//TODO: SESSION Name, COOKIES NAME, Token Name, Remember me on both ends
		$insert=
		'<?php'.PHP_EOL.
		'//The configuration for your server'.PHP_EOL.
		'$CONFIG = array('.PHP_EOL.
		'	"SERVERNAME"=>"'.$this->_ServName.'",'.PHP_EOL.
		'	"SERVERIP"=>"'.$this->_ServIP.'",'.PHP_EOL.
		'	"DISPLAYIP"=>"'.$this->_ServDISP.'",'.PHP_EOL.
		');'.PHP_EOL.
		'$GLOBALS[\'SQL\'] = array('.PHP_EOL.
		'	"HOST"=>"'.$this->_host.'",'.PHP_EOL.
		'	"PORT"=>"'.$this->_port.'",'.PHP_EOL.
		'	"USER"=>"'.$this->_user.'",'.PHP_EOL.
		'	"PASSWORD"=>"'.$this->_pass.'",'.PHP_EOL.
		'	"DATABASE"=>"'.$this->_db.'",'.PHP_EOL.
		'	"PREFIX"=>"'.$this->_prefix.'",'.PHP_EOL.
		');'.PHP_EOL.
		'$GLOBALS[\'CONFIG\'] = array('.PHP_EOL.
		'	"SERVERNAME"=>"'.$this->_ServName.'",'.PHP_EOL.
		'	"SERVERIP"=>"'.$this->_ServIP.'",'.PHP_EOL.
		'	"DISPLAYIP"=>"'.$this->_ServDISP.'",'.PHP_EOL.
		'	"Cookies"=> array('.PHP_EOL.
		'		"Remember"=>array("cookie_name"=>"hash", "expire" =>"30"),'.PHP_EOL.
		'	),'.PHP_EOL.
		'	"Session"=> array("session_name" => "user","token_name" => "token"),'.PHP_EOL.
		');'.PHP_EOL.
		'?>';
		$this->createMysql_two();
		$this->queries_two();
		
		if(is_writable($this->_path.'php/config.php')){
			$Iconfig = file_get_contents($this->_path.'php/config.php');
			$Iconfig = substr($Iconfig, 6);
		
			$configfile = fopen($this->_path.'php/config.php', 'w');
			fwrite($configfile, $insert.$Iconfig);
			fclose($configfile);
			$this->_redirect->to("index.php?step=config");
			die();
		}else{
			$Iconfig = file_get_contents($this->_path.'inc/config.php');
			$Iconfig = substr($config, 5);
			$Iconfig = nl2br(htmlspecialchars($insert . $config));
				
			return $Iconfig.'<br/>Woops! Something went wrong! The file is not readable! you have to insert it manually into home/php/config.php! <a href=\'index.php?step=config\'>CLICK ME!</a>';
		}
	}
	public function createMysql_two(){
		$conn = new mysqli($this->_host, $this->_user, $this->_pass,$this->_db,$this->_port);
		return $conn;
	}
	public function close_two(){
		$this->createMysql_two()->close();
	}
	public function queries_two(){
		$queries = array(
				//Create Table user
				"CREATE TABLE users(id int NOT NULL AUTO_INCREMENT, First_Name text(30), Last_Name text(30), UserName varchar(100), Email varchar(100),MCUser varchar(20), UUID varchar(100), Password varchar(255), Salt varchar(255), Rank int(20), Joined DATETIME,PRIMARY KEY(id))",
				//Create Table Cat
				"CREATE TABLE categories(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, Cat_Title varchar(255), Cat_Desc varchar(255), Parent int(11) DEFAULT '0', Parent_ID int(22) DEFAULT '0', Cat_Order int(11), Front_Page int(11) DEFAULT '0', view_access int(11) DEFAULT '0')",
				//Create Table Reply
				"CREATE TABLE reply(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, TId int(20), Title varchar(255), Content LONGTEXT, Author int(11), Time datetime)",
				//Create Table Topic
				"CREATE TABLE topics(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, Cid int(20), Title text(225), Author int(11), Content LONGTEXT, data datetime)",
				//Create Table Topic Pref
				"CREATE TABLE topic_pref(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, Tid int(11) NOT NULL, Locked int(11) NOT NULL, Stickey int(11) NOT NULL)",
				//Create Table Links 
				"CREATE TABLE links(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, name varchar(255), Link_Path varchar(255))",
				// Create Table Friends
				"CREATE TABLE friends(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, UserID int(255), FriendID int(255))",
				//Create Table PM
				"CREATE TABLE pm(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, UserId int(11), UserId2 int(11), Message LONGTEXT)",
				//Create Table Forums Perm
				"CREATE TABLE cat_perms(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, group_id int(11) NOT NULL, Cat_id int(11) NOT NULL, view int(11) NOT NULL, create_post int(11) NOT NULL, create_reply int(11) NOT NULL)",
				//Create Table Ranks
				// a= ADMINISTRATOR D= DONOR S=Special m=DEFAULT
				"CREATE TABLE ranks(id int NOT NULL AUTO_INCREMENT, name TEXT, Display_Name TEXT, Permission TEXT, PRIMARY KEY(id))",
				//Create table Connections
				"CREATE TABLE sessions(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, user_id int(255) NOT NULL, hash TEXT)",
				//Create Blog or Front page.
				"CREATE TABLE blog(id int NOT NULL AUTO_INCREMENT, Title text, Content Longtext, Author int(11))",
				
				"INSERT INTO categories(Cat_Title, Cat_Desc, Parent, Cat_Order) VALUES (`First`, `This is the first cat`, `1`, `1`)",
		
				"INSERT INTO categories(Cat_Title, Cat_Desc, Parent_ID, Cat_Order) VALUES (`Second`, `This is the child of the first cat`, `1`, `1`)"
		);
		
		foreach ($queries as $query){
			$this->createMysql_two()->query($query);
		}
		
		$this->close_two();
	}
	public function newConfig(){
		return $this->_redirect->to('index.php?step=finish');
	}
}
?>
