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
	 * Constructor for the News Class
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
	 * Default index for the User Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User/).
	 * The system will load this function by default
	 *
	 */
	function index() {
		//redirect to view
		header('location: view');
	}

	// --------------------------------------------------------------------

	/**
	 * View User Page
	 *
	 * This will display the page with all the user listed on it.
	 *
	 */

	function view() {

		//Get total number of rows
		$total_rows = $this -> user -> count_users();

		//Set pagination data
		$data = get_pagination_data("admin/user/view", $total_rows);

		//Set news data
		$data['results'] = $this -> user -> get_users($data['per_page'], $data['current_page']);

		//load view
		$this -> load -> view('admin/user_list_view', $data);			
	}

	// --------------------------------------------------------------------

	/**
	 * JQGrid sub view for the User Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User/).
	 * The system will load this function by default
	 *
	 */

	 function view_sub() {
	 		
	 	//Load required model, helper, library class file.
		$this -> load -> helper('url_helper');
		$this -> load -> helper('jqgrid_helper');
		
		buildSubGridData(
			array(
				'model' => 'user_model',
				'method' => 'get_user_by_id',
				'columns' => array('Address', 'City', 'Province', 'CountryName', 'ContactNumber', 'OtherNumber')			
			)
		);
	 }	 

	// --------------------------------------------------------------------

	/**
	 * Add function for the User Class
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
	
	/**
	 * Creating new user account
	 *
	 * This will create a new user account using the admin module.
	 * Data will be added to 2 different tables. First the User
	 * table, and then the system will retrieve the return id and
	 * use it to insert into the UserTeamRole table in the database.
	 *
	 * Password will be hashed with MD5 before inserting into the
	 * database
	 *
	 */

	function new_user() {
		//Load required helper and models
		$this -> load -> model('User_Model', 'user', TRUE);
		$this -> load -> helper('security');

		//Get post array
		$result = $this -> input -> post(NULL, TRUE);

		//make sure user doesn't run the action script immediately
		if (!$result)
			return;


		//Get returned Id
		$return_id = $this -> user -> insert_new_user($result);

		//insert new user role
		$this -> user -> insert_user_role($return_id, $result['user_role']);

		//redirect back
		redirect('admin/user');
	}

	// --------------------------------------------------------------------
}
?>