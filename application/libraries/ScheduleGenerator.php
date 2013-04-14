<?php defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

/**
 * Assist
 *
 * This is the Schedule Generator Library
 *
 * @package  Assist
 * @author  Team Assist
 */

// --------------------------------------------------------------------

class ScheduleGenerator {
	private $threshold;
	private $start_date;
	private $total_regular_games;
	private $league_id;
	private $games_per_week;
	private $day_array;
	private $season_id;
	private $total_games_count;

	/**
	 * Constructor for the Schedule Generator Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */

	function __construct() {

		//Set default values
		$this -> threshold = 15;
		$this -> start_date = date( 'Y-m-d' );
		$this -> total_regular_games = 82;
		$this -> games_per_week = 8;
	}

	// --------------------------------------------------------------------

	/**
	 * Generate Schedule
	 *
	 * This function would generate a random schedule for the league based
	 * on the given input that is set by the user
	 *
	 */

	public function generate() {

		if ( !isset( $this -> league_id ) || $this -> league_id <= 0 )
			return;

		if ( !isset( $this -> season_id ) || $this -> season_id <= 0 )
			return;

		if ( !is_array( $this -> day_array ) || count( $this -> day_array ) == 0 )
			return;

		$CI =& get_instance();

		//Get All Teams based on the league
		$CI -> load -> model( 'Division_Model', 'division', TRUE );
		$team = $CI -> division -> get_all_teams_by_league( $this -> league_id );

		//Total home games
		$total_home_games = round( $this -> total_regular_games / 2 );

		//Total away games
		$total_away_games = $this -> total_regular_games - $total_home_games; //41

		//Total number of teams
		$team_total = count( $team ); //5

		//Total number of teams to play against
		$team_against_total = $team_total - 1; //4

		//Total number of times to play each team
		$number_to_play_per_season = floor( $this -> total_regular_games / $team_against_total ); //20

		//Total number of team to play against at home
		$number_home_to_play_per_season = floor( $total_home_games / $team_against_total ); //10

		//Total number of team to play against at away
		$number_away_to_play_per_season = $number_to_play_per_season - $number_home_to_play_per_season; //10

		//Days per week
		$days_per_week = count( $this -> day_array );

		//Games per day
		$games_per_day = $this -> games_per_week / $days_per_week;

		//Games per month
		$games_per_month = $this -> games_per_week * 4; //8

		//Total number of games per week
		$total_games_per_week = $team_total * $this -> games_per_week; //10

		//Total number of games per month
		$total_games_per_month = $team_total * $games_per_month; //40

		//Total months
		$total_season_months = floor( $this -> total_regular_games / $games_per_month ); //6 months

		//temp
		$count = 0;

		$schedule = array();

		//Add all matches for the season to an array
		for ( $x = 0; $x < $team_total; $x++ ) {
			for ( $y = 0; $y < $team_total; $y++ ) {
				if ( $team[$x]["Id"] != $team[$y]["Id"] ) {
					for ( $z = 0; $z < $number_home_to_play_per_season; $z++ )
						array_push( $schedule, array( $team[$x], $team[$y] ) );
				}
			}
		}

		//Create new mixed schedule
		$new_schedule = array();

		$count = 1;

		//Push current fixture to daily fixcture
		while ( count( $schedule ) != 0 ) {
			//create daily fixture array, has to make sure teams doesn't place twice a day
			$daily_fixture = array();

			//Crash Counter, incase it goes into infinite loop
			$crash_counter = 0;

			//make sure only the fix number of games are added per week
			for ( $x = 0; $x < $this -> games_per_week; $x ++ ) {
				$rand_num = array_rand( $schedule );

				//Get a random fixture
				$rand_fixture = $schedule[$rand_num];

				//MAKE SURE THAT TEAMS DOES NOT EXIST IN THE DAILY ARRAY
				$yy = !$this -> is_team_exist( $daily_fixture, $rand_fixture, $new_schedule );

				if ( $crash_counter == $this -> threshold || $yy ) {
					//Add selected random fixture to daily fixture array
					array_push( $daily_fixture, $rand_fixture );

					//remove selected random feature from schedule array
					unset( $schedule[$rand_num] );

				}
				else {
					$x--;
					$crash_counter++;
				}
			}

			//Merge daily fixture array to the main schedule array
			$new_schedule = array_merge( $new_schedule, $daily_fixture );

			unset( $daily_fixture );
		}
		unset( $schedule );
		unset( $rand_fixture );

		//Set days counter
		$days_counter = 0;
		$this -> day_array_counter = 0;

		//Set first tuesday
		$this -> start_date = date( "D M d, Y", strtotime( "Next " . $this -> day_array[$this -> day_array_counter], strtotime( $this -> start_date ) ) );

		//Set Data to be insert
		$season_fixture = array();

		//Set total rows
		$this -> total_games_count = count( $new_schedule );

		foreach ( $new_schedule as $games ) {
			//Reset days counter if hit the maximum games per day
			if ( $days_counter == $games_per_day ) {

				//reset day array counter
				if ( $this -> day_array_counter == count( $this -> day_array ) - 1 )
					$this -> day_array_counter = 0;
				else
					$this -> day_array_counter++;

				$days_counter = 0;
				$this -> start_date = date( "D M d, Y", strtotime( "Next " . $this -> day_array[$this -> day_array_counter], strtotime( $this -> start_date ) ) );
			}

			$daily_fixture = array( 'SeasonId' => $this -> season_id,
				'LeagueId' => $this -> league_id,
				'HomeTeamId' => $games[0]["Id"],
				'AwayTeamId' => $games[1]["Id"],
				'Date' => date( "Y-m-d", strtotime( $this -> start_date ) ),
				'Time' => date( "H:i:s", strtotime( '19:00' ) ),
				'ArenaId' => $games[0]["ArenaId"], //Set arena of home team
				'MatchTypeId' => 3 );

			array_push( $season_fixture, $daily_fixture );

			$days_counter++;
		}

		$CI -> load -> model( 'MatchFixture_Model', 'matchfixture', TRUE );
		$CI -> matchfixture -> generate_season_fixture( $season_fixture, $this -> season_id, $this -> league_id );

		return $new_schedule;
	}

