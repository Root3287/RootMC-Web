<?php 
	class forums{
		private $_user, $_db;
		public function __construct(){
			$this->_db = db::getInstance(); 
		}
		public function newTopic($catID, $title, $content, $author){
			$this->_db->query("INSERT INTO topics(CId, Title, Content, Author) VALUES (\"$catID\" , \"$title\", \"$content\", \"$author\")");
		}
		public function newReply($tid, $title, $content, $author){
			$data = $this->_db->query("INSERT INTO reply(TId, Title, Content, Author, Time) VALUES (\"$tid\",\"$title\",\"$content\",\"$author\")")->result();
		}
		public function getCat($rank=null){
			if($rank == null){
				$group = 0;
			}
			$return = array();
			$n = 0;
			$cataccess= $this->_db->query('SELECT * FROM cat_perms')->results();
			foreach($cataccess as $perm){
				$cats = $this->_db->get('category')->results();
				foreach ($cats as $cat){
					if($perm->Cat_id == $cat->id){// MATCHES THE CAT WITH THE PERM
						if($perm->view_access == 1){// EVERONE CAN VIEW
							$return[$n]['Title'] = $cat->Cat_Title;
							$return[$n]['Order'] = $cat->Cat_Order;
							if($cat->Parent == 1){ // IF it is the parent
								$return[$n]['Parent'] = true;
							}else{ // IF ITS NOT THE PARENT
								$return[$n]['Parent']=  false;
							}
						}
					}
				}
				$n++;
			}
			return $return;
		}
		
		public function getTopics($group_id, $topic_id){
			$topics = $this->_db->get('topic', array('id','=',$topic_id));
			
			$return = array();
			$n = 0;
			foreach($topics as $topic){
				$n++;	
			}
		}
	}
?>
