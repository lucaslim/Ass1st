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
		$this -> load -> helper('date');

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
	 * Edit Game
	 *
	 * Edit selected game, takes one parameter, the game id you wih to
	 * edit
	 *
	 */

    public function edit_game($gameid) {

    	// Make sure user provides valid game id
    	if($gameid <= 0 )
    		header('location: ../view_games');

    	// If no game id provided, take user to view_games
    	if($gameid == '' || empty($gameid) || !isset($gameid))
    		header('location: ../scorekeeper/view_games');

    	// Validate form
		$this -> form_validation -> set_rules('date', 'Date', 'required'); // date is required
		$this -> form_validation -> set_rules('time', 'Time', 'required'); // time is required
		$this -> form_validation -> set_rules('scorehome', 'Home Team Score', 'required'); // home score is required
		$this -> form_validation -> set_rules('scoreaway', 'Away Team Score', 'required'); // away score is required
		
		if ($this -> form_validation -> run() === FALSE)
		{
		    // Load the game info into $data
		    $data["game"] = $this -> Scorekeeper_Model -> get_game_by_id($gameid);

		    // Load the view
		    $this -> load -> view('admin/template/header');
		    $this -> load -> view("admin/scorekeeper_edit_game", $data);
		    $this -> load -> view('admin/template/footer');
		}
		else
		{
			// If submitted & passed validation, create the new game
			$this -> Scorekeeper_Model -> update_game($gameid);

			// Provide success message via session variable
			$_SESSION['message'] = "Game(s) edited successfully";

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
			// Load the rosters
			$data['hometeam'] = $this -> Scorekeeper_Model -> load_roster($data['game'] -> HomeTeamId);
			$data['awayteam'] = $this -> Scorekeeper_Model -> load_roster($data['game'] -> AwayTeamId);

		    // Load the view
		    $this -> load -> view('admin/template/header');
		    $this -> load -> view("admin/scorekeeper_prepare_game", $data);
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

	    // Load array of datas
	    $data['twentyminutes'] = get_20_minutes();
	    $data['sixtyseconds'] = get_60_seconds();
	    $data['penalty_types'] = get_penalty_types();

		// Load the rosters
		$data['hometeam'] = $this -> Scorekeeper_Model -> load_lineup($hometeam, $gameid);
		$data['awayteam'] = $this -> Scorekeeper_Model -> load_lineup($awayteam, $gameid);

		// Load the scoring summary
		$data['scoring'] = $this -> Scorekeeper_Model -> get_scoring_summary($gameid);
		$data['penalty'] = $this -> Scorekeeper_Model -> get_penalty_summary($gameid);

	    // Load the view
	    $this -> load -> view('admin/template/header');
	    $this -> load -> view("admin/scorekeeper_view", $data);
	    $this -> load -> view('admin/template/footer');		
   	}

	// --------------------------------------------------------------------
	/**
	 * Save Scoring
	 *
	 * Saves scoring plays to the database
	 *
	 */

    public function save_score($gameid, $teamid) {

		// Make sure user has at least one game selected
		$this -> form_validation -> set_rules('goal', 'Games', 'required|xss_clean');

		if ($this -> form_validation -> run() === FALSE)
		{
			// Provide error message via session variable
			$_SESSION['message'] = "Error! Invalid scoring play";

			// Direct user to the scorekeeping application
			header('location: ../play_game/' . $gameid);			
		}

		// Grab the game data
		$data['game'] = $this -> Scorekeeper_Model -> get_game_info($gameid);

		// Assign game info to variables
		$period = $data['game'] -> Progress;
		$seasonid = $data['game'] -> SeasonId;
		$teamside = $this -> input -> post('teamside');

		// Assign the scorers to a variable
		$goal = $this -> input -> post('goal');
		$p_assist = $this -> input -> post('p_assist');
		$s_assist = $this -> input -> post('s_assist');

		if(empty($p_assist))
			$p_assist = null;

		if(empty($s_assist))
			$s_assist = null;

		// Assign the time & strength to variables
		$time = $this -> input -> post('minute') . ":" . $this -> input -> post('seconds');
		$str = $this -> input -> post('strength');

		// Save the data to the database
	    $this -> Scorekeeper_Model -> save_scoring_play($teamid, $gameid, $seasonid, $goal, $p_assist, $s_assist, $period, $time, $str);    	

		// Update the game score
	    $this -> Scorekeeper_Model -> update_score($gameid, $teamside);

		// Provide success message via session variable
		$_SESSION['message'] = "Scoring play saved";

		// Direct user to the scorekeeping application
		header('location: ../../play_game/' . $gameid);	
   	}

	// --------------------------------------------------------------------
	/**
	 * Save Penalty
	 *
	 * Saves penalties to the database
	 *
	 */

    public function save_penalty($gameid, $teamid) {

		// Make sure user has at least one game selected
		$this -> form_validation -> set_rules('player', 'Player', 'required|xss_clean');

		if ($this -> form_validation -> run() === FALSE)
		{
			// Provide error message via session variable
			$_SESSION['message'] = "Error! Invalid penalty!";

			// Direct user to the scorekeeping application
			header('location: ../play_game/' . $gameid);			
		}

		// Grab the game data
		$data['game'] = $this -> Scorekeeper_Model -> get_game_info($gameid);

		// Assign the penalty to a variable, it comes in as 'key:value', we will use explode() to split the string into an array
		$penalty = $this -> input -> post('penalty');
		$arr = explode(':', $penalty);		

		$penalty_data = array(
			'GameId' => $gameid,
			'TeamId' => $teamid,
			'Period' => $data['game'] -> Progress,
			'SeasonId' => $data['game'] -> SeasonId,
			'TeamSide' => $this -> input -> post('teamside'),
			'Player' => $this -> input -> post('player'),
			'PenaltyType' => $arr[1],
			'PenaltyMin' => $arr[0],
			'Time' => $this -> input -> post('minute') . ":" . $this -> input -> post('seconds'),
			'Strength' => $this -> input -> post('strength')
		);

		var_dump($penalty_data);

		// Save the data to the database
	    $this -> Scorekeeper_Model -> save_penalty($penalty_data);    	

		// Provide success message via session variable
		$_SESSION['message'] = "Penalty saved";

		// Direct user to the scorekeeping application
		header('location: ../../play_game/' . $gameid);
   	}   	
}
