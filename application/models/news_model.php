<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for News_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package		Assist
 * @author		Team Assist
 */

// ------------------------------------------------------------------------
class News_Model extends CI_Model {

	/**
	 * Constructor for the News_Model Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Insert new user
	 *
	 * This allows administrator to add new news to the database.
	 * 
	 * This function will return the new news id if inserted successfully
	 *
	 */

	function add_news($title, $content, $user_id) {

		//set object for new user
		$data = array('Title' => $title, 
					  'Content' => $content, 
					  'PostDate' => date('Y-m-d H:i:s'), 
					  'UserId' => $user_id, 
					  'Status' => 'Active');

		//insert into database
		$this -> db -> insert('News', $data);
		
		//Get returned Id
		$return_id = $this -> db -> insert_id();
		
		return $return_id; 
	}

	// --------------------------------------------------------------------

}
