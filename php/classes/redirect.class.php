<?php
	class Redirect{
		public function __construct($path){
			$this->to($path);
		}
		public function to($path){
			if($path !=null){
				header('Location: '.$path);
			}
		}
	}
?>