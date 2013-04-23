<?php
if (!defined('BASEPATH')) exit('no direct script access allowed');

/**
 * Assist
 *
 * This is the controller for the index page
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Search extends CI_Controller {

	/**
	 * Constructor for the Pages Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> helper('template');
		$this -> load -> helper(array('form', 'url'));
		$this -> load -> helper('login_helper');
	}	


	public function index()
	{
		$this-> load -> model('search_model');
		$search = $this->input->post('q');
		$data['login_header'] = set_login_header(); //get from template_helper.php
		
		
		 $data['query'] = $this->search_model->get_search_news($search);

		 $this -> load -> view('templates/header', $data);
		$this-> load -> view('search_view',$data);
		
		$this -> load -> view('templates/footer', $data);

	}
	


	
}
?>