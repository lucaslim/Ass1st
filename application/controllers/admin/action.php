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

// --------------------------------------------------------------------

class Action extends CI_Controller {

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

		//set object for new user
		$data = array('FirstName' => $result['first_name'], 'LastName' => $result['last_name'], 'Email' => $result['email'], 'Password' => do_hash($result['password'], 'md5'), 'Height' => 100, //$result['height'],
		'Weight' => 100, //$result['weight'],
		'Gender' => $result['gender'], 'DateOfBirth' => null, 'CountryId' => $result['country'], 'City' => $result['city'], 'Province' => $result['province'], 'Address' => $result['address'], 'PostalCode' => $result['postal_code'], 'ContactNumber' => $result['contact_number'], 'OtherNumber' => $result['other_number'], 'Picture' => null, 'Status' => 'Active');

		//insert into database
		$this -> db -> insert('User', $data);

		//Get returned Id
		$return_id = $this -> db -> insert_id();

		//Set object for user team role
		$data = array('UserId' => $return_id, 'UserRoleId' => $result['user_role'], 'TeamId' => null);

		//insert into database
		$this -> db -> insert('UserTeamRole', $data);

		//redirect back
		redirect('admin/user');
	}

	// --------------------------------------------------------------------

}
