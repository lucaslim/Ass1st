<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
/**
 * Assist
 *
 * This is the controller for the News class
 *
 * @package  Assist
 * @author  Team Assist
 */

// --------------------------------------------------------------------

class MatchFixture extends Admin_Controller {
	/**
	 * Constructor for the News Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> helper( array( 'form', 'url' ) );

		// Load Model
		$this -> load -> model( 'MatchFixture_Model', 'matchfixture', 'cache_model' );

		$this -> load -> helper( 'grid_helper', 'date_helper' );

		// start session so we can use session variables
		session_start();
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the News Class
	 *
	 * In case no parameters are given in the Url (e.g. path/News/).
	 * The system will load this function by default
	 *
	 */

	function index() {

		//Get total number of rows
		$total_rows = $this -> matchfixture -> get_match_fixture_count();

		//Set pagination data
		$data = get_pagination_data( "admin/matchfixture", $total_rows );

		//Set news data
		$data['results'] = $this -> matchfixture -> get_match_fixture_summary( $data['per_page'], $data['current_page'] );

		//Set title
		$data["title"] = "Schedule Generator";

		$this -> load -> view( 'admin/template/header' );
		$this -> load -> view( 'admin/matchfixture_generate_summary_view', $data );
		$this -> load -> view( 'admin/template/footer' );
	}

	// --------------------------------------------------------------------

	/**
	 * View
	 *
	 * This would list out a list of matches for the admin to do further
	 * editing
	 *
	 */

	function view() {

		$season_id = $this -> input -> get( 'season_id' );
		$league_id = $this -> input -> get( 'league_id' );

		$this -> session -> set_flashdata( 'seasonid', $season_id );

		//Get total number of rows
		$total_rows = $this -> matchfixture -> get_season_fixture_count( $season_id, $league_id );

		if ( $total_rows == 0 ) {
			header( 'location: ../matchfixture/' );
		}

		//Set pagination data
		$data = get_pagination_data( "admin/matchfixture/view", $total_rows );

		//Set news data
		$data['fixture'] = $this -> matchfixture -> get_season_fixture_by_id( $season_id, $league_id , $data['per_page'], $data['current_page'] );

		$data["result"] = $this -> matchfixture -> get_match_fixture_summary_by_id( $league_id, $season_id );;

		$data["title"] = 'View Schedule';
		$data["start_date"] = '';

		$this -> load -> view( 'admin/template/header' );
		$this -> load -> view( 'admin/matchfixture_generate_view_view' , $data );
		$this -> load -> view( 'admin/template/footer' );
	}

	// --------------------------------------------------------------------

	/**
	 * Edit
	 *
	 * This would list out a list of matches for the admin to do further
	 * editing
	 *
	 */

	function update() {

		$season_id = $this -> input -> post( 'season_id' );
		$league_id = $this -> input -> post( 'league_id' );
		$fixture_id = $this -> input -> post( 'fixture_id' );

		$data = array( "Date" => date( "Y-m-d", strtotime( $this -> input -> post( 'date' ) ) ),
			"Time" => date( "H:i:s", strtotime( $this -> input -> post( 'time' ) ) ),
			"HomeTeamId" => $this -> input -> post( 'home_team' ),
			"AwayTeamId" => $this -> input -> post( 'visiting_team' )
		);

		$this -> matchfixture -> update_fixture_by_fixture_id( $fixture_id, $data );

		header( 'location: view?season_id='. $season_id . '&league_id=' . $league_id );
	}

	// --------------------------------------------------------------------

	/**
	 * Edit
	 *
	 * This would list out a list of matches for the admin to do further
	 * editing
	 *
	 */

	function edit() {

		$season_id = $this -> input -> post( 'season_id' );
		$league_id = $this -> input -> post( 'league_id' );
		$fixture_id = $this -> input -> post( 'fixture_id' );

		$data["title"] = 'View Schedule';

		$data["result"] = $this -> matchfixture -> get_match_fixture_by_id( $fixture_id );

		// Load Team Model
		$this -> load -> model( 'Team_Model', 'team' );

		$data["teams"] = $this -> team -> get_all_teams_by_league_id( $league_id );

		$this -> load -> view( 'admin/template/header' );
		$this -> load -> view( 'admin/matchfixture_generate_edit_view' , $data );
		$this -> load -> view( 'admin/template/footer' );
	}

	// --------------------------------------------------------------------

	/**
	 * Delete
	 *
	 * This would list out a list of matches for the admin to do further
	 * editing
	 *
	 */

	function delete() {
		$fixture_id = $this -> input -> post( 'fixture_id' );
		$league_id = $this -> input -> post( 'league_id' );
		$season_id = $this -> input -> post( 'season_id' );



		$this -> matchfixture -> soft_remove_fixture_by_id( $fixture_id );

		header( 'location: view?season_id='. $season_id . '&league_id=' . $league_id );
	}

	// --------------------------------------------------------------------

	/**
	 * Generate
	 *
	 * This would generate a random schedule for the given season and league
	 *
	 */

	function generate_new() {
		$season_id = $this -> input -> post( 'season_id' );
		$league_id = $this -> input -> post( 'league_id' );

		$result = $this -> matchfixture -> get_match_fixture_summary_by_id( $league_id, $season_id );
		if ( is_null( $result ) ) {
			header( 'location: ../matchfixture/' );
		}

		$data["title"] = 'Generate Schedule';
		$data["result"] = $result;
		$data["start_date"] = '';



		$this -> load -> view( 'admin/template/header' );
		$this -> load -> view( 'admin/matchfixture_generate_view' , $data );
		$this -> load -> view( 'admin/template/footer' );
	}

	// --------------------------------------------------------------------

	/**
	 * Generate
	 *
	 * This would generate a random schedule for the given season and league
	 *
	 */

	function generate() {

		//Get Post
		$season_id = $this -> input -> post( 'season_id' );
		$league_id = $this -> input -> post( 'league_id' );
		$season_start_date = $this -> input -> post( 'date' );
		$total_regular_games = $this -> input -> post( 'total_regular_games' );
		$games_per_week = $this -> input -> post( 'games_per_week' );
		$days_to_play = $this -> input -> post( 'day' );

		$this -> load -> library( 'ScheduleGenerator', '', 'schedule' );

		//Schedule Settings
		$this -> schedule -> set_threshold( 15 );
		$this -> schedule -> set_season_start_date( $season_start_date );
		$this -> schedule -> set_total_regular_games( $total_regular_games );
		$this -> schedule -> set_league_id( $league_id );
		$this -> schedule -> set_season_id( $season_id );
		$this -> schedule -> set_games_per_week( $games_per_week );
		$this -> schedule -> set_days_to_play( $days_to_play );

		//Generate Schedule
		$this -> schedule -> generate();
		$this -> cache_model -> update_cache( 2, now());

		header( 'location: ../matchfixture/' );
	}

	// --------------------------------------------------------------------
}
?>
