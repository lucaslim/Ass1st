<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Assist
 *
 * This is the controller for the News class
 *
 * @package		Assist
 * @author		Team Assist
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
		
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the News Class
	 *
	 * In case no parameters are given in the Url (e.g. path/News/).
	 * The system will load this function by default
	 *
	 */
	function generate() {
		$data["generated_schedule"] = $this -> generate_game_schedule();

		$this -> load -> view('admin/template/header');
		$this -> load -> view('admin/matchfixture_generate_view', $data);
		$this -> load -> view('admin/template/footer');		
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the News Class
	 *
	 * In case no parameters are given in the Url (e.g. path/News/).
	 * The system will load this function by default
	 *
	 */

	function generate_game_schedule() {
		//Crash counter threshold
		$threshold = 15;

		//Start of Season
		$start_date = '2013-04-01';

		///Get All Teams
		$this -> load -> model('Division_Model', 'division', TRUE);

		$team = $this -> division -> get_all_teams_by_league(1);

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

		//Days per week
		$days_per_week = 2;

		//Games per week
		$games_per_week = 8;

		//Games per day
		$games_per_day = $games_per_week / $days_per_week;

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

			// print_r($daily_fixture[0]);
			// print_r('<br />');
			// print_r($daily_fixture[1]);
			// print_r('<br />');
			// print_r($daily_fixture[2]);
			// print_r('<br />');
			// print_r($daily_fixture[3]);
			// print_r('<br />');
			// print_r('<br />');

			// print_r($count++);
			// print_r('<br />');
			// print_r('<br />');

			//Merge daily fixture array to the main schedule array
			$new_schedule = array_merge($new_schedule, $daily_fixture);

			unset($daily_fixture);
		}
		unset($schedule);
		unset($rand_fixture);

		//Set days counter
		$days_counter = 0;

		$day_array_counter = 0;

		//Set days played
		$day_array = array("Tuesday", "Thursday");

		//Set first tuesday
		$start_date = date("D M d, Y", strtotime("Next " . $day_array[$day_array_counter], strtotime($start_date)));

		$schedule_html = "";
		$schedule_html .= "<table border='1'>";
		$schedule_html .= "<tr><th>Date</th><th>Home Team</th><th>Visiting Team</th><th>Stadium</th></tr>";

		//Set Data to be insert
		$season_fixture = array();

		foreach ($new_schedule as $games) {
			//Reset days counter if hit the maximum games per day
			if($days_counter == $games_per_day)	{

				//reset day array counter
				if($day_array_counter == count($day_array) - 1)
					$day_array_counter = 0;
				else
					$day_array_counter++;

				$days_counter = 0;
				$start_date = date("D M d, Y", strtotime("Next " . $day_array[$day_array_counter], strtotime($start_date)));
			}

			$schedule_html .= "<tr>";
			$schedule_html .= "<td>" . $start_date . "</td>";
			$schedule_html .= "<td>" . $games[0]["Name"] . "</td>";
			$schedule_html .= "<td>" . $games[1]["Name"] . "</td>";
			$schedule_html .= "<td>" . $games[0]["ArenaId"] . "</td>";
 			$schedule_html .= "<tr>";

 			$daily_fixture = array('SeasonId' => 1,
 								   'HomeTeamId' => $games[0]["Id"],
 								   'AwayTeamId' => $games[1]["Id"],
 								   'Date' => date("Y-m-d", strtotime($start_date)),
 								   'Time' => date("H:i:s", strtotime('19:00')),
 								   'ArenaId' => $games[0]["ArenaId"],
 								   'MatchTypeId' => 3);

 			array_push($season_fixture, $daily_fixture);

			$days_counter++;
		}		

		$this -> load -> model('MatchFixture_Model', 'matchfixture', TRUE);

		$this -> matchfixture -> generate_season_fixture($season_fixture, 1);

		print_r($schedule_html);

		return $new_schedule;
	}

	// --------------------------------------------------------------------

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