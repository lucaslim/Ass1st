<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for User_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class User_Model extends CI_Model {

	/**
	 * Constructor for the User_Model Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> helper("grid_helper");
		$this -> load -> helper('security');
	}

	// --------------------------------------------------------------------

	/**
	 * Authenticates user based on given password and email address.
	 *
	 * This function will make sure that at least one value is return
	 * upon querying the database. If not it will return false.
	 *
	 */

	function authenticate_user($email, $password) {

		$this -> db -> select('Id, FullName, Picture');
		$this -> db -> from('AllUsers');
		$this -> db -> where('Email', $email);
		$this -> db -> where('Password', do_hash($password, 'md5'));
		//hash password with MD5
		$this -> db -> where('Status', 'Active');
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if ($query -> num_rows() == 1) {
			return $query -> row();
		} else {
			return false;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Get a list of user roles.
	 *
	 * This will return an array of user role for populating
	 * the select box
	 *
	 */
	function get_user_roles() {

		$query = $this -> db -> get('UserRole');

		return $query -> result_array();

	}

	// --------------------------------------------------------------------

	/**
	 * Get total users
	 *
	 * Get the total number of rows in users all users table
	 *
	 */
	function count_users() {

		return $this -> db -> count_all("AllUsers");

	}

	// --------------------------------------------------------------------

	/**
	 * Get a array of user information
	 *
	 * This will return an array of user information
	 *
	 */
	function get_user_by_id($id) {
		if (isset($id) && !empty($id)) {
			$this -> db -> where('Id', $id);

			//Execute query
			$query = $this -> db -> get('AllUsers');

			if ($query -> num_rows() > 0)
				return $query -> row();

			return null;
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Get a array of user information
	 *
	 * This will return an array of user information
	 *
	 */

	function get_users($total_num, $start_num) {

		$option = array('table_name' => 'AllUsers', 'start_number' => $start_num, 'total_number' => $total_num);

		return get_result($option);
	}

	// --------------------------------------------------------------------

	/**
	 * Quick registration for the Home page
	 *
	 * This allows user to quickly register from the homepage with the minimum
	 * information needed. Users are still required to complete their profile
	 * once they logged in.
	 *
	 */

	function quick_register($result) {

		$this -> load -> helper('security');

		//set object for new user
		$data = array('FirstName' => $result['first_name'], 'LastName' => $result['last_name'], 'Email' => $result['email'], 'Password' => do_hash($result['password'], 'md5'), 'Gender' => $result['gender'], 'DateOfBirth' => ($result['dob_year'] . '-' . $result['dob_month'] . '-' . $result['dob_day']), 'Status' => 'Active');

		//insert into database
		$this -> db -> insert('User', $data);

		//Get returned Id
		$return_id = $this -> db -> insert_id();

		//Inser user role
		$this -> insert_user_role($return_id, 7);
	}

	// --------------------------------------------------------------------

	/**
	 * Insert new user
	 *
	 * This allows administrator to add new user to the database with a
	 * complete profile and information.
	 *
	 * This function will return the new user id if inserted successfully
	 *
	 */
	function insert_user($data) {

		//insert into database
		$this -> db -> insert('User', $data);

		//Get returned Id
		$return_id = $this -> db -> insert_id();

		return $return_id;
	}

	// --------------------------------------------------------------------

	/**
	 * Insert new user
	 *
	 * This allows administrator to add new user to the database with a
	 * complete profile and information.
	 *
	 * This function will return the new user id if inserted successfully
	 *
	 */
	function insert_new_user($result) {

		//set object for new user
		$data = array('FirstName' => $result['first_name'], 'LastName' => $result['last_name'], 'Email' => $result['email'], 'Password' => do_hash($result['password'], 'md5'), 'Height' => 100, //$result['height'],
		'Weight' => 100, //$result['weight'],
		'Gender' => $result['gender'], 'DateOfBirth' => ($result['dob_year'] . '-' . $result['dob_month'] . '-' . $result['dob_day']), 'CountryId' => $result['country'], 'City' => $result['city'], 'Province' => $result['province'], 'Address' => $result['address'], 'PostalCode' => $result['postal_code'], 'ContactNumber' => $result['contact_number'], 'OtherNumber' => $result['other_number'], 'Picture' => null, 'Status' => 'Active');

		//insert into database
		$this -> db -> insert('User', $data);

		//Get returned Id
		$return_id = $this -> db -> insert_id();

		return $return_id;
	}

	// --------------------------------------------------------------------

	/**
	 * Insert user role
	 *
	 * This will insert user role to the database based on the id and given role id
	 *
	 */

	function insert_user_role($user_id, $role, $team_id = null) {
		//Set object for user team role
		$data = array('UserId' => $user_id, 'UserRoleId' => $role, 'TeamId' => $team_id);

		//insert into database
		$this -> db -> insert('UserTeamRole', $data);
	}

	// --------------------------------------------------------------------

	/**
	 *
	 *
	 * This will edit the row on the given id
	 *
	 *
	 */
	function edit_user($id) {
		$this -> db -> set('FirstName', $_POST['fname']);
		$this -> db -> set('LastName', $_POST['lname']);
		$this -> db -> set('Email', $_POST['email']);
		$this -> db -> set('Height', $_POST['height']);
		$this -> db -> set('Weight', $_POST['weight']);
		$this -> db -> set('City', $_POST['city']);
		$this -> db -> set('Province', $_POST['province']);
		$this -> db -> set('Address', $_POST['address']);
		$this -> db -> set('PostalCode', $_POST['pcode']);
		$this -> db -> set('ContactNumber', $_POST['phone1']);
		$this -> db -> set('OtherNumber', $_POST['phone2']);
		$this -> db -> where('Id', $id);
		$this -> db -> update('User');
	}

	// --------------------------------------------------------------------

	/**
	 * Update User
	 *
	 * This will update user data based on the given array.
	 * Array may consist of the fields that needs to be update.
	 *
	 * This requires a where clause based on an associative array
	 * eg. $where_clause = array('id' => $id);
	 *
	 */
	function update_user($data, $where_clause) {

		$this -> db -> where($where_clause);
		$this -> db -> update('User', $data);

		return true;
	}

	// --------------------------------------------------------------------

	/**
	 *
	 * retrieving the user information
	 *
	 */
	function get_user_info($id) {

		$results = $this -> db -> get_where('AllUsers', array('Id' => $id));

		$data = $results -> row();

		//$data = array('fname' => $results->['FirstName'],'lname' => $results->['LastName']);
		return $data;
	}

	// --------------------------------------------------------------------

	/**
	 *
	 * Check Facebook Id
	 *
	 * Check if facebook id is attached to any user account
	 *
	 */

	function check_facebook_account($facebook_id) {

		$result = $this -> db -> get_where('AllUsers', array('FacebookId' => $facebook_id));

		if (!$result)
			return NULL;

		//facebook account found
		if ($result -> num_rows() > 0) {
			return $data = $result -> row();
		} else {
			return NULL;
		}
	}

	// --------------------------------------------------------------------

	/**
	 *
	 * Insert facebook id
	 *
	 * Check if facebook id is attached to any user account
	 *
	 */

	function insert_facebook_user($fb_data) {
		$result = $this -> db -> insert('UserFacebook', $fb_data);

		if ($result)
			return TRUE;
		else
			return FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 *
	 * Check Email
	 *
	 * Check email already exist in the database, if exist returns the Id of
	 * the account
	 *
	 */

	function check_user_email($email) {

		$result = $this -> db -> get_where('User', array('Email' => $email));

		if (!$result)
			return FALSE;

		//facebook account found
		if ($result -> num_rows() > 0) {
			return $result -> row() -> Id;
		} else {
			return FALSE;
		}
	}

	// --------------------------------------------------------------------

	/**
	 *
	 * Check Twitter Id
	 *
	 * Check if facebook id is attached to any user account
	 *
	 */

	function check_twitter_account($twitter_id) {

		$result = $this -> db -> get_where('AllUsers', array('TwitterId' => $twitter_id));

		if (!$result)
			return NULL;

		//facebook account found
		if ($result -> num_rows() > 0) {
			return $data = $result -> row();
		} else {
			return NULL;
		}
	}

	// --------------------------------------------------------------------

	/**
	 *
	 * Insert twitter id
	 *
	 * Check if twitter id is attached to any user account
	 *
	 */

	function insert_twitter_user($t_data) {
		$result = $this -> db -> insert('UserTwitter', $t_data);

		if ($result)
			return TRUE;
		else
			return FALSE;
	}

	// --------------------------------------------------------------------

}
?>