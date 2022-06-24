<?php 

class Validator {

	private $data;
	private $errors = [];
	private static $fieldsRegister = ['username', 'password'];
	private static $fieldsLogin = ['username', 'password'];

	public function __construct($post_data) {
		$this->data = $post_data;
	}

	public function validateRegisterForm(){

		foreach(self::$fieldsRegister as $field) {
			if(!array_key_exists($field, $this->data)) {
				trigger_error("$field can't be empyt");
				return;
			}
		}
		$this->validateUsername(); 
		$this->validatePassword(); 
		return $this->errors; 
	}

	public function validateLoginForm(){

		foreach(self::$fieldsLogin as $field) {
			if(!array_key_exists($field, $this->data)) {
				trigger_error("$field can't be empyt");
				return;
			}
		}
		$this->validateUsername(); 
		$this->validatePassword(); 
		return $this->errors; 
	}

	private function validateUsername() {

		$val = trim($this->data['username']);

		if(empty($val)){
			$this->addError('username', 'username cannot be empty');
		} else {
			if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
				$this->addError('username', 'username must be 6-12 chars & alphanumeric');
			} else {
				// Username passed!
			}
		}
	}

	private function validatePassword() {

		$val = trim($this->data['password']);

		if(empty($val)){
			$this->addError('password', 'password cannot be empty');
		} else {
			if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)){
				$this->addError('password', 'username must be 6-12 chars & alphanumeric');
			} else {
				// Password passed!
			}
		}
	}

	/*private function validateEmail() {

		$val = trim($this->data['email']);

		if(empty($val)){
			$this->addError('email', 'email cannot be empty');
		} else {
			if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
				$this->addError('email', 'email must be a valid email');
			} else {
				// Email passed!
			}
		}

	}*/

	private function addError($key, $val) {
		$this->errors[$key] = $val;
	}
		

}

?>
