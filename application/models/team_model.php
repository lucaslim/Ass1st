<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

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
class Team_Model extends CI_Model {

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
	 * Authenticates user based on given password and email address.
	 *
	 * This function will make sure that at least one value is return
	 * upon querying the database. If not it will return false.
	 *
	 */

	function get_all_teams() {

		$this -> db -> select('Id, Name, ArenaId');
		$this -> db -> where('LeagueId' , 1);
		$query = $this -> db -> get('AllTeams');

		if ($query -> num_rows() > 0) {
			return $query -> result_array() ;
		} else {
			return false;
		}
	}

	// --------------------------------------------------------------------
}
?>