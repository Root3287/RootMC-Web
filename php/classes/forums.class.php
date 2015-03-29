<?php 
	class forums{
		public $db;
		private $_user;
		public function __construct(){
			include 'db.class.php';
			$this->db = db::getInstance();
		}
		public function newTopic($catID, $title, $content, $author){
			$this->db->query("INSERT INTO topics(CId, Title, Content, Author) VALUES ($catID , $title, $content, $author)");
		}
		public function newReply($tid, $title, $content, $author){
			//$this->db->query("INSERT INTO reply()")
		}
		public function getCat($group_id){
			$q = $this->db->query("SELECT * FROM category");
			$q2 = $this->db->query("SELECT * FROM Ranks");
			$result = "";
			while($row = $q->fetchAll()){
				while($row2 = $q2->fetchAll()){
					if($row['Parent']){
						if($this->_user){
							
						}
					}elseif(!$row['Parent']){
						
					}
				}
			}
			return $result;
		}
	}
?>
