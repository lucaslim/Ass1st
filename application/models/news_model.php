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

		$this -> load -> helper("grid_helper");
	}

	// --------------------------------------------------------------------

	/**
	 * Get total news count
	 *
	 * Get the total number of rows in users all users table
	 *
	 */
	function get_news_count() {
		return get_row_count("AllNews");
	}

	// --------------------------------------------------------------------

	/**
	 * Get a array of news information
	 *
	 * This will return an array of news information
	 *
	 */
	function get_news($total_num, $page_num) {
		return get_results("AllNews", $total_num, $page_num);
	}

	// --------------------------------------------------------------------

	/**
	 * Get news information based on Id
	 *
	 * This will return the information based on the selected Id
	 *
	 */
	function get_news_by_id($id) {
		//Set where clause
		$this -> db -> where('Id', $id);

		//Execute select statement
		$query = $this -> db -> get("AllNews");

		//Check if any rows returned
		if (!$query || $query -> num_rows() <= 0)
			return FALSE;

		return $query -> row();
	}

	// --------------------------------------------------------------------

	/**
	 * Update news
	 *
	 * This allows administrator to update news to the database.
	 *
	 */

	function update_news($id, $data) {

		//Set where clause
		$this -> db -> where('Id', $id);

		//update database
		return $this -> db -> update('News', $data);

	}

	// --------------------------------------------------------------------

	/**
	 * Insert new news
	 *
	 * This allows administrator to add new news to the database.
	 *
	 * This function will return the new news id if inserted successfully
	 *
	 */

	function add_news($data) {
		//insert into database
		$this -> db -> insert('News', $data);

		//Get returned Id
		$return_id = $this -> db -> insert_id();

		return $return_id;
	}

	// --------------------------------------------------------------------

		/**
	 * Insert new news
	 *
	 * This allows administrator to add new news to the database.
	 *
	 * This function will return the new news id if inserted successfully
	 *
	 */

	function delete_news($id) {
		//set id
		$this -> db -> where('Id', $id);

		//delete news
		return $this -> db -> delete('News');
	}

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
