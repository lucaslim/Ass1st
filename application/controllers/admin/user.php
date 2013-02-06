<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Assist
 *
 * This is the controller for the User
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class User extends CI_Controller {

	/**
	 * Default index for the User Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User/).
	 * The system will load this function by default
	 *
	 */
	function index() {

	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the User Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User/).
	 * The system will load this function by default
	 *
	 */
	function view() {

		//Load required model, helper, library class file.
		$this -> load -> helper('url');
		$this -> load -> model('User_Model', 'user', TRUE);
		$this -> load -> library('pagination');

		//set pagination configuration
		$config = array();
		$config['base_url'] = base_url() . 'index.php/admin/user/view';
		$config['total_rows'] = $this -> user -> count_users();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;

		//initialize pagination config
		$this -> pagination -> initialize($config);

		$uri_seg = $this -> uri -> segment($config['uri_segment']);
		$page = $uri_seg ? $uri_seg : 0;

		//create data for view
		$data['results'] = $this -> user -> get_users($config['per_page'], $page);
		$data['current_page'] = $page;
		$data['page_links'] = $this -> pagination -> create_links();

		//load view
		$this -> load -> view('admin/user_view_view', $data);
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the User Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User/).
	 * The system will load this function by default
	 *
	 */
	function add() {

		//Load required model, helper, library class file.
		$this -> load -> helper('date');
		$this -> load -> helper(array('form', 'url'));
		$this -> load -> model('Country_Model', 'country', TRUE);
		$this -> load -> model('User_Model', 'user', TRUE);

		//Get Birth Year
		$data['dob_year'] = get_birth_years();
		//Get Birth Month
		$data['dob_month'] = get_months();
		//Get Birth Day
		$data['dob_day'] = get_days();
		//Get Country Names
		$data['country'] = $this -> country -> get_country_names();
		//User Roles
		$data['user_roles'] = $this -> user -> get_user_roles();

		//Load data to view
		$this -> load -> view('admin/user_view', $data);
	}

	// --------------------------------------------------------------------
}
?>