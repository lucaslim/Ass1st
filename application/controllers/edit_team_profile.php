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
		$this -> load -> model('image_model');

		$this -> load -> helper(array('form', 'url' ,'date', 'template'));
		$this -> load -> helper('validation_helper');
		$this -> load -> helper('login_helper');	

		$this -> load -> library('session');//loads the library for all the functions

		$user_data = $this -> session -> userdata('authorized');

		// If user is not captain, send then to index
	    if(!$this -> User_Model -> is_captain($user_data['id'])) {
	    	// Redirect home
	    	redirect('', 'location');
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

		// Team Design
		$sess_data = $this -> session -> userdata( 'teamdata' );
		$data['default'] = array( "TeamName" => $sess_data["Name"], "ShowUpdate" => true, "ShowUpload" => false );
		$data['color_chooser'] = $this -> load -> view( 'team_color_chooser_view', $data, true ); 

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
			$this -> session -> set_userdata('message', 'Successfully removed player');
		else
			$this -> session -> set_userdata('message', 'Failed removing player, please try again');

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
		if($this -> Team_Model -> update_team_roster($players) == FALSE)
			$this -> session -> set_userdata('message', 'Error: Roster update failed, please try again');
		else
			$this -> session -> set_userdata('message', 'Roster updated successfully');
		
		// Return to index
		header("Location: ./");
	}

	// --------------------------------------------------------------------
	/**
	 * Do Upload
	 *
	 * Perform uploading of team profile picture
	 *
	 */	

	function do_upload()
	{
		$teamid = $_POST['TeamId'];

		// Create variable with the files extension attached
		$ext = end(explode(".", $_FILES['userfile']['name']));		
		
		// Configure upload class
		$config['upload_path'] = './uploads/teamlogos';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite'] = true;
		$config['file_name'] = 'team-logo-id-' . $teamid . '.' . $ext;

		// Load upload library
		$this -> load -> library('upload', $config);

		// Get session data
		$user_data = $this -> session -> userdata('authorized');

		if (!$this -> upload -> do_upload())
		{
			$error = $this -> upload -> display_errors();
			$this -> session -> set_userdata('message', 'ERROR: ' . $error);
			header("Location: ./");
		}
		else
		{
			$this -> session -> set_userdata('message', 'Image successfully uploaded');
			$fileupload = $this -> upload -> data();
			$upload = $this -> Team_Model -> save_team_image($teamid, $config['file_name']);
			header("Location: ./");
		}
	}	
}
?>