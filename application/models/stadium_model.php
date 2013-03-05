<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for Stadium_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class Stadium_Model extends CI_Model {

	/**
	 * Constructor for the Stadium_Model Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Get a list of stadium data
	 *
	 * This will return an array of stadium data for populating
	 * the google map
	 *
	 */

	function get_stadium_data() {
		//$this -> db -> select('Id, Name');
		$query = $this -> db -> get('Arena');

		return $query -> result_array();
	}

	// --------------------------------------------------------------------
}
?>