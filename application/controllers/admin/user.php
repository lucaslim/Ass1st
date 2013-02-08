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
				'label' => 'ID',
				'name' => 'Id',
				'width' => 100,
				'size' => 10
				),
				array(
				'label' => 'Full Name',
				'name' => 'FullName',
				'width' => 400,
				'size' => 10
				),
				array(
				'label' => 'Email',
				'name' => 'Email',
				'width' => 500,
				'size' => 10
				)
				),
				'div_name' => 'grid',
				'source' => 'admin/user/view',
				'sort_name' => 'FullName',
				'row_num' => 10,
				'add_url' => 'admin/user/add',
				'edit_url' => 'customer/exec/edit',
				'delete_url' => 'customer/exec/del',
				'caption' => 'User database',
				'primary_key' => 'Id',
				'grid_height' => 230
		);
		
		$data['data_grid'] = buildGrid($grid_data);
		
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

	function view() {
		
		//Load required model, helper, library class file.
		$this -> load -> helper('url_helper');
		$this -> load -> helper('jqgrid_helper');

		buildGridData(
			array(
				'model' => 'user_model',
				'method' => 'get_users',
				'pkid' => 'Id',
				'columns' => array('Id', 'FullName', 'Email')
			)
		);				
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