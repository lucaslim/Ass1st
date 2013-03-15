<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Assist
 *
 * This is the controller for Quick Register, this controller will be
 * included in the home page
 *
 * @package		Assist
 * @author		Team Assist
 */
session_start();
// --------------------------------------------------------------------

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('user_model');
		$this->load->model('image_model');
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		$user_data = $this->session->userdata('authorized');


		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$this->image_model->edit_image($user_data['id']);

			$this->load->view('upload_success', $data);
		}
	}
}
?>