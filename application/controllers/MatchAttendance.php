<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

session_start();

class MatchAttendance extends CI_Controller
{
	/**
	 * Constructor for the Match Attendance Controller Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */

	public function __construct()
	{
		parent::__construct();

		$this -> load -> model('Division_Model');
		$this -> load -> model('News_Model');
		$this -> load -> model('user_model');

		$this -> load -> helper('date');
		$this -> load -> helper(array('form', 'url'));

		$this -> load -> helper('template');
		$this -> load -> library('session');//loads the library for all the functions
		$this -> load -> helper('validation_helper');
		$this -> load -> helper('login_helper');
	}

	// --------------------------------------------------------------------

	/**
	 * Insert Attendance
	 *
	 * This allows to add attendance to the database.
	 *
	 */

	public function add_attendance(){
		//Get user data from session
		$user_data = $this -> session -> userdata('authorized');

		$user_id = $user_data["id"];
		$team_id = $user_data["team"][0];
		$attendance = $this -> input -> get('attendance');
		$match_fixture_id = $this -> input -> get('matchfixtureid');

		//Load Match Fixture Model
		$this -> load -> model('MatchFixture_Model', 'matchfixture');

		//Check if team is playing in the fixture
		if($this -> matchfixture -> is_team_playing($match_fixture_id, $team_id)) {
			//Load Match Attendance Model
			$this -> load -> model('MatchAttendance_Model', 'matchattendance');

			//Set Match Fixture data
			$data = array('MatchFixtureId' => $match_fixture_id,
				'TeamId' => $team_id,
				'UserId' => $user_id,
				'attendance' => $attendance);

			//Set Match Attendance
			echo json_encode(array('success' => $this -> matchattendance ->  set_match_attendance($data)));
			return;
		}

		echo json_encode(array('success' => false));
	}
	
	// --------------------------------------------------------------------

	/**
	 * Default index for the Match Attendance Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User/).
	 * The system will load this function by default
	 *
	 */

	public function index()	{
		$data['base'] = $this -> config -> item('base_url');
		$data['title'] = 'Attendance';

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php
		
		$user_data = $this->session->userdata('authorized');//stores the information array for the user into $user_data
		
		
		$data['query']=$this->user_model->get_user_by_id($user_data['id']);

		
		$data['results'] = $this -> user_model -> get_user_info($user_data['id']);

		$this -> load -> view('templates/header', $data);
		$this -> load ->view('MatchAttendance_view.php', $data);
		$this -> load -> view('templates/footer', $data);
	}

	// --------------------------------------------------------------------

}
?>