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

class Media extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('image_model');
		$this->load->helper(array('form', 'url'));
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Home Class
	 *
	 * Directs user to the home_view if they are logged in
	 *
	 */
	function index() {


		$data['query'] = $this -> image_model -> get_mediaImages();

		$this -> load -> view('admin/template/header');
		$this -> load -> view('admin/media_view', $data);
		$this -> load -> view('admin/template/footer');
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '250';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);


		
		//filling the data
		$id = $this->input->post('Id');
		$imgTitle = $this->input->post('imageTitle');
		$imgDesc = $this->input->post('imageDescription');
		$imgMainUrl = $this->input->post('imageUrlMain');
		$img2ndTitle = $this->input->post('imageLink2Title');
		$img2ndLink = $this->input->post('imageLink2Url');
		$img3rdTitle = $this->input->post('imageLink3Title');
		$img3rdLink = $this->input->post('imageLink3Url');
		$img4thTitle = $this->input->post('imageLink4Title');
		$img4thLink = $this->input->post('imageLink4Url');


		if ( ! $this->upload->do_upload())
		{
			echo 'Error Encountered while trying to upload';
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('admin/media_view', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->image_model->edit_sliderimage($id,$_FILES['userfile']['name'],$imgTitle,$imgDesc,$imgMainUrl,$img2ndTitle,$img2ndLink,$img3rdTitle,$img3rdLink,$img4thTitle,$img4thLink);
			

			$this->load->view('media_success_view', $data);
		}
	}

	// --------------------------------------------------------------------

}
?>