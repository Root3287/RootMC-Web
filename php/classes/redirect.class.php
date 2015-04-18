<?php
	class Redirect{
		public function __construct($path=null){
			if($path !=null)
			{
				$this->to(path);
			}
		}
		public static function to($path=null){
			if($path !=null){
				header('Location: '.path);
				die();
			}
		}
	}
?>