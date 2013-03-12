<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
	
	session_start();
	//controller for player registration
	
	class Playeredit extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this -> load -> library('session');//loads the library for all the functions
			$this -> load -> helper('validation_helper');
			
			
		}
		
		public function index()
		{
			
			$data['base']=$this->config->item('base_url');
			$data['title'] = 'Player Edit';
			
			$this->load->model('user_model');//loads the user_model.php
			
			$user_data = $this->session->userdata('authorized');//stores the information array for the user into $user_data
			
			
			$data['query']=$this->user_model->get_user_by_id($user_data['id']);

			
			$data['results'] = $this -> user_model -> get_user_info($user_data['id']);


			
			$this->load->view('playeredit_view', $data);
		}
		
		/*
		 * $sess_array is an array with the session id and full name stored in it from the validate_user in controllers/action.php
		 *
		 */
		public function edit_player()
		{
			
			if ($_POST){
				$this -> form_validation->set_rules('fname', 'First Name', 'required|callback_check_fname');
				if ($this->form_validation->run() == FALSE){            
		            echo validation_errors();       
		        }
		        else {}
			}



			$user_data = $this->session->userdata('authorized');
			
			
			$this->load->model('user_model');
			$this->user_model->edit_user($user_data['id']);
		}

		function check_fname($p)
		{
			$p = $this -> input -> post('fname');


			$pattern = '/^[a-zA-Z]+(([\'\,\.\-][a-zA-Z])?[a-zA-Z]*)*$/';

			if (preg_match($pattern, $p))
				return true;
			else{
				$this->form_validation->set_message('check_fname', 'check your first name');
				return false;
			}
		}
	}
?>