<?php

/**
* Entity Model
* @param User propertys
* @access public
*/
class UserModel {

	public $user_id;
	public $user_name;
	public $user_surname;
	
	public function User( $user_id = null, $user_name = null, $user_surname = null ) {
	
		$this->user_id = $user_id;
		$this->user_name = $user_name;
		$this->user_surname = $user_surname;

	}
	
	public function setId( $user_id ) {
	
		$this->user_id = $user_id;
	
	}
	
	public function setName( $user_name ) {
	
		$this->user_name = $user_name;
	
	}
	
	public function setSurname( $user_surname ) {
	
		$this->user_surname = $user_surname;
	
	}
	
}

?>