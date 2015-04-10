<?php
class blog{
	public $db;
	public function __construct(){
		$this->db = db::getInstance;
	}
	public function getPost(){
		$posts = $this->db->query("SELECT * FROM blog")->result();
		$return = array();
		$n = 0;
		foreach($posts as $post){
			$return[$n]['Title'] = $post['Title'];
			$return[$n]['Content'] = $post['Content'];
			$return[$n]['Date'] = $post['Date'];
			$return[$n]['Author'] = $post['Author'];
			$n++;
		}
	}
	public function createNew($title, $content, $author){
		
	}
	public function deletePost($id){
		
	}
	public function editPost($id, $title, $content){
		
	}
}
