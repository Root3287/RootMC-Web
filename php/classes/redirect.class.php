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
				if(is_numeric($path)){
					switch ($path){
						case 404:
							header('HTTP/1.0 404 Not Found');
							include 'pages/Errors/404/index.php';
						break;
					}
				}
				header('Location: '.$path);
				die();
			}
		}
	}
?>