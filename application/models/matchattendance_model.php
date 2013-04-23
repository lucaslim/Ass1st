<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );

/**
 * Assist
 *
 * This model is used when the Scorekeeper talks to
 * the database. It contains functions for creating, editing
 * and deleting a game from the MatchFixture.
 *
 *
 * @package  Assist
 * @author  Team Assist
 */

// ------------------------------------------------------------------------
class MatchAttendance_Model extends CI_Model {

	/**
	 * Constructor for the Division_Profile Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */

	function __construct() {
		parent::__construct();
	}

	// ------------------------------------------------------------------------

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

	// --------------------------------------------------------------------

	/**
	 * Set Match Attendance
	 *
	 * This will check whether the team is playing in that fixture
	 *
	 */

	function set_match_attendance($data) {
		//Check if match attendance already set
		$this->db->where('MatchFixtureId', $data["MatchFixtureId"]);
		$this->db->where('TeamId', $data["TeamId"]);
		$this->db->where('UserId', $data["UserId"]);

		$query = $this -> db -> get('MatchAttendance');

		//If record already exist
		if($query -> num_rows() > 0) {
			$row = $query -> row();

			//Update record
			$this->db->where('ID', $row -> ID);
			$this->db->update('MatchAttendance', $data);

			return true;
		}
		else {
			//Insert new record
			$this->db->insert('MatchAttendance', $data);

			return true;
		}

		return false;

	}
	// --------------------------------------------------------------------
}

?>
