<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This model is used when the Scorekeeper talks to
 * the database. It contains functions for creating, editing
 * and deleting a game from the MatchFixture.
 *
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class MatchFixture_Model extends CI_Model {

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
	 * Generate Season Fixture
	 *
	 * This function will remove all season fixture and re-insert a new 
	 * generated fixture
	 *
	 */
	function get_match_fixture_by_id($id){
		//Remove season fixture
		$this -> db -> where('Id', $id);
		$query = $this -> db -> get('MatchFixture');

		return $query -> row();
	}

	// ------------------------------------------------------------------------

	/**
	 * Generate Season Fixture
	 *
	 * This function will remove all season fixture and re-insert a new 
	 * generated fixture
	 *
	 */
	function generate_season_fixture($season_fixture, $season_id){
		//Remove season fixture
		$this -> remove_season_fixture_by_id($season_id);

		$this -> db -> insert_batch('MatchFixture', $season_fixture);
	}

	// ------------------------------------------------------------------------

	/**
	 * Generate Season Fixture
	 *
	 * This function will remove all season fixture and re-insert a new 
	 * generated fixture
	 *
	 */

	function remove_season_fixture_by_id($season_id) {
		$this -> db -> where('MatchTypeId', 3);
		$this -> db -> where('SeasonId', $season_id);

		$this -> db -> delete('MatchFixture');
	}

	// ------------------------------------------------------------------------

	/**
	 * Is Team Playing
	 *
	 * This will check whether the team is playing in that fixture
	 *
	 */

	function is_team_playing($match_fixture_id, $team_id) {
		$this -> db -> where('Id', $match_fixture_id);
		$this -> db -> where('HomeTeamId', $team_id);
		$this -> db -> or_where('AwayTeamId', $team_id);

		$query = $this -> db -> get('MatchFixture');

		return $query -> num_rows() > 0;
	}

	// --------------------------------------------------------------------
}

?>