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
		
		if ( empty( $args ) ) {
			
			return $this->service->get();
			
		} else {
			
			if ( count( $args ) === 1 && key( $args ) === strtolower( get_class( $this ) ) . '_id' ) {
				return $this->service->getByParams( $args )[0];
			}
			
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