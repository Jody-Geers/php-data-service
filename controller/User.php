<?php


require_once( 'AbstractController.php' );
require_once( 'service/UserService.php' );


/**
* Class
* @access public
*/
class User extends AbstractController {

	
	public $isPublic = null;
	public $canGetAll = null;
 	public $service = null;
	
	
	public function User () {
	
		$this->isPublic = true;
		$this->canGetAll = true;
 		$this->service = new UserService();
		
	}

	
// 	/**
// 	* Gets User Data
// 	* @param {obj} $args - User
//	* @return {array} User || {obj} User
// 	* @access public
// 	*/
// 	public function doGet( $args ) {
			
// 		return $this->_service->get( $args );

// 	}
	
	
	/**
	 * Saves User Data
	 * @param {obj} $args - User
	 * @return {object} User
	 * @access private
	 */
	public function doPost( $args ) {
		
		// not accessible
		return ( object )array( 'err' => 'HTTP/1.1 403 Forbidden', 'errCode' => 403 );
		
	}
	
	
}


?>
