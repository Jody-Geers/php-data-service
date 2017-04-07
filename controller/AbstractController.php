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
		
		if ( empty( $typeReqObj ) ) {
			
			// get all
			return $this->service->get();
			
		} else {
			
			// get by primary key
			if ( count( $typeReqObj ) === 1 && key( $typeReqObj ) === strtolower( get_class( $this ) ) . '_id' ) {
				return $this->service->getByParams( $typeReqObj )[0];
			}
			
			// get by params
			return $this->service->getByParams( $typeReqObj );
			
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
