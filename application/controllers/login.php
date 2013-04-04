<?php
if (!defined('BASEPATH'))	exit('no direct script access allowed');

session_start();
/**
 * Assist
 *
 * This is the controller for the login
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------
//WARNING: MONKEY VIRUS IS ATTACKING
class Login extends CI_Controller {

	/**
	 * Constructor for the Login Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */

		//I LOVE YELLOW MONKEYS I WISH ALL MONKEYS WERE YELLOW SO I COULD LOVE THEM ALL
	function __construct() {
		parent::__construct();

		//Load Login Helper
		//for monkeys
		$this -> load -> helper('login_helper');

		//Redirect if user is logged in
		if (is_loggedin())
			redirect(base_url());

		$this -> load -> helper('template');
		$this -> load -> helper(array('form', 'url'));

		//Load facebook config
		$this -> config -> load("facebook", TRUE);

		$this -> load -> model('User_Model', 'user', TRUE);
	}

	function __destruct() {
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Login Class
	 *
	 * In case no parameters are given in the Url (e.g. path/Login/).
	 * The system will load this function by default
	 *
	 */

	function index() {
		//Check if logged in
		$data['title'] = 'Login';
		$data['login_header'] = set_login_header(); //get from template_helper.php

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('login_view');
		$this -> load -> view('templates/footer');
	}

	// --------------------------------------------------------------------

	/**
	 * Authenticates user based on given password and email address.
	 *
	 * It will call form_validation object to make sure all requirements are met
	 * before redirecting to the destination page. If not the system will redirect
	 * the user back to the login page
	 *
	 */
	function login_verify() {

		//Set Form validation
		$this -> load -> library('form_validation');
		$this -> load -> helper('validation_helper');

		$this -> form_validation -> set_rules('email', 'email', 'required|trim|xss_clean|prep_for_form|callback_validate_email');
		$this -> form_validation -> set_rules('password', 'password', 'required|callback_validate_user');

		if ($this -> form_validation -> run() == FALSE) {
			echo json_encode(array("success" => false,
				"message" => 'The email or password you entered is incorrect.'));	
			
			// $this -> session -> set_flashdata('message', 'The email or password you entered is incorrect.');
			// Redirect('login');

		} else {
			echo json_encode(array("success" => true));

			Redirect(base_url());
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Valiate the email and password
	 *
	 * Make sure the email and password matches the one in the database
	 * If email and password matches, it will create a session for the
	 * authorize user. If not user will be prompt an error message
	 *
	 */

		//I LOVE YELLOW MONKEYS I WISH ALL MONKEYS WERE YELLOW SO I COULD LOVE THEM ALL
	function validate_user($password) {
		$email = $this -> input -> post('email');

		//authenticate user
		$result = $this -> user -> authenticate_user($email, $password);

		if ($result) {

			$sess_array = array(
				'id' => $result -> Id,
				'fullname' => $row -> FullName,
				);

			$this -> session -> set_userdata('authorized', $sess_array);

			return TRUE;
		} else {
			$this -> form_validation -> set_message('authenticate_user', 'Invalid username or password');
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Callback function for validate_email
	 */

	function validate_email($email) {
		return validate_email($this -> form_validation, $email);
	}

	// --------------------------------------------------------------------

	function test() {

		//Crash counter threshold
		$threshold = 15;

		///Get All Teams
		$this -> load -> model('Team_Model', 'team', TRUE);

		$team = $this -> team -> get_all_teams();

		//Total regular games
		$total_regular_games = 82;

		//Total home games
		$total_home_games = round($total_regular_games / 2 ); //41

		//Total away games
		$total_away_games = $total_regular_games - $total_home_games; //41

		//Total number of teams
		$team_total = count($team); //5

		//Total number of teams to play against
		$team_against_total = $team_total - 1; //4

		//Total number of times to play each team
		$number_to_play_per_season = floor($total_regular_games / $team_against_total); //20

		//Total number of team to play against at home
		$number_home_to_play_per_season = floor($total_home_games / $team_against_total); //10

		//Total number of team to play against at away
		$number_away_to_play_per_season = $number_to_play_per_season - $number_home_to_play_per_season; //10

		//Games per week
		$games_per_week = 8;

		//Games per month
		$games_per_month = $games_per_week * 4; //8

		//Total number of games per week
		$total_games_per_week = $team_total * $games_per_week; //10

		//Total number of games per month
		$total_games_per_month = $team_total * $games_per_month; //40

		//Total months
		$total_season_months = floor($total_regular_games / $games_per_month); //6 months

		//temp
		$count = 0;

		$schedule = array();

		//Add all matches for the season to an array
		for($x = 0; $x < $team_total; $x++) {
			for($y = 0; $y < $team_total; $y++) {
				if($team[$x]["Id"] != $team[$y]["Id"])
				{
					for($z = 0; $z < $number_home_to_play_per_season; $z++)
						array_push($schedule, array($team[$x], $team[$y]));
				}				
			}
		}

		//Create new mixed schedule
		$new_schedule = array();

		$count = 1;

		//Push current fixture to daily fixcture
		while(count($schedule) != 0) { 
			//create daily fixture array, has to make sure teams doesn't place twice a day
			$daily_fixture = array();


			//Crash Counter, incase it goes into infinite loop
			$crash_counter = 0;

			//make sure only the fix number of games are added per week
			for($x = 0; $x < $games_per_week; $x ++) {
				$rand_num = array_rand($schedule);
				
				//Get a random fixture
				$rand_fixture = $schedule[$rand_num];

				//MAKE SURE THAT TEAMS DOES NOT EXIST IN THE DAILY ARRAY
				$yy = !$this -> is_team_exist($daily_fixture, $rand_fixture, $new_schedule);

				if($crash_counter == $threshold || $yy) {
					//Add selected random fixture to daily fixture array
					array_push($daily_fixture, $rand_fixture);

					//remove selected random feature from schedule array
					unset($schedule[$rand_num]);		

				}
				else{
					$x--;
					$crash_counter++;	
				}
			}

			print_r($daily_fixture[0]);
			print_r('<br />');
			print_r($daily_fixture[1]);
			print_r('<br />');
			print_r($daily_fixture[2]);
			print_r('<br />');
			print_r($daily_fixture[3]);
			print_r('<br />');
			print_r('<br />');

			print_r($count++);
			print_r('<br />');
			print_r('<br />');

			//Merge daily fixture array to the main schedule array
			$new_schedule = array_merge($new_schedule, $daily_fixture);

			unset($daily_fixture);
		}
		unset($new_schedule);
		unset($schedule);
		unset($rand_fixture);

	}


	function is_team_exist($daily_fixture, $rand_fixture, $new_schedule) {

		if(count($daily_fixture) == 0)
			return false;

			// print_r("Count : " . count($daily_fixture) . "<br />");

		foreach ($daily_fixture as $key) {
			// print_r($key[0]["Name"] . " vs " . $daily_fixture[0][1]["Name"] . "<br />");
			if(in_array($rand_fixture[0], $key))
				return true;

			if(in_array($rand_fixture[1], $key))
				return true;
		}

		return false;

	}
}
?>
