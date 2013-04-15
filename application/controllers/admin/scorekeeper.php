<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the controller for the Home (Admin) class
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Scorekeeper extends Admin_Controller {

	function __construct() {
		parent::__construct();

		// start session so we can use session variables
		session_start();

		// load helpers
		$this -> load -> helper('url');
		$this -> load -> helper('form');
		$this -> load -> helper('scoring');

		// load libraries
		$this -> load -> library('form_validation');
		$this -> load -> library('pagination');		

		// load models
		$this -> load -> model('Division_Model');
		$this -> load -> model('Scorekeeper_Model');
	}

	// --------------------------------------------------------------------
	/**
	 * Default index for the Scorekeeper Class
	 *
	 * Directs user to the scorekeeper if they are logged in
	 *
	 */

	public function index() {
		$data['teams'] = $this -> Division_Model -> get_teams(); // retrieve teams

		$this -> load -> view('admin/template/header', $data);
		$this -> load -> view('admin/scorekeeper', $data);
		$this -> load -> view('admin/template/footer', $data);
	}

	// --------------------------------------------------------------------
	/**
	 * View games
	 *
	 * Shows the listing of all the games MatchFixtures for a season. Allows
	 * admin to edit or delete a MatchFixtured game. Takes one parameter, 
	 * which represents the season the user wants to view
	 *
	 * If no season is provided, the default is 0, all seasons available
	 *
	 */

	public function view_games($seasonid = 0) {

		// Configuration options for pagination
		$config['base_url'] = base_url() . 'admin/scorekeeper/view_games/' . $seasonid; 
		$config['total_rows'] = $this -> Scorekeeper_Model -> game_count(); // Returns total rows
		$config['per_page'] = 10; // Determines how many games per page
		$config['uri_segment'] = 5; // 5th segment of the URI contains the page # (for ex. controller/function/seasonid/pagenumber)

		// Initialize pagination using the $config options
		$this -> pagination -> initialize($config); 

		// Determine which page number we are on
        $page = ($this -> uri -> segment(5)) ? $this -> uri -> segment(5) : 0;

        // Load the results per page
        $data['games'] = $this -> Scorekeeper_Model -> get_games($seasonid, $config['per_page'], $page);
        
        // Create the pagination links
        $data['links'] = $this -> pagination -> create_links();

        $data['totalrow'] = $this -> Scorekeeper_Model -> game_count($seasonid);       

        // Load the view
        $this -> load -> view('admin/template/header');
        $this -> load -> view("admin/scorekeeper_list_view", $data);
        $this -> load -> view('admin/template/footer');

    	// Clear session message after the view loads
    	$_SESSION['message'] = "";        
	}	

	// --------------------------------------------------------------------
	/**
	 * Add a new game
	 *
	 * Adds the game to MatchFixture in the database
	 *
	 */

	public function add_game() {

		$this -> form_validation -> set_rules('date', 'Date', 'required'); // date is required
		$this -> form_validation -> set_rules('time', 'Time', 'required'); // time is required
		
		if ($this -> form_validation -> run() === FALSE)
		{
			// If form hasn't been submitted, display the view			
			$data['teams'] = $this -> Division_Model -> get_teams(); // retrieve a list of teams
			$data['seasons'] = $this -> Division_Model -> get_seasons(); // retrieve a list of seasons			
			$data['arenas'] = $this -> Division_Model -> get_arenas(); // retrieves a list of arenas
			$data['matchtypes'] = $this -> Division_Model -> get_match_types(); // retrieves the type of match

			$this -> load -> view('admin/template/header');
			$this -> load -> view('admin/scorekeeper_add_game', $data);
			$this -> load -> view('admin/template/footer');
		}
		else
		{
			// If submitted & passed validation, create the new game
			$this -> Scorekeeper_Model -> add_game();

			// Provide success message via session variable
			$_SESSION['message'] = "Game created successfully";

			// Return user to view_games
			header('location: view_games');
		}
	}

	// --------------------------------------------------------------------
	/**
	 * Delete Games
	 *
	 * Delete selected game, takes one parameter, the array of game ids
	 * you wish to delete
	 *
	 */

    public function delete_games() {
		
		// Make sure user has at least one game selected
		$this -> form_validation -> set_rules('delete[]', 'Games', 'required|xss_clean');

		if ($this -> form_validation -> run() === FALSE) 
		{
			// Provide success message via session variable
			$_SESSION['message'] = "No games selected!";

			// Return user to view_games
			header('location: view_games');
		}
		else 
		{
			// Assign delete array to a variable
			$gameids = $this -> input -> post('delete');

			// Perform the delete
			$this -> Scorekeeper_Model -> delete_games($gameids);

			// Provide success message via session variable
			$_SESSION['message'] = "Game(s) deleted successfully";

			// Return user to view_games
			header('location: view_games'); 			
		}
   	} 

	// --------------------------------------------------------------------
	/**
	 * Prepare Game
	 *
	 * Shows the admin a list of the rosters and allows them to select
	 * the players that will be involved in the game.
	 *
	 */

    public function prepare_game($gameid) {

	    // Load the game info into $data
	    $data['game'] = $this -> Scorekeeper_Model -> get_game_info($gameid);

	    $seasonid = $data['game'] -> SeasonId;
	    $homeid = $data['game'] -> HomeTeamId;
	    $awayid = $data['game'] -> AwayTeamId;

		// If the game is complete, take them to view games, else take them to the scorekeeper
		if ($data['game'] -> Progress == "complete")
		{
			// Provide success message via session variable
			$_SESSION['message'] = "Error! Game is currently unavailable. Check the status of the game.";

			// Return user to view_games
			header('location: ../view_games');	
		}
		else
		{
			// Prepare the data
			$home['gameid'] = $gameid;
			$home['data'] = $this -> Scorekeeper_Model -> load_roster($homeid, $seasonid);
			$home['team'] = 'Home';
			$home['teamid'] = $homeid;
			$home['name'] = $data['game'] -> HomeTeamName;
			$home['roster'] = $data['game'] -> HomeRoster;

			$away['gameid'] = $gameid;
			$away['data'] = $this -> Scorekeeper_Model -> load_roster($awayid, $seasonid);
			$away['team'] = 'Away';
			$away['teamid'] = $awayid;
			$away['name'] = $data['game'] -> AwayTeamName;
			$away['roster'] = $data['game'] -> AwayRoster;

		    // Load the view
		    $this -> load -> view('admin/template/header');
		    $this -> load -> view("admin/template/prepare_game_header", $data);
		    $this -> load -> view("admin/prepare_game_template", $home);
			$this -> load -> view("admin/prepare_game_template", $away);
			$this -> load -> view("admin/template/prepare_game_footer", $data);
		    $this -> load -> view('admin/template/footer');
		}
   	}  

	// --------------------------------------------------------------------
	/**
	 * Submit Roster
	 *
	 * Submits the roster for the team to the database, the game id and
	 * the team (away or home) must be provided.
	 *
	 */

    public function submit_lineup($gameid, $teamid, $side) {

		// Make sure user has at least one player selected
		$this -> form_validation -> set_rules('players[]', 'Games', 'required|xss_clean');

		if ($this -> form_validation -> run() === FALSE)
		{
			// Provide success message via session variable
			$_SESSION['message'] = "Invalid players selected for lineup creation";

			// Return user to start game
			header('location: ../../../prepare_game/' . $gameid);
		}
		else 
		{
			// Assign the player ids to a variable
			$playerids = $this -> input -> post('players');

			// Submit the lineup for the team
			$this -> Scorekeeper_Model -> create_lineup($playerids, $teamid, $gameid);

			// Update the lineup status to submitted
			$this -> Scorekeeper_Model -> update_lineup_status($gameid, $side);

			// Provide success message via session variable
			$_SESSION['message'] = "Roster submitted successfully";

			// Return user to view_games
			header('location: ../../../prepare_game/' . $gameid);		
		}
   	}

	// --------------------------------------------------------------------
	/**
	 * Start Game
	 *
	 * Checks to see if the roster is submitted and then sets the game
	 * to start if it is. Finally loads the play_game controller
	 *
	 */

    public function start_game($gameid) {
	    // Load the game info into $data
	    $data['game'] = $this -> Scorekeeper_Model -> get_game_info($gameid);

	    // Check that rosters are submitted
	    if ($data['game'] -> HomeRoster != 1 && $data['game'] -> AwayRoster != 1)
	    {
			// Provide success message via session variable
			$_SESSION['message'] = "Error! Invalid game lineup";

			// Return user to view_games
			header('location: ../view_games');	    	
	    }

		// Start the first period
		$this -> Scorekeeper_Model -> set_period($gameid, 1);

		// Direct user to the scorekeeping application
		header('location: ../play_game/' . $gameid);
    }

	// --------------------------------------------------------------------
	/**
	 * Play Game
	 *
	 * Run the scorekeeper application for a specific game id. Game has
	 * to be in progress for this function to run.
	 *
	 */

    public function play_game($gameid) {

	    // Load the game info into $data
	    $data['game'] = $this -> Scorekeeper_Model -> get_game_info($gameid);

	    // Define variables
	    $hometeam = $data['game'] -> HomeTeamId;
	    $awayteam = $data['game'] -> AwayTeamId;

	    // Load arrays of static data
	    $data['twentyminutes'] = get_20_minutes();
	    $data['sixtyseconds'] = get_60_seconds();
	    $data['penalty_types'] = get_penalty_types();

		// Load the required data for home team
		$home['team'] = 'Home';
		$home['teamname'] = $data['game'] -> HomeTeamName;
		$home['teamid'] = $hometeam;
		$home['roster'] = $this -> Scorekeeper_Model -> load_lineup($hometeam, $gameid);
		$home['score'] = $this -> Scorekeeper_Model -> get_team_score($gameid, $hometeam);	    
		
		// Load the required data for away team
		$away['team'] = 'Away';
		$away['teamname'] = $data['game'] -> AwayTeamName;
		$away['teamid'] = $awayteam;
		$away['roster'] = $this -> Scorekeeper_Model -> load_lineup($awayteam, $gameid);
		$away['score'] = $this -> Scorekeeper_Model -> get_team_score($gameid, $awayteam);	

		// Load the scoring summary
		$data['scoring'] = $this -> Scorekeeper_Model -> get_scoring_summary($gameid);
		$data['penalty'] = $this -> Scorekeeper_Model -> get_penalty_summary($gameid);

	    // Load the view
	    $this -> load -> view('admin/template/header');
	    $this -> load -> view("admin/template/scorekeeper_game_header", $data);
	    $this -> load -> view("admin/scorekeeper_data_template", $home);
		$this -> load -> view("admin/scorekeeper_data_template", $away);	    
		$this -> load -> view("admin/template/scorekeeper_game_footer", $data);	    
	    $this -> load -> view('admin/template/footer');

    	// Clear session message after the view loads
    	$_SESSION['message'] = "";
   	}

	// --------------------------------------------------------------------
	/**
	 * Change Period
	 *
	 * Change the current period to the period specified
	 *
	 */   	
	public function change_period($gameid, $period)
	{
		$update = $this -> Scorekeeper_Model -> set_period($gameid, $period);

	    if($update == TRUE)
	    {
			// Provide success message via session variable
			$_SESSION['message'] = "Success! Period changed";

			// redirect user to home if the game is complete
			if($period == 'complete')
				header('location: ../../view_games/');

			else
				header('location: ../../play_game/' . $gameid);
	    }
	    else
	    {
			// Provide success message via session variable
			$_SESSION['message'] = "Error! Period not changed";

			// Direct user to the scorekeeping application
			header('location: ../../play_game/' . $gameid);    	
	    }		
	}

	// --------------------------------------------------------------------
	/**
	 * Finish Game
	 *
	 * Take a game and marks it as complete
	 *
	 */   	
	public function finish_game($gameid)
	{
	    // Load the game info
	    $game = $this -> Scorekeeper_Model -> get_game_info($gameid);

	    // Define variables
	    $seasonid = $game -> SeasonId;
	    $progress = $game -> Progress;
	    $matchtype = $game -> MatchTypeId;
	    $hometeam = $game -> HomeTeamId;
	    $awayteam = $game -> AwayTeamId;

	    // Get the game scores
		$homeScore = $this -> Scorekeeper_Model -> get_team_score($gameid, $hometeam);	    
		$awayScore = $this -> Scorekeeper_Model -> get_team_score($gameid, $awayteam);		
		
		switch ($matchtype) 
		{
			case 1:
				// handle exhibition games
				break;
			case 2:
				 // handle practice games
				break;
			case 3:
				// handle regular season games
				if($homeScore > $awayScore) // if hometeam is winner
					$this -> save_result($seasonid, $gameid, $hometeam, $awayteam, $progress);
				
				elseif($awayScore > $homeScore) // if away is winner
					$this -> save_result($seasonid, $gameid, $awayteam, $hometeam, $progress);
				
				else 
				{
					// Provide success message via session variable
					$_SESSION['message'] = "Error! Game not completed";

					// Direct user to the scorekeeping application
					header('location: ../play_game/' . $gameid);
				}
			case 4:
				// handle playoff games
				break;
		}
		return;

	}	

	function save_result($seasonid, $gameid, $winner, $loser, $progress)
	{
		if ($progress == 4) // if it was in overtime, mark it as OT loss
			$loss = $this -> Scorekeeper_Model -> save_ot_loss($seasonid, $loser);
		else
			$loss = $this -> Scorekeeper_Model -> save_loss($seasonid, $loser);

		$win = $this -> Scorekeeper_Model -> save_win($seasonid, $winner);

		// confirm data was saved
		if($win == TRUE && $loss == TRUE)
		{
			$this -> Scorekeeper_Model -> set_period($gameid, 'complete');

			// Provide success message via session variable
			$_SESSION['message'] = "Saved! Game complete";

			// Direct user to the scorekeeping index
			header('location: ../view_games/');				
		}
		else
		{
			// Provide success message via session variable
			$_SESSION['message'] = "Error! Game not completed";

			// Direct user to the scorekeeping index
			header('location: ../play_game/' . $gameid);				
		}		
	}	

	// --------------------------------------------------------------------
	/**
	 * Save Scoring
	 *
	 * Saves scoring plays to the database
	 *
	 */

    public function save_score($gameid) {

		// Grab the game data
		$data['game'] = $this -> Scorekeeper_Model -> get_game_info($gameid);

		// Assign team side to variables
		$teamside = $this -> input -> post('teamside');

		// Assign the assists to a variable
		$p_assist = $this -> input -> post('p_assist');
		$s_assist = $this -> input -> post('s_assist');

		if(empty($p_assist))
			$p_assist = null;

		if(empty($s_assist))
			$s_assist = null;

		$scoring_data = array(
			'TeamId' => $this -> input -> post('teamid'),			
			'GameId' => $gameid,
			'Goal' => $this -> input -> post('goal'),
			'P_Assist' => $p_assist,
			'S_Assist' => $s_assist,
			'Period' => $data['game'] -> Progress,
			'Time' => $this -> input -> post('minute') . ":" . $this -> input -> post('seconds'),
			'Str' => $this -> input -> post('strength')
		);

		// Save the data to the database
	    $insert_goal = $this -> Scorekeeper_Model -> save_scoring_play($scoring_data);    	

	    if($insert_goal == TRUE)
	    {
			// Provide success message via session variable
			$_SESSION['message'] = "Success! Scoring play saved";

			// Direct user to the scorekeeping application
			header('location: ../play_game/' . $gameid);
	    }
	    else
	    {
			// Provide success message via session variable
			$_SESSION['message'] = "Error! Scoring play not saved";

			// Direct user to the scorekeeping application
			header('location: ../play_game/' . $gameid);	    	
	    }	
   	}

	// --------------------------------------------------------------------
	/**
	 * Save Penalty
	 *
	 * Saves penalties to the database
	 *
	 */

    public function save_penalty($gameid, $teamid) {

		// Grab the game data
		$data['game'] = $this -> Scorekeeper_Model -> get_game_info($gameid);

		// Assign the penalty to a variable, it comes in as 'key:value', we will use explode() to split the string into an array
		$penalty = $this -> input -> post('penalty');
		$arr = explode(':', $penalty);			

		$penalty_data = array(
			'TeamId' => $teamid,
			'GameId' => $gameid,
			'PlayerId' => $this -> input -> post('player'),
			'PenaltyType' => $arr[1],
			'PenaltyMin' => $arr[0],
			'Period' => $data['game'] -> Progress,
			'Time' => $this -> input -> post('minpim') . ":" . $this -> input -> post('secpim'),
		);

		// Save the data to the database
	    $insert = $this -> Scorekeeper_Model -> save_penalty($penalty_data);    	

	    if($insert == TRUE)
	    {
			// Provide success message via session variable
			$_SESSION['message'] = "Success! Penalty saved";

			// Direct user to the scorekeeping application
			header('location: ../../play_game/' . $gameid);
	    }
	    else
	    {
			// Provide success message via session variable
			$_SESSION['message'] = "Error! Penalty not saved";

			// Direct user to the scorekeeping application
			header('location: ../../play_game/' . $gameid);	    	
	    }
   	}   	
}
