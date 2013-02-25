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
		//Load required model, helper, library class file.
		$this -> load -> helper('url_helper');
		$this -> load -> helper('jqgrid_helper');
		
		$grid_data = array(
				'set_columns' => array(
				array(
				'label' => 'Full Name',
				'name' => 'FullName',
				'width' => 300,
				'size' => 10
				),
				array(
				'label' => 'Email',
				'name' => 'Email',
				'width' => 300,
				'size' => 10
				),
				array(
				'label' => 'Height',
				'name' => 'Height',
				'width' => 50,
				'size' => 10
				),
				array(
				'label' => 'Weight',
				'name' => 'Weight',
				'width' => 50,
				'size' => 10
				),
				array(
				'label' => 'Date of Birth',
				'name' => 'DateOfBirth',
				'width' => 70,
				'size' => 10
				),
				array(
				'label' => 'Status',
				'name' => 'Status',
				'width' => 50,
				'size' => 10
				)
				),
				'div_name' => 'grid',
				'source' => 'admin/user/view',
				'suburl' => 'admin/user/view_sub',
				'sort_name' => 'FullName',
				'row_num' => 10,
				'add_url' => 'admin/user/add',
				'edit_url' => 'customer/exec/edit',
				'delete_url' => 'customer/exec/del',
				'caption' => 'User database',
				'primary_key' => 'Id',
				'grid_height' => 230,
				'subgrid'=> true,
				'subgrid_url' => 'view_sub',
				'subgrid_columnnames' => array('Address', 'City', 'Province', 'CountryName', 'Contact Number', 'Other Number'),
				'subgrid_columnwidth' => array(200,70,70,70,70,70)
		);
		
		$data['data_grid'] = buildGrid($grid_data);
		
		//load view
		$this -> load -> view('admin/user_view_view', $data);
	}

	// --------------------------------------------------------------------

	/**
	 * JQGrid view for the User Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User/).
	 * The system will load this function by default
	 *
	 */

	function view() {
		
		//Load required model, helper, library class file.
		$this -> load -> helper('url_helper');
		$this -> load -> helper('jqgrid_helper');

		buildGridData(
			array(
				'model' => 'user_model',
				'method' => 'get_users',
				'pkid' => 'Id',
				'columns' => array('FullName', 'Email', 'Height', 'Weight', 'DateOfBirth', 'Status'),
				
			)
		);				
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