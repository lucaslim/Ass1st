<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This model is used when the Scorekeeper talks to
 * the database. It contains functions for creating, editing
 * and deleting a game from the MatchFixture.
 *
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class Scorekeeper_Model extends CI_Model {

	/**
	 * Constructor for the Division_Profile Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */

	function __construct() {
		parent::__construct();

		// Load helpers
		$this -> load -> helper('url');
	}

	// --------------------------------------------------------------------
	/**
	 * Fetch Games
	 *
	 * Retrieves the games stored in the db, takes three parameters, limit
	 * which determines the amount of total games to retrieve and start
	 * which is used by pagination to determine where to start the retrieval
	 * seasonid is which season it is retrieving games for
	 *
	 */

    public function get_games($seasonid, $limit, $start) {
	    
	    // Limit the Query based on parameters
	    $this -> db -> limit($limit, $start);

	    // If a season id is provided, use it in the query
	    if ($seasonid != 0) 
	    {
			$this -> db -> where('SeasonId', $seasonid);
	    }

	    // Perform the query
	    $query = $this -> db -> get('AllFixtures');

	    // If query returns 1 or more results, return data as array
	    // If query returns 0 rows, then return false
	    if ($query -> num_rows() > 0) {
	        foreach ($query -> result() as $row) {
	        	
	        	// define variables
	        	$gameid = $row -> Id;
	        	$home = $row -> HomeTeamId;
	        	$away = $row -> AwayTeamId;

	        	// get the scores for home and away
	            $row -> HomeScore = $this -> get_team_score($gameid, $home);
	            $row -> AwayScore = $this -> get_team_score($gameid, $away);

	            $data[] = $row;
	        }
	        return $data;
	    }
	    return false;
   	}

	// --------------------------------------------------------------------
	/**
	 * Fetch Game by ID
	 *
	 * Retrieves the selected game for the user, accepts one argument
	 * which is the id of the game that the user requests
	 *
	 */

    public function get_game_by_id($gameid) {
	    
		// From the MatchFixture table
		$this -> db -> from('AllFixtures');

		// Where gameid = $gameid
	    $this -> db -> where("Id", $gameid);

	    // Perform the query
	    $query = $this -> db -> get();

	    // If query returns 0 rows, then return false
	    if ($query -> num_rows() > 0) {
	        return $query -> row();
	    }
	    return false;
   	}

	// --------------------------------------------------------------------
	/**
	 * Game Counter
	 *
	 * Returns the amount of games currently MatchFixtured in the DB
	 *
	 */

	function game_count($seasonid = 0) {

		if ($seasonid != 0)
		{
			// If user provides a season id, show results only for that season
			$this -> db -> where('SeasonId', $seasonid); 
			$this -> db -> from('MatchFixture');
			return $this -> db -> count_all_results();			
		}
		else
		{
			// If no season id is selected, show all results
			return $this -> db -> count_all("MatchFixture");			
		}
	}   		

	// --------------------------------------------------------------------
	/**
	 * Add a Game to the DB
	 *
	 * Takes all the information submitted by admin and adds it to the
	 * MatchFixture table in the DB.
	 *
	 */

	function add_game() {
		
		// Create an object from the data submitted
		$data = array(
			'SeasonId' => $this -> input -> post('seasonid'), // get the season id 
			'HomeTeamId' => $this -> input -> post('homeid'), // get the home team id
			'AwayTeamId' => $this -> input -> post('awayid'), // get the away team id 
			'Date' => $this -> input -> post('date'), // get the date
			'Time' => $this -> input -> post('time'), // get the time
			'ArenaId' => $this -> input -> post('arena'), // get the arena
			'MatchTypeId' => $this -> input -> post('matchtype'),
			'LeagueId' => 1
		);			
			
		// Insert the $data object as a new row in the MatchFixture Table
		return $this -> db -> insert('MatchFixture', $data);
	}

	// --------------------------------------------------------------------
	/**
	 * Update a Game
	 *
	 * Takes the information submitted and updates the information for the
	 * gameid provided
	 *
	 */

	function update_game($gameid) {

		// Create an object from the data submitted
		$data = array(
			'Date' => $this -> input -> post('date'), // get the date
			'Time' => $this -> input -> post('time'), // get the time
			'HomeTeamScore' => $this -> input -> post('scorehome'), // get home score
			'AwayTeamScore' => $this -> input -> post('scoreaway') // get away score
		);

		// Set the where clause
		$this -> db -> where('Id', $gameid);

		// Update the row of the MatchFixture table
		return $this -> db -> update('MatchFixture', $data);					
	}

	// --------------------------------------------------------------------
	/**
	 * Delete Game
	 *
	 * Delete games using the ids provided
	 *
	 */

	function delete_games($gameids) {

		// Set the where clause
		$this -> db -> where_in('Id', $gameids);

		// Delete the row of the MatchFixture table
		return $this -> db -> delete('MatchFixture');
	}

	// --------------------------------------------------------------------
	/**
	 * Get Game Info
	 *
	 * Loads the game information into an array
	 *
	 */

    public function get_game_info($gameid) {

    	// Use the team id to load the data
		$this -> db -> where('Id', $gameid);

	    // Perform the query
	    $query = $this -> db -> get('AllFixtures');

	    // If query returns 0 rows, then return false
	    if ($query -> num_rows() > 0) {
	        return $query -> row();
	    }
	    return false;
   	} 

	// --------------------------------------------------------------------
	/**
	 * Get Team Score
	 *
	 * Returns the score for the team provided with the game provided
	 * Counts the number of rows in the IndividualScoreHockey table
	 *
	 */

    public function get_team_score($gameid, $teamid) {

		$this -> db -> where('GameId', $gameid);
		$this -> db -> where('TeamId', $teamid);

	    // Perform the query
	    return $this -> db -> count_all_results('IndividualScoreHockey');
   	}     	  	

	// --------------------------------------------------------------------
	/**
	 * Get Game Progress
	 *
	 * Query the GameProgress table to find out where we are in the 
	 * scorekeeping process
	 *
	 */

    public function get_game_progress($gameid) {

    	// Select the progress column
		$this->db->select('Progress');

    	// User game id as where clause
		$this -> db -> where('Id', $gameid);

	    // Perform the query
	    $query = $this -> db -> get('MatchFixture');

	    // If query returns 0 rows, then return false
	    if ($query -> num_rows() > 0) {
	        return $query -> row();
	    }
	    return false;
   	}

	// --------------------------------------------------------------------
	/**
	 * Load Roster
	 *
	 * Loads the roster of the team into an array, uses team id and season
	 * id to find the teams info
	 *
	 */

    public function load_roster($teamid, $seasonid) {

    	// Use the team id to load the roster
		$this -> db -> where('TeamId', $teamid);

    	// Use the team id to load the roster
		$this -> db -> where('SeasonId', $seasonid);

	    // Perform the query
	    $query = $this -> db -> get('AllRosters');

	    // If query returns 1 or more results, return data as array
	    // If query returns 0 rows, then return false
	    if ($query -> num_rows() > 0) {
	        foreach ($query -> result() as $row) {
	        	$playerid = $row -> UserId;
	        	$seasonid = $row -> SeasonId;

	        	// calculate games played by the user
	        	$row -> GP = $this -> get_games_played($playerid, $seasonid);
	            $data[] = $row;
	        }
	        return $data;
	    }
	    return false;
   	}

	// --------------------------------------------------------------------
	/**
	 * Get Games Played by Player
	 *
	 * Calculates the games played by a player in a season
	 *
	 */

    public function get_games_played($playerid, $seasonid) {

    	// Use the team id to load the roster
		$this -> db -> where('PlayerId', $playerid);
		$this -> db -> where('SeasonId', $seasonid);

		// count the rows in the lineup table
		$this -> db -> from('LineUp');
		return $this -> db -> count_all_results();		
   	}   	

	// --------------------------------------------------------------------
	/**
	 * Load Lineup
	 *
	 * Loads the lineup of the team into an array
	 *
	 */

    public function load_lineup($teamid, $gameid) {

    	// Get a list of the player ids
    	$this -> db -> select('PlayerId, JerseyNo, FullName, Captain, SeasonId');

    	// Define the where clause
    	$this -> db -> where('GameId', $gameid);
    	$this -> db -> where('TeamId', $teamid);

    	$data = array();

	    // Perform the query
	    $query = $this -> db -> get('AllLineupPlayers');

	    if ($query -> num_rows() > 0) {
	        foreach ($query -> result() as $row) {

	        	// Stash player data
	            $player = $row -> PlayerId;
	            $jersey = $row -> JerseyNo;
	            $name = $row -> FullName;
	            $captain = $row -> Captain;
	            $seasonid = $row -> SeasonId;

	            // Get the games played for this player
	            $gamesplayed = $this -> get_games_played($player, $seasonid);

	            // Get the goal totals for this game
	            $goals = $this -> get_player_goals($player, $seasonid, $gameid);

	            // Get the assist totals for this game
	            $assists = $this -> get_player_assists($player, $seasonid, $gameid);

				// Get the PIM totals
				$pim = $this -> get_player_pim($player, $seasonid, $gameid);

				$push_me = array (
					'PlayerId' => $player,
					'JerseyNo' => $jersey,
					'FullName' => $name,
					'GP' => $gamesplayed,
					'Goals' =>  $goals,
					'Assists' => $assists,
					'PIM' => $pim,
					'Captain' => $captain
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
	 * Get Player Goals
	 *
	 * Gets the goals for the provided player, also takes an optional 
	 * $gameid parameter that selects which game we are retrieving for,
	 * as well as an optional season id parameter
	 *
	 */

	public function get_player_goals($player, $seasonid = '', $gameid = '') { 

        // If a $seasonid is provided
        if($seasonid != '')
        	$this -> db -> where('SeasonId', $seasonid);

		// If a $gameid is provided
		if($gameid != '')
        	$this -> db -> where('GameId', $gameid);

        // Set where clause
		$this -> db -> where('GoalId', $player);

		// From the scores table
		$this -> db -> from('AllScoringPlays');

		// Return the data
		return $this -> db -> count_all_results();
	}

	// --------------------------------------------------------------------
	/**
	 * Get Player Assists
	 *
	 * Gets the assists for the provided player, also takes an optional 
	 * $gameid parameter that selects which game we are retrieving for,
	 * as well as an optional season id parameter
	 *
	 */

	public function get_player_assists($player, $seasonid = '', $gameid = '') { 

        // If a $seasonid is provided
        if($seasonid != '')
        	$this -> db -> where('SeasonId', $seasonid);

		// If a $gameid is provided
		if($gameid != '')
        	$this -> db -> where('GameId', $gameid);

        // Set where clause
		$this -> db -> where('P_AssistId', $player);
		$this -> db -> or_where('S_AssistId', $player);

		// From the scores table
		$this -> db -> from('AllScoringPlays');

		// Return the data
		return $this -> db -> count_all_results();
	}

	// --------------------------------------------------------------------
	/**
	 * Get Player PIM
	 *
	 * Gets the penalties in minutes for the provided player, also takes an 
	 * optional $gameid parameter that selects which game we are retrieving 
	 * for, as well as an optional season id parameter
	 *
	 */

	public function get_player_pim($player, $seasonid = '', $gameid = '') { 

		// Sum the penalty minutes
		$this -> db -> select_sum('PenaltyMin');

		$this -> db -> from('AllPenaltyPlays');

        // If a $seasonid is provided
        if($seasonid != '')
        	$this -> db -> where('SeasonId', $seasonid);

		// If a $gameid is provided
		if($gameid != '')
        	$this -> db -> where('GameId', $gameid);

        // Set where clause
		$this -> db -> where('PlayerId', $player);

        // Set the group by clause
        $this -> db -> group_by('PlayerId');
		
		// Return the data
		$query = $this -> db -> get();

	    if ($query -> num_rows() > 0) {
	        return $query -> row('PenaltyMin');
	    }
	    return false;
	} 		

	// --------------------------------------------------------------------
	/**
	 * Update Lineup Status
	 *
	 * Tells the DB that the lineup has been submitted for either Away
	 * or Home teams
	 *
	 */

	function update_lineup_status($gameid, $side) {

		// Set the lineup as submitted (boolean)
		if ($side == 'Home')
			$data = array('HomeRoster' => 1);
		
		if ($side == 'Away')
			$data = array('AwayRoster' => 1);

		// Set the where clause
		$this -> db -> where('Id', $gameid);		

		// Update the row of the MatchFixture table
		return $this -> db -> update('MatchFixture', $data);			
	}

	// --------------------------------------------------------------------
	/**
	 * Submit Game Lineup
	 *
	 * Creates entries in the lineup table for each player selected also
	 * triggers an update for the roster table, which adds 1 to games
	 * played.
	 *
	 */

	function create_lineup($playerids, $teamid, $gameid) {
		
		$data = array();

		// Take each player id, assign it with their team id, and the game id
		foreach($playerids as $player)
		{
			$push_me = array (
				'PlayerId' => $player,
				'GameId' =>  $gameid,
				'TeamId' => $teamid
			);

			// Push it into the array
			array_push($data, $push_me);
		}

		// Insert the array into the db using batch insert
		return $this -> db -> insert_batch('LineUp', $data); 	
	}

	// --------------------------------------------------------------------
	/**
	 * Set Period
	 *
	 * Updates the current period for the game provided
	 *
	 */

    public function set_period($gameid, $period) {

		// Set the period
		$data = array('Progress' => $period);

		// Update only the selected game
		$this -> db -> where('Id', $gameid);

		// Perform Update
		return $this -> db -> update('MatchFixture', $data);
   	}

	// --------------------------------------------------------------------
	/**
	 * Save Scoring Play
	 *
	 * Saves the scoring play to the database
	 *
	 */

    public function save_scoring_play($scoring_data) {

		// Perform the insert
		return $this -> db -> insert('IndividualScoreHockey', $scoring_data); 
   	}    	

	// --------------------------------------------------------------------
	/**
	 * Get Scoring Summary
	 *
	 * Retrieves the scoring summary for a game id
	 *
	 */

    public function get_scoring_summary($gameid) {

		// From the MatchFixture table
		$this -> db -> from('AllScoringPlays');

		// Where gameid = $gameid
	    $this -> db -> where("GameId", $gameid);

	    // Perform the query
	    $query = $this -> db -> get();

	    // If query returns 1 or more results, return data as array, if query returns 0 rows, then return false
	    if ($query -> num_rows() > 0) {
	        foreach ($query -> result() as $row) {
	            $data[] = $row;
	        }
	        return $data;
	    }
	    return false;
   	}  	

	// --------------------------------------------------------------------
	/**
	 * Save Penalty
	 *
	 * Saves the penalty to the database
	 *
	 */

    public function save_penalty($penalty_data) {

		// Perform the insert
		return $this -> db -> insert('IndividualPenaltyHockey', $penalty_data); 
   	}    	   	

	// --------------------------------------------------------------------
	/**
	 * Get Penalty Summary
	 *
	 * Retrieves the penalty summary for a game id
	 *
	 */

    public function get_penalty_summary($gameid) {

		// From the MatchFixture table
		$this -> db -> from('AllPenaltyPlays');

		// Where gameid = $gameid
	    $this -> db -> where("GameId", $gameid);

	    // Perform the query
	    $query = $this -> db -> get();

	    // If query returns 1 or more results, return data as array, if query returns 0 rows, then return false
	    if ($query -> num_rows() > 0) {
	        foreach ($query -> result() as $row) {
	            $data[] = $row;
	        }
	        return $data;
	    }
	    return false;
   	}

	// --------------------------------------------------------------------
	/**
	 * Save Win
	 *
	 * Saves the win in the standings table
	 *
	 */

    public function save_win($seasonid, $teamid) {

    	// update + 1
		$this -> db -> set('Win', 'Win + 1', FALSE);

		// where season id and team id = parameters
		$this -> db -> where('SeasonId', $seasonid);
		$this -> db -> where('TeamId', $teamid);

		// perform update
		return $this -> db -> update('StandingHockey'); 
   	} 

	// --------------------------------------------------------------------
	/**
	 * Save Loss
	 *
	 * Saves the loss in the standings table
	 *
	 */

    public function save_loss($seasonid, $teamid) {

    	// update + 1
		$this -> db -> set('Lost', 'Lost + 1', FALSE);

		// where season id and team id = parameters
		$this -> db -> where('SeasonId', $seasonid);
		$this -> db -> where('TeamId', $teamid);

		// perform update
		return $this -> db -> update('StandingHockey'); 
   	}

	// --------------------------------------------------------------------
	/**
	 * Save Overtime Loss
	 *
	 * Saves the loss in the standings table
	 *
	 */

    public function save_ot_loss($seasonid, $teamid) {

    	// update + 1
		$this -> db -> set('OvertimeLoss', 'OvertimeLoss + 1', FALSE);

		// where season id and team id = parameters
		$this -> db -> where('SeasonId', $seasonid);
		$this -> db -> where('TeamId', $teamid);

		// perform update
		return $this -> db -> update('StandingHockey', $data); 
   	}     	    	      	    	 	 	
}