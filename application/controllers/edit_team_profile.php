<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the controller for the Edit Team Profile class
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Edit_Team_Profile extends CI_Controller {

	function __construct() {
		parent::__construct();

		// Load models
		$this -> load -> model('Division_Model');
		$this -> load -> model('News_Model');
		$this -> load -> model('User_Model');
		$this -> load -> model('Team_Model');

		$this -> load -> helper(array('form', 'url' ,'date', 'template'));
		$this -> load -> helper('validation_helper');
		$this -> load -> helper('login_helper');	

		$this -> load -> library('session');//loads the library for all the functions

		$user_data = $this -> session -> userdata('authorized');	

	    if($this -> User_Model -> is_captain($user_data['id'])) {
	    	//echo "captain";
		}
		else {
		    //echo "not captain";
		}
	}

	// --------------------------------------------------------------------
	/**
	 * Default index
	 *
	 * Displays the edit team profile
	 *
	 */

	function index() {

		// Get session data
		$user_data = $this -> session -> userdata('authorized');

		// Get Team Info
		$user_team_data = $this -> Division_Model -> get_user_teams($user_data['id']); // retrieve user teams
		$data['teamid'] = $user_team_data -> TeamId;
		$data['team'] = $this -> Division_Model -> get_team_by_id($data['teamid']); // retrieve team info

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();		

		// Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php

		// Get the team roster for the selected team
		$data['roster'] = $this -> Team_Model -> get_team_roster($data['teamid']);

		// Provide session data to view
		$data['userdata'] = $this -> session -> all_userdata();

		// Set title
		$data['title'] = "Edit Team Profile"; // Use the file as the title

		$this -> load -> view( 'templates/header', $data );
		$this -> load -> view( 'edit_team_profile', $data );
		$this -> load -> view( 'templates/footer', $data);

    	// Clear session message after the view loads
    	$this -> session -> set_userdata('message', '');
	}

	// --------------------------------------------------------------------
	/**
	 * Delete
	 *
	 * Perform delete
	 *
	 */

	function removeplayer($id, $teamid) {
		// Handle delete errors
		if($this -> Team_Model -> delete_user_from_roster($id, $teamid))
			$this -> session -> set_userdata('message', 'Success removing player');
		else
			$this -> session -> set_userdata('message', 'Failed removing player');

		// Return to index
		header("Location: ../../");
	}

	// --------------------------------------------------------------------
	/**
	 * Update
	 *
	 * Perform update
	 *
	 */
	function update_roster() {
		// Define variable of the post data
		$players = $_POST['player'];

		// Handle update errors
		if($this -> Team_Model -> update_team_roster($players) != NULL)
			$this -> session -> set_userdata('message', 'Roster update failed');
		else
			$this -> session -> set_userdata('message', 'Roster updated successfully');
		
		// Return to index
		header("Location: ./");
	}
}
?>