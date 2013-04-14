<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	class Image_Model extends CI_Model {
		/**
		 * Constructor for the User_Model Class
		 *
		 * Load required model, helper, library class file.
		 *
		 */
		function __construct() {
			parent::__construct();

			$this -> load -> helper("grid_helper");
			$this -> load -> helper('security');
		}

		// --------------------------------------------------------------------

		/**
		 *
		 *
		 * uploading the image name
		 *
		 * 
		 *retrieve the file name with $_FILES['userfile']['name']
		 */
		function edit_image($id,$image) {
			
			$this->db->set('Picture',$image);
			$this->db->where('Id',$id);
			$this->db->update('User');
		}

		/**
		 *
		 *
		 * uploading the image name
		 *
		 * 
		 *retrieve the file name with $_FILES['userfile']['name']
		 */
		function edit_sliderimage($image,$imageTitle,$imageDescription,$imageUrlMain,$imageLink2Title,$imageLink2Url,$imageLink3Title,$imageLink3Url,$imageLink4Title,$imageLink4Url) {
			
			$this->load->helper('security');

			//set object for array
			$data = array('Image' => $image, 'Title' => $imageTitle, 'Description' => $imageDescription, 'Urlmain' => $imageUrlMain, 'link2title' => $imageLink2Title, 'Link2' =>  $imageLink2Url, 'Link3title' => $imageLink3Title, 'Link3' => $imageLink3Url, 'Link4title' => $imageLink4Title, 'Link4' => $imageLink4Url );
		

			$this->db->insert('Slideshow',$data);

		}
	}

?>