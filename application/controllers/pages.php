<?php
if (!defined('BASEPATH')) exit('no direct script access allowed');

/**
 * Assist
 *
 * This is the controller for the index page
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Pages extends CI_Controller {

	/**
	 * Constructor for the Pages Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		// Load Models
		$this -> load -> model('Division_Model');
		$this -> load -> model('Scorekeeper_Model');
		$this -> load -> model('News_Model');

		// Load Libraries	
		$this -> load -> library('pagination');	

		// Load Helpers
		$this -> load -> helper('date');
		$this -> load -> helper('template');
		$this -> load -> helper('scoring');
		$this -> load -> helper(array('form', 'url'));
	}	

	// --------------------------------------------------------------------
	/**
	 * Default index for the Pages Class
	 *
	 * In case no parameters are given in the Url (e.g. path/Login/).
	 * The system will load 'home' by default
	 *
	 */

	function index($loadThisPage = 'home') {
		
		if (!file_exists('application/views/pages/'.$loadThisPage.'.php'))
		{
			show_404();
		}

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		$data['dob_year'] = get_birth_years(); //Get Birth Year
		$data['dob_month'] = get_months_short(); //Get Birth Month
		$data['dob_day'] = get_days(); //Get Birth Day
		$data['news'] = $this -> News_Model -> get_news(5, 0); // retrieve news
		$data['archive'] = "News Archive";

		// Get leader stat data
		$data['leadingscorers'] = $this -> Division_Model -> get_leading_scorers('Goals', 5);
		$data['leadingassists'] = $this -> Division_Model -> get_leading_scorers('Assists', 5);

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php

		$data['title'] = ucfirst($loadThisPage); // Use the file as the title
		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/'.$loadThisPage, $data);
		$this -> load -> view('templates/footer', $data);
	}

	// --------------------------------------------------------------------
	/**
	 * News Page 
	 *
	 * Displays news by $id or display headlines if no $id provided
	 *
	 */

	function news($id = FALSE) {

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php

		if ($id != FALSE)
		{
			$data['news'] = $this -> News_Model -> get_news_by_id($id); // retrieve news
			$data['headlines'] = $this -> News_Model -> get_news_headlines(); // retrieve news titles
			$data['title'] = "View News Item";

			$this -> load -> view('templates/header', $data);
			$this -> load -> view('pages/news_single.php', $data);
			$this -> load -> view('templates/footer');
		}
		else
		{
			$data['news'] = $this -> News_Model -> get_news(5, 0); // retrieve 5 latest headlines and descriptions
			$data['title'] = "Latest News"; // Use the file as the title
		
			$this -> load -> view('templates/header', $data);
			$this -> load -> view('pages/news.php', $data);
			$this -> load -> view('templates/footer');
		}
	}

	// --------------------------------------------------------------------
	/**
	 * Standings Page
	 *
	 * Displays the standings for the league, defaults to 1 if none provided
	 * TODO: Should accept league id argument, as well, if no season id provided
	 * should take user to a page that allows them to select a season
	 *
	 */

	function standings($seasonid = '1', $leagueid = '1') {

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		$data['teams'] = $this -> Division_Model -> get_standings($seasonid, $leagueid); // retrieve teams

		// provide a page title
		$data['title'] = "League Standings";

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/standings.php', $data);
		$this -> load -> view('templates/footer');
	}

	// --------------------------------------------------------------------
	/**
	 * Schedule Page
	 *
	 * Displays the scheduled upcoming games
	 *
	 */

	function schedule($seasonid = 1) {

		// Configuration options for pagination
		$config['base_url'] = base_url() . '/pages/schedule/' . $seasonid; 
		$config['total_rows'] = $this -> Scorekeeper_Model -> game_count($seasonid); // Returns total rows
		$config['per_page'] = 50; // Determines how many games per page
		$config['uri_segment'] = 4; // 5th segment of the URI contains the page # (for ex. controller/function/seasonid/pagenumber)

		// Initialize pagination using the $config options
		$this -> pagination -> initialize($config); 

		// Determine which page number we are on
        $page = ($this -> uri -> segment(4)) ? $this -> uri -> segment(4) : 0;

        // Load the results per page
        $data['games'] = $this -> Scorekeeper_Model -> get_schedule($seasonid, $config['per_page'], $page);
        
        // Create the pagination links
        $data['links'] = $this -> pagination -> create_links();

        // Count total games
        $data['totalrow'] = $this -> Scorekeeper_Model -> game_count($seasonid);       

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		// Provide a page title
		$data['title'] = "League Schedule";

		// Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php

		// Load the view
		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/schedule.php', $data);
		$this -> load -> view('templates/footer');
	}	

	// --------------------------------------------------------------------
	/**
	 * Team Profile
	 *
	 * Displays team by id
	 *
	 */

	function team($id) {

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		$data['team'] = $this -> Division_Model -> get_team_by_id($id); // retrieve team info
		$data['roster'] = $this -> Division_Model -> get_team_roster_by_id($id); // retrieve team roster

		// Provide a page title
		$data['title'] = "Team Profile";

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/team_profile.php', $data);
		$this -> load -> view('templates/footer');
	}

	// --------------------------------------------------------------------		
	/**
	 * User Profile
	 *
	 * Displays team by id
	 *
	 */
	function user_profile($id) {


		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();
		
		$data['team'] = $this -> Division_Model -> get_team_by_id($id); // retrieve team info
		$data['roster'] = $this -> Division_Model -> get_team_roster_by_id($id); // retrieve team roster

		// Provide a page title
		$data['title'] = "Player Profile";

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/user_profile.php', $data);
		$this -> load -> view('templates/footer');
	}

	// --------------------------------------------------------------------		
	/**
	 * Scores
	 *
	 * Displays the scores for the games played today
	 *
	 */

	function scores() {

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		// Provide a page title
		$data['title'] = "Scores";

		// Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php
	
		// Load data for todays games
		$data['games'] = $this -> Division_Model -> get_mini_boxscores();

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/scores.php', $data);
		$this -> load -> view('templates/footer');
	}

	// --------------------------------------------------------------------		
	/**
	 * Box Score
	 *
	 * Displays the full score details for the selected game id
	 *
	 */

	function boxscore($gameid) {
		// Redirect if no id provided
		if (!isset($gameid))
			header('Location: ../scores');

		// Get game info
		$data['gameinfo'] = $this -> Scorekeeper_Model -> get_game_by_id($gameid);		

		// If game hasn't started, then redirect
		if($data['gameinfo'] -> Progress == 'false')
			header('Location: ../scores');

		// Variables for teams
		$hometeamid = $data['gameinfo'] -> HomeTeamId;
		$awayteamid = $data['gameinfo'] -> AwayTeamId;

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		// Provide a page title
		$data['title'] = "Boxscore - " . $gameid;

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php
	
		// Load data for todays games
		$data['progress'] = convert_period_string($data['gameinfo'] -> Progress); 

		$data['hometeaminfo'] = $this -> Division_Model -> get_team_by_id($hometeamid);
		$data['awayteaminfo'] = $this -> Division_Model -> get_team_by_id($awayteamid);

		$data['hometeamscore'] = $this -> Scorekeeper_Model -> get_team_score($gameid, $hometeamid);
		$data['awayteamscore'] = $this -> Scorekeeper_Model -> get_team_score($gameid, $awayteamid);

		$data['hometeamboxscore'] = $this -> Scorekeeper_Model -> get_team_score_array($gameid, $hometeamid);
		$data['awayteamboxscore'] = $this -> Scorekeeper_Model -> get_team_score_array($gameid, $awayteamid);

		$data['hometeamstats'] = $this -> Scorekeeper_Model -> load_lineup($hometeamid, $gameid);
		$data['awayteamstats'] = $this -> Scorekeeper_Model -> load_lineup($awayteamid, $gameid);

		$data['scoring'] = $this -> Scorekeeper_Model -> get_scoring_summary($gameid);
		$data['penalties'] = $this -> Scorekeeper_Model -> get_penalty_summary($gameid);

		// Load additional data
		$data['time'] = date('g:i A', strtotime($data['gameinfo'] -> Time)) . " -  " . date('l, F, j', strtotime($data['gameinfo'] -> Date));

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/boxscore.php', $data);
		$this -> load -> view('templates/footer');
	}	
}
?>