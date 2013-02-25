<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Assist
 *
 * This is the controller for Quick Register, this controller will be
 * included in the home page
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------
class Quick_Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$this -> load -> helper('date');
		$this -> load -> helper(array('form', 'url'));

		$data['base'] = $this -> config -> item('base_url');
		$data['title'] = 'Player Registration';

		//Get Birth Year
		$data['dob_year'] = get_birth_years();
		//Get Birth Month
		$data['dob_month'] = get_months();
		//Get Birth Day
		$data['dob_day'] = get_days();

		$this -> load -> view('quick_register_view', $data);
	}

	// ------------------------------------------------------------------------

	/**
	 * User Quick Registration
	 *
	 * Allows public users to register from the main homepage.
	 *
	 */

	function register_user() {

		//Load required helper and models
		$this -> load -> model('User_Model', 'user', TRUE);
		$this -> load -> library('form_validation');
		$this -> load -> helper('validation_helper');

		//Get post array
		$result = $this -> input -> post(NULL, TRUE);

		//make sure user doesn't run the action script immediately
		if (!$result)
			return;
		
		//Set rules
		$rules = array( array('field' => 'first_name', 'label' => 'first name', 'rules' => 'required'),
					    array('field' => 'last_name', 'label' => 'last name', 'rules' => 'required'),
					    array('field' => 'email', 'label' => 'email', 'rules' => 'required|trim|xss_clean|prep_for_form|callback_validate_email'),
					    array('field' => 'password', 'label' => 'password', 'rules' => 'required|min_length[8]'),
					    array('field' => 'repassword', 'label' => 're-password', 'rules' => 'required|min_length[8]'),
					    array('field' => 'dob_year', 'label' => 'year', 'rules' => 'required'),
					    array('field' => 'dob_month', 'label' => 'month', 'rules' => 'required'),
					    array('field' => 'dob_day', 'label' => 'day', 'rules' => 'required'),
					    array('field' => 'gender', 'label' => 'gender', 'rules' => 'required'),
						array('field' => 'terms' , 'label' => 'terms', 'rules' => 'required'));
						
		$this -> form_validation -> set_rules($rules);

		//validate all required field
		if ($this -> form_validation -> run() == FALSE) {
			echo json_encode(array("message" => form_error('first_name') . 
												form_error('last_name') . 
												form_error('email') . 
												form_error('password') . 
												form_error('repassword') . 
												form_error('dob_year') . 
												form_error('dob_month') . 
												form_error('dob_day') . 
												form_error('gender') . 
												(form_error('terms') != '' ? 'Please agree with the terms before proceeding.' : '')));
			return;
		}

		//Register user
		$this -> user -> quick_register($result);

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