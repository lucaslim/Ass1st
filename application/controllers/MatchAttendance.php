<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
	
	session_start();
	//controller for player registration
	
	class MatchAttendance extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this -> load -> model('Division_Model');
			$this -> load -> model('News_Model');
			$this -> load -> model('user_model');

			$this -> load -> helper('date');
			$this -> load -> helper(array('form', 'url'));

			$this -> load -> helper('template');
			$this -> load -> library('session');//loads the library for all the functions
			$this -> load -> helper('validation_helper');
			$this -> load -> helper('login_helper');
			
		}

		//Function AddAttendance
		public function addAttendance(){
$this-> output ->set_content_type('application/html');


			echo $this -> input -> get('attendance');


			// $this -> load -> model('matchAttendance_Model', 'attendance', TRUE);

			// $data = $this -> attendance -> get_MatchAttendance_by_id($id);
		}
		
		public function index()
		{
			$data['base']=$this->config->item('base_url');
			$data['title'] = 'Attendance';

			//Check if logged in
			$data['login_header'] = set_login_header(); //get from template_helper.php
			
			$user_data = $this->session->userdata('authorized');//stores the information array for the user into $user_data
			
			
			$data['query']=$this->user_model->get_user_by_id($user_data['ID']);

			
			$data['results'] = $this -> user_model -> get_user_info($user_data['ID']);


			$this -> load -> view('templates/header', $data);
			$this-> load ->view('MatchAttendance_view.php', $data);
			$this -> load -> view('templates/footer', $data);
		}

		public function insert(){
			//Get query string of Id
			$id = true;
		}
	}
?>