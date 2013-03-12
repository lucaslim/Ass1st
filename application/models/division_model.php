<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for Division_Profile class.
 * This is where all the functions talks to the
 * database.
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class Division_Model extends CI_Model {

	/**
	 * Constructor for the Division_Profile Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

	}

	// --------------------------------------------------------------------

	/**
	 * Get Conference Profile
	 *
	 * Retrieves all the division names based on id (1 = east, 2 = west)
	 *
	 */
	function get_divisions() {

		$this -> db -> select('Id, Name, DivisionName, ConferenceName');
		$this -> db -> from('AllTeams');

		$query = $this -> db -> get();
		
		return $query -> result();
	}

	// --------------------------------------------------------------------

}