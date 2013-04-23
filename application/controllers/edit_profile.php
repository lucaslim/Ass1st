<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
	
	session_start();
	//controller for player registration
	
	class Edit_profile extends CI_Controller
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
		
		public function index()
		{
			
			$data['base']=$this->config->item('base_url');
			$data['title'] = 'Edit Profile';
			
			// Check user is logged in
			if(!is_loggedin())
				header('Location: /');

			$data['login_header'] = set_login_header();//get from template_helper.php
			
			$user_data = $this->session->userdata('authorized');//stores the information array for the user into $user_data
			
			// Get live scoring
			$data['livescores'] = $this -> Division_Model -> get_live_scores();			
			
			$data['query']=$this->user_model->get_user_by_id($user_data['id']);

			
			$data['results'] = $this -> user_model -> get_user_info($user_data['id']);


			$this -> load -> view('templates/header', $data);
			$this-> load -> view('edit_profile_view', $data);
			$this -> load -> view('templates/footer', $data);
		}
		
		/*
		 * $sess_array is an array with the session id and full name stored in it from the validate_user in controllers/action.php
		 *
		 */
		public function edit_player()
		{
			
			$config['upload_path'] = './uploads/playerlogo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			/*if ($_POST){
				$this -> form_validation->set_rules('fname', 'First Name', 'required|callback_check_fname');
				if ($this->form_validation->run() == FALSE){            
		            echo validation_errors();       
		        }
		        else {}
			}*/



			$user_data = $this->session->userdata('authorized');

			$data = array('upload_data' => $this->upload->data());
			
			$pic = $_FILES['userfile']['name'];
			

			$this->load->model('user_model');
			$this->user_model->edit_user($user_data['id'], $pic);

			header('Location: ../');
		}

		// function check_fname($p)
		// {
		// 	$p = $this -> input -> post('fname');


		// 	$pattern = '/^[a-zA-Z]+(([\'\,\.\-][a-zA-Z])?[a-zA-Z]*)*$/';

		// 	if (preg_match($pattern, $p))
		// 		return true;
		// 	else{
		// 		$this->form_validation->set_message('check_fname', 'check your first name');
		// 		return false;
		// 	}
		// }
	}
?>