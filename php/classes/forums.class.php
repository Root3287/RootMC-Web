<?php
	class forums{
		public $_db, $_query;
		public function __construct(){
			$this->_db = db::getInstance();
			$this->_query = new Queries();
		}
		public function getCategories($groupid = null){
			$data = $this->_db->orderAll('cat', 'COrder', 'ASC')->results();
			if(!empty($data)){
				$result = array();
				$n = 0;
				foreach($data as $cat){
					if($cat->Parent == '0'){
						if($groupid == 1){
							if($cat->view_access == '0'){
								$result[$n]['id'] = $cat->id;
								$result[$n]['title'] = $cat->Title;
								$result[$n]['desc'] = $cat->CDesc;
								$result[$n]['parent'] = 'true';
							}
						}else if($groupid == 2){
							$result[$n]['id'] = $cat->id;
							$result[$n]['title'] = $cat->Title;
							$result[$n]['desc'] = $cat->CDesc;
							$result[$n]['parent'] = 'true';
						}elseif ($groupid == 3){
							if($cat->view_access == '0'){
								$result[$n]['id'] = $cat->id;
								$result[$n]['title'] = $cat->Title;
								$result[$n]['desc'] = $cat->CDesc;
								$result[$n]['parent'] = 'true';
							}
						}
					}else{
						if($groupid !=null){
							if($groupid == '0'){
								$results[$n]["id"] = $cat->id;
								$results[$n]["title"] = htmlspecialchars($cat->Title);
								$results[$n]["desc"] = $cat->CDesc;
								$results[$n]["last_post_date"] = $cat->lastPostDate;
								$results[$n]["last_post_user"] = $cat->lastUserPost;
								$results[$n]["last_post_topic"] = $cat->lastPosted;
							}else if($groupid == '1'){
								$results[$n]["id"] = $cat->id;
								$results[$n]["title"] = htmlspecialchars($cat->Title);
								$results[$n]["desc"] = $cat->CDesc;
								$results[$n]["last_post_date"] = $cat->lastPostDate;
								$results[$n]["last_post_user"] = $cat->lastUserPost;
								$results[$n]["last_post_topic"] = $cat->lastPosted;
							}else if($groupid == '2'){
								$results[$n]["id"] = $cat->id;
								$results[$n]["title"] = htmlspecialchars($cat->Title);
								$results[$n]["desc"] = $cat->CDesc;
								$results[$n]["last_post_date"] = $cat->lastPostDate;
								$results[$n]["last_post_user"] = $cat->lastUserPost;
								$results[$n]["last_post_topic"] = $cat->lastPosted;
							}	
						}
					}
					$n++;
				}
			}
			return $result;
		}
		
		public function getForums(){
			$data = $this->_query->orderAll('cat', 'ASC');
			if(!empty($data)){
				$result = array();
				$n = 0;
				foreach($data as $cat){
					$result[$n]['id'] = $cat->id;
					$result[$n]['title'] = $cat->CAT_TITLE;
					$result[$n]['desc'] = $cat->CAT_DESC;
					$n++;
				}
			}
			return $result;
		}
		public function newThread($fid, $title, $content, $type, $Orignal_Post){
			
		}
	}
?>
