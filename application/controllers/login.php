<?php
if (!defined('BASEPATH'))
	exit('no direct script access allowed');
/**
 * Assist
 *
 * This is the controller for the login
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Login extends CI_Controller {

	/**
	 * Constructor for the Login Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Login Class
	 *
	 * In case no parameters are given in the Url (e.g. path/Login/).
	 * The system will load this function by default
	 *
	 */

	function index() {
		$this -> load -> helper(array('form', 'url'));
		$this -> load -> view('login_view');
	}

	// --------------------------------------------------------------------
}
?>
