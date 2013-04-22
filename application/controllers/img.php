<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
	
	session_start();
	//controller for player registration
	
	class Img extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this -> load -> model('image_model');
			$this -> load -> helper('template');
		}

		public function index()
		{
			// $data['results'] = $this -> image_model -> get_mediaImages();

			$data['query'] = $this->image_model->get_mediaImages();


			$this-> load -> view('img', $data);
		}
	}