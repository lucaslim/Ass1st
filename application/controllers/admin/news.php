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
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the News Class
	 *
	 * In case no parameters are given in the Url (e.g. path/User_Role/).
	 * The system will load this function by default
	 *
	 */
	function index() {
		$this -> load -> view('admin/news_view');
	}

	// --------------------------------------------------------------------

	/**
	 * Add News for the News Class
	 *
	 * Adding news to the database
	 *
	 */
	function add_news() {
		
		//Load required helper and models
		$this -> load -> model('News_Model', 'news', TRUE);
		
		$title = $this -> input -> post('news_title');
		$content = $this -> input -> post('news_editor');
		$user_id = 1; //Get user_id from session;
		
		$this -> news -> add_news($title, $content, $user_id);
	}

	// --------------------------------------------------------------------
}
