<?php
if (!defined('BASEPATH'))	exit('no direct script access allowed');

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

class Login extends CI_Controller {

	/**
	 * Constructor for the Login Class
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
		$this -> load -> helper('validation_helper');

		$this -> form_validation -> set_rules('email', 'email', 'required|trim|xss_clean|prep_for_form|callback_validate_email');
		$this -> form_validation -> set_rules('password', 'password', 'required|callback_validate_user');

		if ($this -> form_validation -> run() == FALSE) {
			echo json_encode(array("success" => false,
				"message" => 'The email or password you entered is incorrect.'));	

		} else {
			//Refreh
			echo json_encode(array("success" => true));
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
				$sess_array = array(
					'id' => $row -> Id,
					'fullname' => $row -> FullName
					);

				$this -> session -> set_userdata('authorized', $sess_array);
			}
			return TRUE;
		} else {
			$this -> form_validation -> set_message('authenticate_user', 'Invalid username or password');
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Callback function for validate_email
	 */

	function validate_email($email) {
		return validate_email($this -> form_validation, $email);
	}

	// --------------------------------------------------------------------
}
?>
