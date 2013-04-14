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
	 * Get Seasons
	 *
	 * Retrieves all seasons currently stored in the database
	 *
	 */
	function get_seasons() {

		$this -> db -> select('Id, YearFrom, YearTo');
		$this -> db -> from('Season');

		$query = $this -> db -> get();
		
		return $query -> result();
	}	

	// --------------------------------------------------------------------
	/**
	 * Get Arenas
	 *
	 * Retrieves all arenas currently stored in the database
	 *
	 */
	function get_arenas() {

		$this -> db -> select('Id, Name, Description');
		$this -> db -> from('Arena');

		$query = $this -> db -> get();
		
		return $query -> result();
	}

	// --------------------------------------------------------------------
	/**
	 * Get Match Type
	 *
	 * Retrieves the type of matches available in the db
	 *
	 */
	function get_match_types() {

		$this -> db -> select('Id, Name');
		$this -> db -> from('MatchType');

		$query = $this -> db -> get();
		
		return $query -> result();
	}	

	// --------------------------------------------------------------------
	/**
	 * Get Standings
	 *
	 * Retrieves the standings for the various divisions
	 *
	 */
	function get_standings() {

		$query = $this -> db -> get('AllTeamStandings');
		
		return $query -> result();
	}

	// --------------------------------------------------------------------

	// --------------------------------------------------------------------
	/**
	 * Get Team by Id
	 *
	 * Retrieves team by ID
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

	/**
	 * Get Teams
	 *
	 * Retrieves a list of the teams
	 *
	 */
	function get_teams() {

		// set where clause
		$this -> db -> select('Id, Name');
		$this -> db -> from('AllTeams');

		$query = $this->db->get();

		//Check if any rows returned
		if (!$query || $query -> num_rows() <= 0)
			return FALSE;
		
		return $query -> result();
	}	

	// --------------------------------------------------------------------

	/**
	 * Get Teams Based on League
	 *
	 * Retrieves a list of teams based on the league
	 *
	 */

	function get_all_teams_by_league($leagueId) {

		$this -> db -> select('Id, Name, ArenaId');
		$this -> db -> where('LeagueId' , $leagueId);
		$query = $this -> db -> get('AllTeams');

		if ($query -> num_rows() > 0) {
			return $query -> result_array() ;
		} else {
			return false;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Get Team Roster by Id
	 *
	 * Retrieves the roster for the team specified
	 *
	 */
	function get_team_roster_by_id($id) {

		// set where clause
		$this -> db -> where('AllRosters.TeamId', $id);

		$this -> db -> select('*');
		$this -> db -> from('AllRosters');

		$query = $this->db->get();

		//Check if any rows returned
		if (!$query || $query -> num_rows() <= 0)
			return FALSE;
		
		return $query -> result();
	}

	// --------------------------------------------------------------------	
}