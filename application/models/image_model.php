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
		function edit_sliderimage($id,$image,$imageTitle,$imageDescription,$imageUrlMain,$imageLink2Title,$imageLink2Url,$imageLink3Title,$imageLink3Url,$imageLink4Title,$imageLink4Url) 
		{
			
			$this->load->helper('security');

			
			
			$this->db->where('Id',$id);
			$this->db->set('Image',$image);
			$this->db->set('Title',$imageTitle);
			$this->db->set('Description',$imageDescription);
			$this->db->set('Urlmain',$imageUrlMain);
			$this->db->set('link2title',$imageLink2Title);
			$this->db->set('Link2',$imageLink2Url);
			$this->db->set('Link3title',$imageLink3Title);
			$this->db->set('Link3',$imageLink3Url);
			$this->db->set('Link4title',$imageLink4Title);
			$this->db->set('Link4',$imageLink4Url);

			
			$this->db->update('MediaSlider');

		}

		function get_mediaImages()
		{
			//$results = $this -> db -> get('MediaSlider', array('Id' => 1));
			$query = $this -> db -> get('MediaSlider');

			// $data = $results -> row();
			// return $data;

			return $query->result();
		}
	}

?>