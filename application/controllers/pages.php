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

		$this -> load -> model('Division_Model');
		$this -> load -> model('News_Model');

		$this -> load -> helper('date');
		$this -> load -> helper('template');
		$this -> load -> helper(array('form', 'url'));

		$this -> live_scores = "live scores";
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

		$data['dob_year'] = get_birth_years(); //Get Birth Year
		$data['dob_month'] = get_months_short(); //Get Birth Month
		$data['dob_day'] = get_days(); //Get Birth Day
		$data['news'] = $this -> News_Model -> get_news(5, 0); // retrieve news
		$data['archive'] = "News Archive";

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
	 * Team Profile
	 *
	 * Displays team by id
	 *
	 */

	function team($id) {
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
	 * Player Profile
	 *
	 * Displays team by id
	 *
	 */

	function player($id) {
		$data['team'] = $this -> Division_Model -> get_team_by_id($id); // retrieve team info
		$data['roster'] = $this -> Division_Model -> get_team_roster_by_id($id); // retrieve team roster

		// Provide a page title
		$data['title'] = "Player Profile";

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/player_profile.php', $data);
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

		//Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		// Provide a page title
		$data['title'] = "Scores";

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php
	
		// Load data for todays games
		$data['games'] = $this -> Division_Model -> get_mini_boxscores();

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/scores.php', $data);
		$this -> load -> view('templates/footer');
	}
}
?>