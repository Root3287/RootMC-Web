<?php 
	class forums{
		public $db;
		public function __construct(){
			$this->db = $this->db->getInstance();
		}
		public function newTopic($catID, $title, $content, $author){
			$this->db->query("INSERT INTO topics(CId, Title, Content, Author) VALUES ($catID , $title, $content, $author)");
		}
		public function newReply($tid, $title, $content, $author){
			//$this->db->query("INSERT INTO reply()")
		}
		public function getCat(){
			$q = $this->db->query("SELECT * FROM category");
			$result = "";
			while($row = $q->fetch_assoc()){
				if($row['Parent'] == 1){
					if($row['Parent_ID'] < 0){
						$result[$row['ID']] = $row;
					}
				}else{
					if($row['Parent_Id'] > 0){
						$result[$row['ID']] = $row;
					}
				}
			}
		}
	}
?>
