<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for Country_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class Country_Model extends CI_Model {

	/**
	 * Constructor for the User_Model Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Get a list of country names
	 *
	 * This will return an array of country names for populating
	 * the select box
	 *
	 */

	function get_country_names() {
		$this -> db -> select('Id, Name');
		$query = $this -> db -> get('Country');

		return $query -> result_array();
	}

	// --------------------------------------------------------------------
}
?>