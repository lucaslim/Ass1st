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
		function edit_image($id) {
			
			$this->db->set('Picture',$_FILES['userfile']['name']);
			$this->db->where('Id',$id);
			$this->db->update('User');
		}
	}

?>