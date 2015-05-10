<?php
class User {
	private $_db,
	$_data,
	$_sessionName,
	$_cookieName,
	$_isLoggedIn;
	public function __construct($user = null) {
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get('session/Name');
		$this->_cookieName = Config::get('Cookies/Name');
		if (!$user) {
			if (Session::exsits($this->_sessionName)) {
				$user = Session::get($this->_sessionName);
				if ($this->find($user)) {
					$this->_isLoggedIn = true;
				} else {
					//process logout
				}
			}
		} else {
			$this->find($user);
		}
	}
	public function update($fields = array(), $id = null) {
		if(!$id && $this->isLoggedIn()) {
			$id = $this->data()->Id;
		}
		if(!$this->_db->update('users', $id, $fields)) {
			throw new Exception("There was a problem updating");
				
		}
	}
	public function create($fields = array()) {
		if ($this->_db->insert('users', $fields)) {throw new Exception('There was a problem creating an account.');}
	}
	public function find($user = null) {
		if ($user) {
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('users', array($field, '=', $user));
			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}
	public function login($username = null, $password = null, $remember = false) {
		if (!$username && !$password && $this->exists()) {
			Session::put($this->_sessionName, $this->data()->Id);
		} else {
			$user = $this->find($username);
			if ($user) {

				if ($this->data()->Password === Hash::make($password, $this->data()->Salt)) {
					Session::put($this->_sessionName, $this->data()->Id);
						
					if ($remember) {
						$hashcheck = $this->_db->get('sessions', array('Id', '=', $this->data()->Id));
						if (!$hashcheck->count()) {
							$hash = Hash::unique();
							$this->_db->insert('sessions', array(
									'id' => $this->data()->Id,
									'Hash' => $hash));
						} else {$hash = $hashcheck->first()->Hash;}
						Cookie::put($this->_cookieName, $hash, Config::get('Cookies/Expire'));
					}
					return true;
				}
			}
		}
		return false;
	}
	public function hasPermission($key) {
		$group = $this->_db->get('ranks', array('id', '=', $this->data()->Rank));
		if ($group->count()); {
			$permissions = json_decode($group->first()->permissions, true);
			if ($permissions[$key] == true) {
				return true;
			}
		}
		return false;
	}

	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}
	public function logout() {
		$this->_db->delete('sessions', array('id', '=', $this->data()->Id));

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}
	public function data() {
		return $this->_data;
	}
	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}
}
?>
