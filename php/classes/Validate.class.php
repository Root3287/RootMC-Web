<?php
class Validate{
	private $_passed = false,
			$_errors = array(),
			$_db =null;
	public function __construct(){
		$this->_db = db::getInstance();
	}
	public function check($source, $items = array()){
		foreach ($items as $item => $rules){
			foreach ($rules as $rule => $rule_value){
				$value = trim($source['item']);
				$item = escape($item);
				
				if($rule == 'required' && empty($value)){
					$this->addError("$item is required");
				}else{
					switch ($rule){
						case 'min':
							if(strlen($value) < $rule_value){
								$this->addError(""); //TODO: add error useing $item and $rule_value
							}
						break;
						case 'max':
							if(strlen($value)> $rule_value){
								$this->addError(""); //TODO: add error
							}
						break;
						case 'maches':
							if($value != $source[$rule_value]){
								$this->addError(""); //TODO: add error
							}
						break;
						case 'unique':
							$check = $this->_db->get($rule_value, array($item, '=', $value));
							
							if($check->count()){
								$this->addError(""); //TODO: add error
							}
						break;
					}
				}
			}
		}
		
		if(empty($this->_errors)){
			$this->_passed = true;
		}
		return $this;
	}
	public function pass(){
		return $this->_passed;
	}
	private function addError($error){
		$this->_errors[] = $error;
	}
	public function errors(){
		return $this->_errors;
	}
}
?>