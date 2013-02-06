<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Assist
 *
 * This is the controller for the User_Role class
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class User_Role extends CI_Controller {
	/**
	 * Constructor for the Login Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> helper('date');
		$this -> load -> model('Country_Model', 'country', TRUE);
		$this -> load -> model('User_Model', 'user', TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the User Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User_Role/).
	 * The system will load this function by default
	 *
	 */
	function index() {

	}

	// --------------------------------------------------------------------
}