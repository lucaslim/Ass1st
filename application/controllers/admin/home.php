<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the controller for the Home (Admin) class
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Home extends Admin_Controller {

	function __construct() {
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Home Class
	 *
	 * Directs user to the home_view if they are logged in
	 *
	 */
	function index() {
		$this -> load -> view('admin/template/header');
		$this -> load -> view('admin/home_view');
		$this -> load -> view('admin/template/footer');
	}

	// --------------------------------------------------------------------

}
?>