<?php
if (!defined('BASEPATH'))
	exit('no direct script access allowed');
/**
 * Assist
 *
 * This is the controller for the index page
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Pages extends CI_Controller {

	/**
	 * Constructor for the Pages Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> model('News_Model');

		$this -> load -> helper('date');
		$this -> load -> helper(array('form', 'url'));
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Pages Class
	 *
	 * In case no parameters are given in the Url (e.g. path/Login/).
	 * The system will load 'home' by default
	 *
	 */

	function index($loadThisPage = 'home') {
		
		if (!file_exists('application/views/pages/'.$loadThisPage.'.php'))
		{
			show_404();
		}

		$data['dob_year'] = get_birth_years(); //Get Birth Year
		$data['dob_month'] = get_months_short(); //Get Birth Month
		$data['dob_day'] = get_days(); //Get Birth Day
		$data['news'] = $this->News_Model->get_news(5, 0); // retrieve news
		$data['archive'] = "News Archive";

		$data['title'] = ucfirst($loadThisPage); // Use the file as the title
		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/'.$loadThisPage, $data);
		$this -> load -> view('templates/footer', $data);
	}

	// --------------------------------------------------------------------

	function news($id) {
		$data['news'] = $this->News_Model->get_news_by_id($id); // retrieve news
		$data['headlines'] = $this->News_Model->get_news_headlines(); // retrieve news titles
		$data['title'] = $id;

		$this -> load -> view('templates/header', $data);
		$this -> load -> view('pages/news.php', $data);
		$this -> load -> view('templates/footer');
	}
}
?>