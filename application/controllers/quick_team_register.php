<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
/**
 * Assist
 *
 * This is the controller for Quick Register, this controller will be
 * included in the home page
 *
 * @package  Assist
 * @author  Team Assist
 */

// --------------------------------------------------------------------
class Quick_Team_Register extends CI_Controller {

	public function __construct() {
		parent::__construct();

		//Load required helper and models
		$this -> load -> model( 'Team_Model', 'team', TRUE );
		$this -> load -> model( 'Division_Model', 'division', TRUE );
		$this -> load -> library( 'form_validation' );
		$this -> load -> helper( 'validation_helper' );
	}

	public function index() {

		$this -> load -> helper( 'date' );
		$this -> load -> helper( array( 'form', 'url' ) );

		$data['base'] = $this -> config -> item( 'base_url' );
		$data['title'] = 'Player Registration';

		//Get Birth Year
		$data['dob_year'] = get_birth_years();
		//Get Birth Month
		$data['dob_month'] = get_months();
		//Get Birth Day
		$data['dob_day'] = get_days();

		$this -> load -> view( 'quick_register_view', $data );
	}

	// ------------------------------------------------------------------------

	/**
	 * Team Quick Registration
	 *
	 * Allows public users to register from the main homepage.
	 *
	 */

	function register_team() {

		//Get post array
		$result = $this -> input -> post( NULL, TRUE );

		//make sure user doesn't run the action script immediately
		if ( !$result )
			return;

		$rules = array( array( 'field' => 'team_name', 'label' => 'team name', 'rules' => 'required|prep_for_form|callback_check_is_team_exist' ),
			array( 'field' => 'ddl_league', 'label' => 'league', 'rules' => 'required' ),
			array( 'field' => 'ddl_division', 'label' => 'division', 'rules' => 'required' ),
			array( 'field' => 'ddl_gender', 'label' => 'gender', 'rules' => 'required' ) ,
			array( 'field' => 'team_terms', 'label' => 'terms', 'rules' => 'required' ) );



		$this -> form_validation -> set_rules( $rules );

		if ( $this -> form_validation -> run() == FALSE ) {
			echo json_encode( array("success" => false, "message" => form_error( 'team_name' ) .
					form_error( 'ddl_league' ) .
					form_error( 'ddl_division' ) .
					form_error( 'ddl_gender' ) .
					( form_error( 'team_terms' ) != '' ? 'Please agree with the terms before proceeding.' : '' ) ) );
			return;

		}

		$this -> team -> quick_team_register( array( 'Name' => $result["team_name"], 'LeagueId' => $result["ddl_league"], 'DivisionId' => $result["ddl_division"], 'Gender' => $result["ddl_gender"] ) );

		echo json_encode(array("success" => true));

			return;
	}

	// --------------------------------------------------------------------

	/**
	 * Callback function for validate_email
	 */

	function validate_email( $email ) {
		return validate_email( $this -> form_validation, $email );
	}

	// --------------------------------------------------------------------

	/**
	 * Check Team Name
	 *
	 * Check if team name exist
	 *
	 */

	function check_team_name() {
		$team_name = $this -> input -> post( 's' );

		if ( $this -> check_is_team_exist( $team_name ) )
			$this -> output -> set_content_type( 'application/json' ) -> set_output( json_encode( array( "success" => true ) ) );
		else
			$this -> output -> set_content_type( 'application/json' ) -> set_output( json_encode( array( "success" => false ) ) );
	}

	// --------------------------------------------------------------------

	/**
	 * Callback function for check_is_team_exist
	 */

	function check_is_team_exist( $team_name ) {


		$result = $this -> team -> get_all_team_name();

		if ( $result ) {
			foreach ( $result as $value ) {
				$name = strtolower( $value -> Name );
				$team_name = strtolower( $team_name );

				if ( $name == $team_name ) {
					$this -> form_validation -> set_message('check_is_team_exist', 'Team name already exist. Please select a new team name.');
					return false;
				}
			}
		}
		return true;
	}

	// --------------------------------------------------------------------

	/**
	 * Get division list by Id
	 *
	 * Displays the full score details for the selected game id
	 *
	 */

	function get_division() {
		$league_id = $this -> input -> post( 'id' );

		$result = $this -> division -> get_division_by_league_id( $league_id );

		if ( $result ) {
			$arr = array( "Division" => "" );

			foreach ( $result as $value ) {
				$temp_arr = array( $value -> Name => $value -> Id ) ;
				$arr = array_merge( $arr, $temp_arr );
			}

			$this -> output -> set_content_type( 'application/json' ) -> set_output( json_encode( $arr ) );
		}
	}

	// --------------------------------------------------------------------

}
?>
