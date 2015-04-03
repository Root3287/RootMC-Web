<?php 
	class forums{
		public $db;
		private $_user;
		public function __construct(){
			$this->db = db::getInstance();
		}
		public function newTopic($catID, $title, $content, $author){
			$this->db->query("INSERT INTO topics(CId, Title, Content, Author) VALUES ($catID , $title, $content, $author)");
		}
		public function newReply($tid, $title, $content, $author){
			//$this->db->query("INSERT INTO reply()")
		}
		public function getCat($rank=null){
			$access = $this->db->query("SELECT * FROM forums_perms")->result();
			$categorie = $this->db->query("SELECT * FROM categories")->result();
			$rank = $this->db->query("SELECT * FROM ranks")->result();
			
			if($rank == "0" || $rank==null){
				$group_id = 'g';
			}
			
			$return = array();
			
			foreach ($access as $cataccess){
				foreach ($ranks as $groupRank){
					if($groupRank->rank == 'a'){ //ADMIN
						$FinalRank = "a"; 
					}elseif ($groupRank->rank == 'd'){ //Donor
						$FinalRank = "d";
					}elseif ($groupRank->rank == 's'){ //Special
					 	$FinalRank = "s";
					}elseif ($groupRank->rank == 'm'){ //Member
						$FinalRank = "m";
					}
					
					foreach ($categorie as $cat){
						if($group_id == $FinalRank){
							if($cataccess->view == 1){
								if($categorie->parent == 1){
						
								}else{
						
								}
							}
						}
					}
				}
				return $return;
			}
		}
	}
?>
