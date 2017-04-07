<?php


/**
* Shared public controller API
*/
Abstract class AbstractController {

	
	/**
	* Gets Type Data
	* @param {obj} $args - Type
	* @return {array} Type || {obj} Type
	* @access public
	*/
	public function doGet( $args ) {
		
		// validation - remove foreign propertys
		$typeReqObj = $this->service->createModelObj( $args );
		
		if ( empty( $args ) ) {
			
			// get all
			return $this->service->get();
			
		} else {
			
			// get by primary key
			if ( count( $args ) === 1 && key( $args ) === strtolower( get_class( $this ) ) . '_id' ) {
				return $this->service->getByParams( $args )[0];
			}
			
			// get by params
			return $this->service->getByParams( $args );
			
		}
		
	}
	
	
	/**
	 * Saves Type Data
	 * @param {obj} $args - Type
	 * @return {object} Type
	 * @access private
	 */
	public function doPost( $args ) {
	
		// set
		// then
		// get by primary key
		// return obj
	
	}
	
	
}


?>
