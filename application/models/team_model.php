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
	 * Get all teams
	 *
	 * This function will make sure that at least one value is return
	 * upon querying the database. If not it will return false.
	 *
	 */

	function get_all_teams_by_league_id($league_id) {

		$this -> db -> select('Id, Name, ArenaId');
		$this -> db -> where('LeagueId' , $league_id);
		$this -> db -> order_by('Name', 'Asc');
		$query = $this -> db -> get('AllTeams');

		if ($query -> num_rows() > 0) {
			return $query -> result() ;
		} else {
			return false;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Get all teams
	 *
	 * This function will make sure that at least one value is return
	 * upon querying the database. If not it will return false.
	 *
	 */

	function get_teams_by_user_id($user_id) {
		$this -> db -> where('UserId', $user_id);
		$query = $this -> db -> get('AllRosters');

		return $query -> result();
	}

	// --------------------------------------------------------------------

	/**
	 * Get All Team Name
	 *
	 * Get all Team Name
	 *
	 */

	function get_all_team_name(){
		$this -> db -> select('Id, Name');
		$query = $this -> db -> get('Team');

		return $query -> result();
	}

	// --------------------------------------------------------------------

	function add_team($data) {
		$query = $this -> db -> insert('Team', $data);

		return $this -> db -> insert_id();
	}

	function get_team_by_id($team_id) {
		$this -> db -> where('Id', $team_id);

		return $this -> db -> get('AllTeams') -> row();
	}

}
?>