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
		$this->load->database();
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

	// --------------------------------------------------------------------

	/**
	 * Get News
	 *
	 * This retrieves all news 
	 * 
	 * If no limit is provided, the default is the last 5 rows
	 *
	 */

	function get_news($limit = '0,5') {
		$query = $this->db->query('SELECT * FROM AllNews ORDER BY PostDate DESC LIMIT ' . $limit);
		return $query->result_array();
	}

	// --------------------------------------------------------------------

	// --------------------------------------------------------------------

	/**
	 * Get News Headlines
	 *
	 * This retrieves news headlines
	 * 
	 * Provides view with 5 headlines unless more are requested
	 *
	 */

	function get_news_headlines($limit = '0,5') {
		$query = $this->db->query('SELECT Id, Title FROM AllNews ORDER BY PostDate DESC LIMIT ' . $limit);
		return $query->result_array();
	}

	// --------------------------------------------------------------------	

	// --------------------------------------------------------------------

	/**
	 * Get News By ID
	 *
	 * This retrieves news by id number
	 * 
	 *
	 */

	function get_news_by_id($id) {
		$query = $this->db->query('SELECT * FROM AllNews WHERE Id = ' . $id);
		return $row = $query->row(); 
	}

	// --------------------------------------------------------------------
}
