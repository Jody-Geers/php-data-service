<?php


require_once( 'config/Config.php' );


/**
* Entity Service Shared Data Access
*/
Abstract class AbstractService {

	
	private $_dbConnection;
	
	
	public function AbstractService() {
	
		$_config = new Config();
	
		$this->_dbConnection = mysqli_connect( $_config::LINK, $_config::UN, $_config::PW, $_config::DB );
	
	}
	
	
	/**
	 * helper - creates array of model objects
	 * @param {dbresult} $resultSet
	 * @return {array} $returnArr
	 * @access private
	 */
	private function _createModelArrFromResultSet( $resultSet ) {
	
		$returnArr = array();
	
		while( $row = mysqli_fetch_array( $resultSet ) ) {
				
			// has to be set at child class
			$entity = new $this->model();
	
			foreach( $row as $key => $value ) {
					
				$arr = explode( '_', $key );
	
				if ( !empty( $arr[1] ) ) {
	
					$function = 'set' . ucfirst( $arr[1] );
						
					$entity->$function( $value );
						
				}
	
			}
				
			array_push( $returnArr, $entity );
				
		}
	
		return $returnArr;
		
	}


	/**
	 * helper - create model objects
	 * @param {obj} $obj
	 * @return {obj} $entity
	 * @access public
	 */
	public function createModelObj( $obj ) {
		
		// has to be set at child class
		$entity = new $this->model();
		
		foreach( $obj as $key => $value ) {
				
			$arr = explode( '_', $key );
		
			if ( !empty( $arr[1] ) ) {
		
				$function = 'set' . ucfirst( $arr[1] );
		
				$entity->$function( $value );
		
			}
		
		}
		
		return $entity;
		
	}


	/**
	 * get data from provider
	 * @param {obj} $args - Type based propertys
	 * @return {array} Type || {object} Type
	 * @access public
	 */
	public function get() {
		
		$returnArr = array();
		
		// model definition
		$modelName = ( property_exists( $this, 'modelName' ) )? $this->modelName : str_replace( 'Service', '', get_class( $this ) );
	
		// build sql
		$sql = 'SELECT * FROM ' . strtolower( $modelName );
		
		// execute and return model objects
		$returnArr = $this->_createModelArrFromResultSet( mysqli_query( $this->_dbConnection, $sql ) );
	
		return $returnArr;
	
	}
	
	
	/**
	 * get data from provider using params
	 * @param {obj} $args - Type based propertys
	 * @return {array} Type || {object} Type
	 * @access public
	 */
	public function getByParams( $args ) {
	
		$returnArr = array();
		
		// model definition
		$modelName = ( property_exists( $this, 'modelName' ) )? $this->modelName : str_replace( 'Service', '', get_class( $this ) );
		
		// where this = that
		$whereSqlBuilder = '';

		foreach ( $args as $key => $val ) {
				
			$whereSqlBuilder .= $key . ' = ' . $this->wrapValInParenthesis( $val ) . ' AND ';
				
		}
		$whereSqlBuilder = rtrim( $whereSqlBuilder, ' AND ' );
	
		// build sql
		$sql = 'SELECT * FROM ' . strtolower( $modelName ) . ' WHERE ' . $whereSqlBuilder;
	
		// execute and return model objects
		$returnArr = $this->_createModelArrFromResultSet( mysqli_query( $this->_dbConnection, $sql ) );
	
		return $returnArr;
	
	}


	/**
	 * Takes a string and decided whether it should be
	 * wrapped in '$val' based on its type / content.
	 * @param {string} $val
	 * @return {string} $val
	 * @access public
	 */
	public function wrapValInParenthesis( $val ) {
	
		// ints
		if ( is_numeric( $val ) ) {
				
			return "" . $val . "";
				
		}
	
		// special strings
		if ( ( $val == 'NOW()' ) || ( $val == 'true' ) || ( $val == 'false' ) ) {
	
			return "" . $val . "";
	
		}
			
		// use Parenthesis
		return "'" . $val . "'";
	
	}
	
	
}


?>
