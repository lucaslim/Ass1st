<?php
if (!defined('BASEPATH')) exit('no direct script access allowed');
session_start();
/**
 * Assist
 *
 * This is the controller for the login
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Logout extends CI_Controller {

	/**
	 * Constructor for the Logout Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Logout Class
	 *
	 * In case no parameters are given in the Url (e.g. path/Login/).
	 * The system will load this function by default
	 *
	 */

	function index() {
		$this->session->unset_userdata('authorized');
		session_destroy();
		redirect('pages');
	}

	// --------------------------------------------------------------------

}

// --------------------------------------------------------------------