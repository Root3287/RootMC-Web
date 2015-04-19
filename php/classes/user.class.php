<?php
	class user{
		public $db;
		private $_cookie, $_data, $_logIn,$_rank;
	
		public function __construct(){
			$this->db = db::getInstance();
			$this->_cookie = new Cookies();
		}
		public function getRank(){
			$q = $this->db->query("SELECT RankId FROM Users");
			$this->_rank = $q->result();
			$this->_data = $this->_rank;
			return $this;
		}
		public function login($user = null , $pass = null, $remember = false){
			if($user !=null && $pass !=null){
				$prepare = $this->db->connect()->getConnection()->prepare("SELECT * FROM user WHERE UserName=?");
				$prepare->bindParam(1, $user);
				$prepare->execute();
				
			}
		}
		public function create($fields = array()){
			if(!$this->db->insert('user', $fields)){
				throw new Exception(''); //TODO: make error
			}
		}
		public function isLoggedIn(){
			$return = false;
			if(($this->_logIn)&&(Cookies::isCookieSet('Session_Id'))){
				$connection = $this->_db->query('SELECT * FROM connections WHERE Ip='.$_SERVER['REMOTE_ADDR'])->result();
				foreach($connection as $conn){
					if($conn['Ip'] == $_SERVER['REMOTE_ADDR']){
						if(time()<$conn['Exspire']){
							$return = true;
						}else{
							$return = false;
						}
					}else{
						$return = false;
					}
				}
				
			}else{
				$return = false;
			}
			$this->_logIn = $return;
			$this->_data = $this->_logIn;
			return $this;
		}
		public function userExsit($username){
			$q = $this->db->getConnection()->prepare("SELECT UserName FROM UserName WHERE UserName = ?");
			$q->bindParam(1, $username);
			$q->execute();
		}
		public function data(){
			return $this->_data;
		}
		public function exsits(){
			return (!empty($this->_data)) ? true : false;
		}
	}
?>
