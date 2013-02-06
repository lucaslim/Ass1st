<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
//Start Session
session_start();
class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		if ($this -> session -> userdata('authorized')) {
			$session_data = $this -> session -> userdata('authorized');
			$data['fullname'] = $session_data['fullname'];
			$this -> load -> view('admin_view', $data);
		} else {
			//no session found
			redirect('login', 'refresh');
		}
	}
	

	function logout() {
		$this -> session -> unset_userdata('authorized');
		session_destroy();
		redirect('login', 'refresh');
	}

}
?>