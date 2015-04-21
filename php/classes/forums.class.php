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
			$return = array();
			$n = 0;
			$categoies = $this->_db->get('categories', array('view_access', '=' , ''));
		}
		
		public function getTopics($group_id, $cat_id){

		}
	}
?>
