<?php 
	require 'db.class.php';
	class forum{
		public $db;
		public function __construct(){
			$this->db = new db();
			$this->db = $this->db->getInstance();
		}
		public function newTopic($catID, $title, $content, $author){
			$this->db->query("INSERT INTO topics(CId, Title, Content, Author) VALUES ($catID , $title, $content, $author)");
		}
		public function newReply($tid, $title, $content, $author){
			//$this->db->query("INSERT INTO reply()")
		}
	}
?>