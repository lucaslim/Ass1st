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
}

?>