<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

session_start();

class Manage_Team extends CI_Controller
{
	/**
	 * Constructor for the Team Color Controller Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */

	public function __construct()
	{
		parent::__construct();

		$this -> load -> model('Division_Model');
		$this -> load -> model('News_Model');
		$this -> load -> model('user_model');

		$this -> load -> helper('date');
		$this -> load -> helper(array('form', 'url'));

		$this -> load -> helper('template');
		$this -> load -> library('session');//loads the library for all the functions
		$this -> load -> helper('validation_helper');
		$this -> load -> helper('login_helper');
	}

	// --------------------------------------------------------------------

	/**
	 * Update Team Colors
	 *
	 * This will update the team colors to the database
	 *
	 */
	function update_colors() {
		$TPrimR = $this -> input -> post('primColorR');
		$TPrimG = $this -> input -> post('primColorG');
		$TPrimB = $this -> input -> post('primColorB');

		$TSecR = $this -> input -> post('secColorR');
		$TSecG = $this -> input -> post('secColorG');
		$TSecB = $this -> input -> post('secColorB');

		$TTerR = $this -> input -> post('terColorR');
		$TTerG = $this -> input -> post('terColorG');
		$TTerB = $this -> input -> post('terColorB');

		$id = $this -> input -> post('team_id');

		$data = array('PrimaryR' => $TPrimR, 'PrimaryG' => $TPrimG, 'PrimaryB' => $TPrimB, 'SecondaryR' => $TSecR, 'SecondaryG' => $TSecG, 'SecondaryB' => $TSecB, 'TertiaryR' => $TTerR, 'TertiaryG' => $TTerG, 'TertiaryB' => $TTerB );

		$query = $this -> Division_Model -> update_colors($id, $data);

		//If update passes, redirect to the player page
		if ($query)
		 	header("location: ../pages/user_profile/");
	}

	
	// --------------------------------------------------------------------

	/**
	 * Default index for the Match Attendance Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User/).
	 * The system will load this function by default
	 *
	 */

	public function index()	{
		$data['base'] = $this -> config -> item('base_url');
		$data['title'] = 'Attendance';

		//Check if logged in
		$data['login_header'] = set_login_header(); //get from template_helper.php
		
		$user_data = $this->session->userdata('authorized');//stores the information array for the user into $user_data
		
		
		$data['query']=$this->user_model->get_user_by_id($user_data['ID']);

		
		$data['results'] = $this -> user_model -> get_user_info($user_data['ID']);

		$this -> load -> view('templates/header', $data);
		$this -> load ->view('MatchAttendance_view.php', $data);
		$this -> load -> view('templates/footer', $data);
	}

	// --------------------------------------------------------------------

}
?>