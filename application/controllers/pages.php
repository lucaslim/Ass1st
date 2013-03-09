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
		
		$this -> load -> helper(array('form', 'url'));
		$shareTitle['title'] = ucfirst($loadThisPage); // Use the file as the title
		$this -> load -> view('templates/header', $shareTitle);
		$this -> load -> view('pages/'.$loadThisPage, $shareTitle);
		$this -> load -> view('templates/footer', $shareTitle);
	}

	// --------------------------------------------------------------------

}
?>