<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Assist
 *
 * This is the controller for the News class
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class News extends CI_Controller {
	/**
	 * Constructor for the News Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> helper('date');
		$this -> load -> helper(array('form', 'url'));
		$this -> load -> helper('text');

		$this -> load -> model('News_Model', 'news', TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the News Class
	 *
	 * In case no parameters are given in the Url (e.g. path/News/).
	 * The system will load this function by default
	 *
	 */
	function index() {

		//redirect to view
		header('location: view');
	}

	// --------------------------------------------------------------------

	/**
	 * View News Page
	 *
	 * This will display the page with all the news listed on it.
	 *
	 */
	function view() {

		//Get total number of rows
		$total_rows = $this -> news -> get_news_count();

		//Set pagination data
		$data = get_pagination_data("admin/news/view", $total_rows);

		//Set news data
		$data['results'] = $this -> news -> get_news($data['per_page'], $data['current_page']);

		//load view
		$this -> load -> view('admin/news_list_view', $data);
	}

	// --------------------------------------------------------------------
	
	/**
	 * View Edit News Page
	 *
	 * This will display the Edit Post page
	 *
	 */

	function edit_post($id) {
		//redirect is id is not valid or not given
		if (!isset($id) || $id == '' || $id < 1)
			header("location: admin/news");

		$data['Id'] = $id;

		$this -> load -> view('admin/news_edit_view', $data);
	}

	/**
	 * Get Post by Id
	 *
	 * This will return a JSON object based on the given Id. This function will
	 * becalled by the edit_post page using jQuery Ajax
	 *
	 */

	function get_post($id) {

		$data = $this -> news -> get_news_by_id($id);
		if (!$data)
			return NULL;

		echo json_encode($data);
	}

	// --------------------------------------------------------------------

	/**
	 * Update news age
	 *
	 * This will update news that is on the page to the database
	 *
	 */
	function update_news() {
		$title = $this -> input -> post('news_title');
		$content = $this -> input -> post('news_editor');
		$description = trim_html_text($content, 145) . '...';
		$id = $this -> input -> post('news_id');

		$data = array('Title' => $title, 'Content' => $content);

		$query = $this -> news -> update_news($id, $data);

		//If update pass, redirect to the list page
		if ($query)
			header("location: view");
	}

	// --------------------------------------------------------------------

	/**
	 * View Add News Page
	 *
	 * This will display the Add New Post page
	 *
	 */
	function new_post() {
		$this -> load -> view('admin/news_add_view');
	}

	// --------------------------------------------------------------------

	/**
	 * Add News for the News Class
	 *
	 * Adding news to the database
	 *
	 */
	function add_news() {
		$title = $this -> input -> post('news_title');
		$content = $this -> input -> post('news_editor');
		$description = trim_html_text($content, 145) . '...';
		$user_id = 1;

		//set object for new user
		$data = array('Title' => $title, 'Content' => $content, 'Description' => $description, 'PostDate' => date('Y-m-d H:i:s'), 'UserId' => $user_id, 'Status' => 'Active');

		//Get user_id from session;
		$this -> news -> add_news($data);
	}

	// --------------------------------------------------------------------

	/**
	 * Delete News
	 *
	 * This will delete selected news from the databse based on the checkbox
	 * select
	 *
	 */
	function delete_news() {
		$select = $this -> input -> post('select');

		if($select) {
			foreach ($select as $value) {
				//Delete news
				$this -> news -> delete_news($value);
			}
		}

		header("location: view");
	}

	// --------------------------------------------------------------------
}
