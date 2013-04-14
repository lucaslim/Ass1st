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
class MatchFixture_Model extends CI_Model {

	/**
	 * Constructor for the Division_Profile Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */

	function __construct() {
		parent::__construct();

		$this -> load -> helper( "grid_helper" );
	}

	// ------------------------------------------------------------------------

	/**
	 * Get total match fixture summary count
	 *
	 * Get the total number of rows in users all users table
	 *
	 */
	function get_match_fixture_count() {
		return get_row_count( "MatchFixtureSummary" );
	}

	// --------------------------------------------------------------------

	/**
	 * Match Fixture Summary List
	 *
	 * This function will retrieve a list of league, season and check if data has
	 * already been generated
	 *
	 */
	function get_match_fixture_summary( $total_num, $start_num ) {

		$option = array( 'table_name' => 'MatchFixtureSummary',
			'start_number' => $start_num,
			'total_number' => $total_num );

		return get_result( $option );
	}

	// ------------------------------------------------------------------------

	/**
	 * Match Fixture Summary List
	 *
	 * This function will retrieve a list of league, season and check if data has
	 * already been generated
	 *
	 */
	function get_match_fixture_summary_by_id( $league_id, $season_id ) {

		$this -> db -> where( 'LeagueId', $league_id );
		$this -> db -> where( 'SeasonId', $season_id );

		$query = $this -> db -> get( 'MatchFixtureSummary' );

		if ( $query -> num_rows() > 0 )
			return $query -> row();
		else
			return null;
	}

	// ------------------------------------------------------------------------

	/**
	 * Get match fixture by id
	 *
	 * This function will return a single match fixture based on the given id
	 *
	 */
	function get_match_fixture_by_id( $id ) {
		//Remove season fixture
		$this -> db -> where( 'Id', $id );
		$query = $this -> db -> get( 'MatchFixture' );

		return $query -> row();
	}

	// ------------------------------------------------------------------------

	/**
	 * Get match fixture by id
	 *
	 * This function will return a single match fixture based on the given id
	 *
	 */
	function get_season_fixture_by_id( $season_id, $league_id ) {
		//Remove season fixture
		$this -> db -> where('SeasonId', $season_id);
		$this -> db -> where('LeagueId', $league_id);
		$this -> db -> order_by('Date', 'asc');
		$query = $this -> db -> get( 'AllFixtures' );

		return $query -> result();
	}

	// ------------------------------------------------------------------------

	/**
	 * Generate Season Fixture
	 *
	 * This function will remove all season fixture and re-insert a new
	 * generated fixture
	 *
	 */
	function generate_season_fixture( $season_fixture, $season_id, $league_id ) {
		//Remove season fixture
		$this -> remove_season_fixture_by_id( $season_id, $league_id );

		$this -> db -> insert_batch( 'MatchFixture', $season_fixture );
	}

	// ------------------------------------------------------------------------

	/**
	 * Generate Season Fixture
	 *
	 * This function will remove all season fixture and re-insert a new
	 * generated fixture
	 *
	 */

	function remove_season_fixture_by_id( $season_id, $league_id ) {
		$this -> db -> where( 'MatchTypeId', 3 );
		$this -> db -> where( 'SeasonId', $season_id );
		$this -> db -> where( 'LeagueId', $league_id );

		$this -> db -> delete( 'MatchFixture' );
	}

	// ------------------------------------------------------------------------

	/**
	 * Is Team Playing
	 *
	 * This will check whether the team is playing in that fixture
	 *
	 */

	function is_team_playing( $match_fixture_id, $team_id ) {
		$this -> db -> where( 'Id', $match_fixture_id );
		$this -> db -> where( 'HomeTeamId', $team_id );
		$this -> db -> or_where( 'AwayTeamId', $team_id );

		$query = $this -> db -> get( 'MatchFixture' );

		return $query -> num_rows() > 0;
	}

	// --------------------------------------------------------------------
}

?>
