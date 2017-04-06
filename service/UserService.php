<?php


require_once( 'AbstractService.php' );
require_once( 'model/UserModel.php' );


/**
* Entity Service Layer
* @access public
*/
class UserService extends AbstractService {

	
	public $model;
	
	
	public function UserService() {
		
		parent::__construct();
		
		$this->model = new UserModel();
		
	}

	
}


?>