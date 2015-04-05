<?php 
	class forums{
		public $db;
		private $_user;
		public function __construct(){
			$this->db = db::getInstance();
		}
		public function newTopic($catID, $title, $content, $author){
			$this->db->query("INSERT INTO topics(CId, Title, Content, Author) VALUES (\"$catID\" , \"$title\", \"$content\", \"$author\")");
		}
		public function newReply($tid, $title, $content, $author){
			$data = $this->db->query("INSERT INTO reply(TId, Title, Content, Author, Time) VALUES (\"$tid\",\"$title\",\"$content\",\"$author\")")->result();
		}
		public function getCat($rank=null){
			$access = $this->db->query("SELECT * FROM forums_perms")->result();
			$categories = $this->db->query("SELECT * FROM categories")->result();
			$rank = $this->db->query("SELECT * FROM ranks")->result();
			
			if($rank == "0" || $rank==null){
				$group_id = 'g';
			}
			
			$return = array();
			$n = 0;
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
					
					foreach ($categories as $cat){
						if($group_id == $FinalRank){
							if($cataccess->view == 1){
								if($categories->parent == 1){
									$return[$n]['ID'] = $categories->id;
									$return[$n]['Name'] = $categories->Cat_Title;
									$return[$n]['Desc'] = $categories->Cat_Desc;
									$return[$n]['Parent'] = true;
								}else{
									$return[$n]['ID'] = $categories->id;
									$return[$n]['Name'] = $categories->name;
									$return[$n]['Desc'] = $categories->Cat_Desc;
									$return[$n]['Parent'] = false;
								}
							}
						}
					}
					$n++;
				}
				return $return;
			}
		}
		
		public function getTopics($group_id, $cat_id){
			if($cat_id !=null){
				$Topics = $this->db->query("SELECT * FROM Topics WHERE Cid=\"$cat_id\"")->result();
				$return = array();
				$n = 0;
				foreach ($Topics as $list){
					$topic_pref = $this->db->query("SELECT * FROM Topics WHERE Tid=\'$list->id\'");
					foreach ($topic_pref as $pref){
						/*
						 * ASSIGN TOPICS TO $return[$n];
						 * ADD TO LIST:
						 * ID
						 * TItle
						 * Content
						 * Perf
						 */
					}
					$n++;		
				}
			}
		}
	}
?>
