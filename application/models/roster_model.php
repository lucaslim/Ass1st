<?php
if (!defined('BASEPATH'))	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for User_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class Roster_Model extends CI_Model {

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
	 * Get all teams
	 *
	 * This function will make sure that at least one value is return
	 * upon querying the database. If not it will return false.
	 *
	 */

	function add_roster($data) {

		$query = $this -> db -> insert('Roster', $data);

		return $this -> db -> insert_id();
	}
}