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
	/**
	 * Get Team Roster
	 *
	 * Get a list of all the users on a team
	 *
	 */

	function get_team_roster($teamid){
		$this -> db -> where('TeamId', $teamid);
		$query = $this -> db -> get('AllRosters');

		return $query -> result();
	}	

	// --------------------------------------------------------------------
	/**
	 * Delete User From Roster
	 *
	 * Delete user from the team roster
	 *
	 */

	function delete_user_from_roster($playerid, $teamid) {
		$this -> db -> where('TeamId', $teamid);
		$this -> db -> where('UserId', $playerid);

		return $this -> db -> delete('Roster');
	}

	// --------------------------------------------------------------------
	/**
	 * Save Team Image
	 *
	 * Update the database with the new image title
	 *
	 */
	function save_team_image($teamid, $image) {
		
		$this -> db -> set('Picture', $image);
		$this -> db -> where('Id', $teamid);
		$this -> db -> update('Team');
	}	

	// --------------------------------------------------------------------
	/**
	 * Update Team Roster
	 *
	 * Update the team roster jersey numbers and captain status
	 *
	 */

	function update_team_roster($players) {
		$data = array();

		foreach($players as $player)
		{
			// Default captain to 0
			$captain = 0;

			// If captain is checked, then change to 1
			if(isset($player['Captain']))
				$captain = 1;

			// Build array of data to process update
			$array = array(
				'UserId' => $player['Id'],
				'SeasonId' => 1,
				'TeamId' => $player['TeamId'],
				'JerseyNo' => $player['JerseyNo'],
				'Captain' => $captain
			);

			array_push($data, $array);
		}	

		// Codeigniter has a bug, update_batch does not return true / false
		// instead returns NULL or FALSE only
		return $this -> db -> update_batch('Roster', $data, 'UserId');
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