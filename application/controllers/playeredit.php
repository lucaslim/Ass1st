<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
	
	//controller for player registration
	
	class Playeredit extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');//loads the library for all the functions
		}
		
		public function index()
		{
			
			$data['base']=$this->config->item('base_url');
			$data['title'] = 'Player Edit';
			
			$this->load->model('user_model');//loads the user_model.php
			//$this->load->library('session');
			$data['query']=$this->user_model->get_user_by_id($this->session->userdata('id'));

			$num = $this->session->userdata('id');
			$data['results'] = $this -> user_model -> get_user_info($num);


			
			$this->load->view('playeredit_view', $data);
		}
		
		/*
		 * $sess_array is an array with the session id and full name stored in it from the validate_user in controllers/action.php
		 *
		 */
		public function edit_player()
		{
			
			
			//$this->load->library('session');
			$num = $this->session->userdata('id');
			$this->load->model('user_model');
			$this->user_model->edit_user($num);
			
			//$this->load->model('player_model');//loads this model
        	//$this->message_model->add_player();//adds the player
		}

		/*public function edit()
		{
			$this->load->model('user_model');
			$num = $this->session->userdata('id');

			$data['results'] = $this -> user_model -> get_user_info($num);

			var_dump($data['results']);

			  //$data['form'] = '$form';
			  $this->load->view('playeredit_view', $data);
		}*/
	}
?>