	// --------------------------------------------------------------------

	/**
	 * Team Exist
	 *
	 * Check if team exist in the array
	 */

	public function is_team_exist( $daily_fixture, $rand_fixture, $new_schedule ) {

		if ( count( $daily_fixture ) == 0 )
			return false;

		foreach ( $daily_fixture as $key ) {
			if ( in_array( $rand_fixture[0], $key ) )
				return true;

			if ( in_array( $rand_fixture[1], $key ) )
				return true;
		}

		return false;

	}

	// --------------------------------------------------------------------

	/**
	 * Setter for Threshold
	 */

	public function set_threshold( $value ) {
		$this -> threshold = $value;
	}

	// --------------------------------------------------------------------

	/**
	 * Setter for Start Date
	 */

	public function set_season_start_date( $value ) {
		$this -> start_date = $value;
	}

	// --------------------------------------------------------------------

	/**
	 * Setter for Total Regular Games
	 */

	public function set_total_regular_games( $value ) {
		$this -> total_regular_games = $value;
	}

	// --------------------------------------------------------------------

	/**
	 * Setter for League Id
	 */

	public function set_league_id( $value ) {
		$this -> league_id = $value;
	}

	// --------------------------------------------------------------------

	/**
	 * Setter for Games Per Week
	 */

	public function set_games_per_week( $value ) {
		$this -> games_per_week = $value;
	}

	// --------------------------------------------------------------------

	/**
	 * Setter for Season Id
	 */

	public function set_days_to_play( $value ) {
		$this -> day_array = $value;
	}

	// --------------------------------------------------------------------

	/**
	 * Setter for Day Array
	 */

	public function set_season_id( $value ) {
		$this -> season_id = $value;
	}

	// --------------------------------------------------------------------

	/**
	 * Getter for Total Rows
	 */

	public function get_games_count() {
		return $this -> total_games_count;
	}

	// --------------------------------------------------------------------


}

?>
