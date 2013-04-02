<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for MatchAttendance_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class MatchAttendance_Model extends CI_Model {

	/**
	 * Constructor for the MatchAttendance_Model Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> helper("grid_helper");
	}

	// --------------------------------------------------------------------

	/**
	 * Get Attendance based on Id
	 *
	 * This will return the information based on the selected Id
	 *
	 */
	function get_MatchAttendance_by_id($id) {
		//Set where clause
		$this -> db -> where('ID', $id);
		
		//Execute select statement
		$query = $this -> db -> get("MatchAttendance");

		//Check if any rows returned
		if (!$query || $query -> num_rows() <= 0)
			return FALSE;

		return $query -> row();
	}

	// --------------------------------------------------------------------

	/**
	 * Update Attendance
	 *
	 * This allows administrator to update the attendance to the database.
	 *
	 */

	function update_MatchAttendance($id, $data) {

		//Set where clause
		$this -> db -> where('ID', $id);

		//update database
		return $this -> db -> update('MatchAttendance', $data);

	}

	// --------------------------------------------------------------------

	/**
	 * Insert Attendance
	 *
	 * This allows to add attendance to the database.
	 *
	 * This function will return the new attendance id if inserted successfully
	 *
	 */

	function add_MatchAttendance($data) {
		//insert into database
		$this -> db -> insert('MatchAttendance', $data);

		//Get returned Id
		$return_id = $this -> db -> insert_id();

		return $return_id;
	}

}
