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
		$this -> load -> view('admin/media_view');
		$this -> load -> view('admin/template/footer');
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);



		if ( ! $this->do_upload())
		{
			$error = array('error' => $this->media->display_errors());

			$this->load->view('admin/media_view', $error);
		}
		else
		{
			$data = array('upload_data' => $this->media->data());

			$this->image_model->edit_sliderimage($_FILES['userfile']['name'],$_post['imageTitle'],$_post['imageDescription'],$_post['imageUrlMain'],$_post['imageLink2Title'],$_post['imageLink2Url'],$_post['imageLink3Title'],$_post['imageLink3Url'],$_post['imageLink4Title'],$_post['imageLink4Url']);

			$this->load->view('media_success_view', $data);
		}
	}

	// --------------------------------------------------------------------

}
?>