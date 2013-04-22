<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for Division_Profile class.
 * This is where all the functions talks to the
 * database.
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class Division_Model extends CI_Model {

	/**
	 * Constructor for the Division_Profile Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		// Load models
		$this -> load -> model('Scorekeeper_Model');

		// Load helpers
		$this -> load -> helper('scoring');		
	}

	// --------------------------------------------------------------------
	/**
	 * Get Seasons
	 *
	 * Retrieves all seasons currently stored in the database
	 *
	 */
	function get_seasons() {

		$this -> db -> select('Id, YearFrom, YearTo');
		$this -> db -> from('Season');

		$query = $this -> db -> get();
		
		return $query -> result();
	}	

	// --------------------------------------------------------------------
	/**
	 * Get Arenas
	 *
	 * Retrieves all arenas currently stored in the database
	 *
	 */
	function get_arenas() {

		$this -> db -> select('Id, Name, Description');
		$this -> db -> from('Arena');

		$query = $this -> db -> get();
		
		return $query -> result();
	}

	// --------------------------------------------------------------------
	/**
	 * Get Match Type
	 *
	 * Retrieves the type of matches available in the db
	 *
	 */
	function get_match_types() {

		$this -> db -> select('Id, Name');
		$this -> db -> from('MatchType');

		$query = $this -> db -> get();
		
		return $query -> result();
	}	

	// --------------------------------------------------------------------
	/**
	 * Get Standings
	 *
	 * Retrieves the standings for the various divisions
	 *
	 */
	function get_standings($seasonid, $leagueid) {

		$this -> db -> where('SeasonId', $seasonid);

		$query = $this -> db -> get('AllTeamStandings');

	    // If query returns 1 or more results, return data as array
	    // If query returns 0 rows, then return false
	    if ($query -> num_rows() > 0) {
	        foreach ($query -> result() as $row) {
	        	$teamid = $row -> Id;
	        	$seasonid = $row -> SeasonId;
	        	
	        	// get the goals against / goals for
	        	$ga = 11;

	        	// add the values back into the row object
	        	$row -> P = ($row -> Win * 2) + $row -> OvertimeLoss;;
	        	$row -> GP = $this -> get_games_played($teamid, $seasonid);
	        	$row -> GF = $this -> get_goals_for($teamid, $seasonid);
	        	$row -> GA = $ga;
	        	$row -> DIFF = $row -> GF - $row -> GA;

	        	// stash it in the array
	            $data[] = $row;
	        }
	        return $data;
	    }
	    return false;		
	}

	// --------------------------------------------------------------------
	/**
	 * Get Games Played by Team
	 *
	 * Calculates the games played by a team (that have been completed)
	 *
	 */

    public function get_games_played($teamid, $seasonid) {

    	// where clause
		$this -> db -> where('SeasonId', $seasonid);
		$this -> db -> where('Id', $teamid);

		// select required fields
		$this -> db -> select('Win, Lost, OvertimeLoss');

		$query = $this -> db -> get('AllTeamStandings');

		// assign variables
		$won = $query -> row() -> Win;
		$loss = $query -> row() -> Lost;
		$ot = $query -> row() -> OvertimeLoss;

		// return total
		return $won + $loss + $ot;
   	}

	// --------------------------------------------------------------------
	/**
	 * Get Goals For by Team
	 *
	 * Calculates the goals scored by the team
	 *
	 */

    public function get_goals_for($teamid, $seasonid) {

		$this -> db -> where('SeasonId', $seasonid);
		$this -> db -> where('TeamId', $teamid);

	    // Perform the query
	    return $this -> db -> count_all_results('AllScoringPlays');
   	}

	// --------------------------------------------------------------------
	/**
	 * Get Goals Against by Team
	 *
	 * Calculates the goals scored by the team
	 *
	 */

    public function get_goals_against($teamid, $seasonid) {

		$this -> db -> where('SeasonId', $seasonid);
		$this -> db -> where('TeamId', $teamid);

	    // Perform the query
	    return $this -> db -> count_all_results('AllScoringPlays');
   	}    	   	    	  	

	// --------------------------------------------------------------------
	/**
	 * Get Team by Id
	 *
	 * Retrieves team by ID
	 *
	 */
	function get_team_by_id($id) {

		// set where clause
		$this -> db -> where('Id', $id);


		$this -> db -> from('AllTeams');

		// $this -> db -> select('Team.Name AS tname, Team.Founded AS tfounded, Team.Picture AS tpicture, Team.PrimaryR AS TPrimR, Team.PrimaryG AS TPrimG, Team.PrimaryB AS TPrimB, Team.SecondaryR	AS TSecR, Team.SecondaryG	AS TSecG, Team.SecondaryB AS TSecB, Team.TertiaryR AS TTerR, Team.TertiaryG AS TTerG, Team.TertiaryB AS TTerB, Arena.Name AS aname, Division.Name AS dname');
		// $this -> db -> from('Team');
		// $this -> db -> join('Arena', 'Arena.Id = Team.ArenaId');
		// $this -> db -> join('Division', 'Division.Id = Team.DivisionId');

		$query = $this->db->get();

		//Check if any rows returned
		if (!$query || $query -> num_rows() <= 0)
			return FALSE;
		
		return $query -> row();
	}

	// --------------------------------------------------------------------

	/**
	 * Update Team Colors
	 *
	 * This allows Captain / Coach to update the Team Colors to the database.
	 *
	 */

	function update_colors($id, $data) {

		//Set where clause
		$this -> db -> where('Id', $id);

		// var_dump($data);

		//update database
		return $this -> db -> update('Team', $data);

	}


	// --------------------------------------------------------------------
	/**
	 * Get Teams
	 *
	 * Retrieves a list of the teams
	 *
	 */
	function get_teams() {

		// set where clause
		$this -> db -> select('Id, Name');
		$this -> db -> from('AllTeams');

		$query = $this->db->get();

		//Check if any rows returned
		if (!$query || $query -> num_rows() <= 0)
			return FALSE;
		
		return $query -> result();
	}	

	// --------------------------------------------------------------------
	/**
	 * Get Teams Based on League
	 *
	 * Retrieves a list of teams based on the league
	 *
	 */

	function get_all_teams_by_league($leagueId) {

		$this -> db -> select('Id, Name, ArenaId');
		$this -> db -> where('LeagueId' , $leagueId);
		$query = $this -> db -> get('AllTeams');

		if ($query -> num_rows() > 0) {
			return $query -> result_array() ;
		} else {
			return false;
		}
	}

	// --------------------------------------------------------------------
	/**
	 * Get Team Roster by Id
	 *
	 * Retrieves the roster for the team specified
	 *
	 */
	function get_team_roster_by_id($id) {

		// set where clause
		$this -> db -> where('TeamId', $id);

		$query = $this->db->get('AllRosters');

		//Check if any rows returned
		if (!$query || $query -> num_rows() <= 0)
			return FALSE;
		
		return $query -> result();
	}

	// --------------------------------------------------------------------
	/**
	 * Get Mini Boxscores
	 *
	 * Gets the game info and period scoring the games in the provided date
	 *
	 */
	function get_mini_boxscores($date = null) {

		// If a date is not provided, get the games for today
		if(!isset($date)) {
			$date = date('Y-m-d');
		}
		
		$this -> db -> where('Date', $date);

		$query = $this -> db -> get('AllFixtures');

		$data = array();

		// Check if any rows returned
		if ($query -> num_rows() > 0) {
	        foreach ($query -> result() as $row) {

	        	// Stash the data
	        	$gameid = $row -> Id;
	            $hometeamname = $row -> HomeTeamName;
	            $hometeam = $row -> HomeTeamId;
	            $awayteamname = $row -> AwayTeamName;
	            $awayteam = $row -> AwayTeamId;
	            $progress = convert_period_string($row -> Progress);
	            $time = date('g:i A', strtotime($row -> Time));

	            // Get the scores by period for this game
	            $homescore = $this -> Scorekeeper_Model -> get_team_score_array($gameid, $hometeam);
	            $awayscore = $this -> Scorekeeper_Model -> get_team_score_array($gameid, $awayteam);	 

            	// Stash data in associative array
				$push_me = array (
					'GameId' => $gameid,
					'HomeTeamName' => $hometeamname,
					'HomeTeamScore' => $homescore,
					'AwayTeamName' => $awayteamname,
					'AwayTeamScore' =>  $awayscore,
					'Progress' => $progress,
					'Time' => $time
				);

				// Push it into the array
				array_push($data, $push_me);
	        }
	        return $data;
	    }
		return false;
	}

	// --------------------------------------------------------------------
	/**
	 * Get Live Scores
	 *
	 * Gets the scores for the games that are on today. 
	 * Used in the header on every user side page.
	 *
	 */
	function get_live_scores() {

		// Get todays date
		$date = date('Y-m-d');

		// Set where clause
		$this -> db -> where('Date', $date);

		$query = $this -> db -> get('AllFixtures');

		$data = array();

		// Check if any rows returned
	    if ($query -> num_rows() > 0) {
	        foreach ($query -> result() as $row) {

	        	// Stash the data
	        	$gameid = $row -> Id;
	            $hometeamname = $row -> HomeTeamName;
	            $hometeam = $row -> HomeTeamId;
	            $awayteamname = $row -> AwayTeamName;
	            $awayteam = $row -> AwayTeamId;
	            $progress = convert_period_string($row -> Progress);
	            $date = convert_date_to_daymmdd($row -> Date);
	            $time = date('g:i A', strtotime($row -> Time));

	            // Get the score for the home team
	            $homescore = $this -> Scorekeeper_Model -> get_team_score($gameid, $hometeam);	 

	            // Get the goal totals for this game
	            $awayscore = $this -> Scorekeeper_Model -> get_team_score($gameid, $awayteam);	 

            	// Stash data in associative array
				$push_me = array (
					'GameId' => $gameid,
					'HomeTeamName' => $hometeamname,
					'HomeTeamScore' => $homescore,
					'AwayTeamName' => $awayteamname,
					'AwayTeamScore' =>  $awayscore,
					'Progress' => $progress,
					'Date' => $date,
					'Time' => $time
				);

				// Push it into the array
				array_push($data, $push_me);
	        }
	        return $data;
	    }
	    else {
			return false;
	    }
   	}   	
}