<?php
	class user{
		private $_db,$_cookie, $_data,$_rank, $_SessionName, $_logIn;
		public function __construct($user = null){
			$this->_db = db::getInstance();
			$this->_cookie = new Cookies();
			$this->_SessionName = config::get('session/Name');
			if(!$user){
				if(session::exsits($this->_SessionName)){
					$user = Session::get($this->_SessionName);
					if($this->find($user)){
						$this->_logIn = true;
					}else{
						//Log out
					}
				}
			}else{
				$this->find($user);
			}
		}
		public function login($username = null , $pass = null, $remember = false){
			if(!$username && !$pass && $this->exsits()){
				Session::put($this->_SessionName, $this->data()->id);
			}else{
				$user = $this->find();
				if($user){
					if($this->data()->Password === Hash::make($pass, $this->data()->salt)){
						Session::put($this->_SessionName, $this->data()->id);
						if($remember){
							$hash =  Hash::unique();
							$hashcheck = $this->_db->get('sessions', array('User_Id', '=', $this->data()->id));
							
							if(!$hashcheck->count()){
								$this->_db->insert('sessions', array(
										'User_Id' => $this->data()->id,
										'hash' => $hash,
								));
							}else{
								$hash = $hashcheck->first()->hash;
							}
							
							Cookies::put(config::get('cookie/type'), config::get('cookie/name').'_session', $hash, config::get('cookie/expire'));
							
						}
						return true;
					}
				}
			}
			return false;
		}
		
		public function logout(){
			session::delete($this->_SessionName);
			Cookies::cookieExpire($this->_cookieName);
		}
		
		public function find($user= null){
			if ($user){
				$field = (is_numeric($user)) ? 'id' : 'username';
				$data = $this->_db->get('users', array($field, '=', $user));
				
				if($data->count()){
					$this->_data = $data->first();
					return true;
				}
			}
			return false;
		}
		
		public function create($fields = array()){
			if(!$this->_db->insert('users', $fields)){
				throw new Exception(''); //TODO: make error
			}
		}
		public function isLoggedIn(){
			return $this->_logIn;
		}
		public function update($fields = array(), $id = NULL){
			
			if(!$id && $this->_logIn){
				$id = $this->data()->id;
			}
			
			if(!$this->_db->update('users', $id, $fields)){
				throw new Exception('There was a problem updating');
			}else{
				
			}
		}
		public function hasPermission($perms){
			$group = $this->_db->get('Rank', array("id",'=',"$this->data()->group"));
			if($group->count()){
				$permission = json_decode($group->first()->permissions);
				
				if($permission[$key] == true){
					return true;
				}
			}
			return false;
		}
		public function addFriend($user2){
			if($this->_logIn){
				if($this->find($user2)){
				$this->_db->insert('friends', array(
					'UserID' => $this->data->id,
					'FriendID' => $user2,
				));
				}
			}
		}
		public function data(){
			return $this->_data;
		}
		public function exsits(){
			return (!empty($this->_data)) ? true : false;
		}
		public function getRank(){
			return $this->_data->Rank;
		}
	}
?>
