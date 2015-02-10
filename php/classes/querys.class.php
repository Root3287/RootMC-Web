<?php
class Queries{
	public $_db;
	public function __construct(){
		$this->_db = DB::getInstance;
	}
	
}
?>