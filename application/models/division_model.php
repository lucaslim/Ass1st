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

		$this -> db -> select('ConferenceId, ConferenceName, DivisionId, DivisionName, Id, Name');
		$this -> db -> from('AllTeams');

		$query = $this -> db -> get();
		
		return $query -> result();
	}

	// --------------------------------------------------------------------

	// --------------------------------------------------------------------

	/**
	 * Get Team by Id
	 *
	 * Retrieves all the division names based on id (1 = east, 2 = west)
	 *
	 */
	function get_team_by_id($id) {

		// set where clause
		$this -> db -> where('Team.Id', $id);

		$this -> db -> select('Team.Name AS tname, Team.Founded AS tfounded, Team.Picture AS tpicture, Arena.Name AS aname, Division.Name AS dname');
		$this -> db -> from('Team');
		$this -> db -> join('Arena', 'Arena.Id = Team.ArenaId');
		$this -> db -> join('Division', 'Division.Id = Team.DivisionId');

		$query = $this->db->get();

		//Check if any rows returned
		if (!$query || $query -> num_rows() <= 0)
			return FALSE;
		
		return $query -> row();
	}

	// --------------------------------------------------------------------
}