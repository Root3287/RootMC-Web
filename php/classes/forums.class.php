<?php 
	require 'db.class.php';
	class forum{
		public $db;
		public function __construct(){
			$this->db = new db();
			$this->db = $this->db->getInstance();
		}
		public function getTopics($rank, $cat){
			$data = $this->db->asc('topic', 'id');
			$n=0;
			foreach ($data as $topic){
				$n++;
			}
		}
	}
?>