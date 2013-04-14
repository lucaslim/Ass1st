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
		$this -> load -> library('ScheduleGenerator', '', 'schedule');

		$this -> schedule -> set_threshold(15);
		$this -> schedule -> set_season_start_date('2013-04-01');
		$this -> schedule -> set_total_regular_games(82);
		$this -> schedule -> set_league_id(1);
		$this -> schedule -> set_season_id(1);
		$this -> schedule -> set_games_per_week(8);
		$this -> schedule -> set_days_to_play(array("Tuesday", "Thursday"));

		$data["generated_schedule"] = $this -> schedule -> generate();

		$this -> load -> view('admin/template/header');
		$this -> load -> view('admin/matchfixture_generate_view', $data);
		$this -> load -> view('admin/template/footer');	
	}

	// --------------------------------------------------------------------
}
?>