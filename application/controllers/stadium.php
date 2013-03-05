<?php
if (!defined('BASEPATH'))
	exit('no direct script access allowed');
/**
 * Assist
 *
 * This is the controller for the stadium locator
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Stadium extends CI_Controller {

	/**
	 * Constructor for the Stadium Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();
		
		$this -> load -> model('Stadium_Model', 'stadium', TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Stadium Class
	 *
	 * In case no parameters are given in the Url (e.g. path/Login/).
	 * The system will load this function by default
	 *
	 */

	function index() {
		$this -> load -> view('stadium_view');
	}

	// --------------------------------------------------------------------

	/**
	 * Load Stadium Data
	 *
	 * Load all the stadium data from the database
	 *
	 */

	function load_stadium_data() {
		$arrStadiums = $this -> stadium -> get_stadium_data();
		
		echo json_encode($arrStadiums);
	}

	// --------------------------------------------------------------------

}
