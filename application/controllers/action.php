<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Assist
 *
 * This is where all the action script for POST/GET be placed
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class Action extends CI_Controller {

	/**
	 * Constructor for the Action Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> model('User_Model', 'user', TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Authenticates user based on given password and email address.
	 *
	 * It will call form_validation object to make sure all requirements are met
	 * before redirecting to the destination page. If not the system will redirect
	 * the user back to the login page
	 *
	 */
	function login_verify() {

		//Set Form validation
		$this -> load -> library('form_validation');

		$this -> form_validation -> set_rules('email', 'Email', 'required');
		$this -> form_validation -> set_rules('password', 'Password', 'required|callback_validate_user');

		if ($this -> form_validation -> run() == FALSE) {
			//Field validation failed.  User redirected to login page
			$this -> load -> view('login_view');
		} else {
			//Go to private area
			redirect('admin/home', 'refresh');
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Valiate the email and password
	 *
	 * Make sure the email and password matches the one in the database
	 * If email and password matches, it will create a session for the
	 * authorize user. If not user will be prompt an error message
	 *
	 */
	function validate_user($password) {
		$email = $this -> input -> post('email');

		//authenticate user
		$result = $this -> user -> authenticate_user($email, $password);

		if ($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array('id' => $row -> Id, 'fullname' => $row -> FullName);
				$this -> session -> set_userdata('authorized', $sess_array);
			}
			return TRUE;
		} else {
			$this -> form_validation -> set_message('authenticate_user', 'Invalid username or password');
			return FALSE;
		}
	}
}
?>