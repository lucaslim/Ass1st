<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

session_start();
//controller for player registration

class Edit_profile extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this -> load -> model( 'Division_Model' );
		$this -> load -> model( 'News_Model' );
		$this -> load -> model( 'user_model' );
		$this -> load -> model( 'image_model' );
		$this -> load -> model( 'Facebook_Model', 'fb' );

		$this -> load -> helper( 'date' );
		$this -> load -> helper( array( 'form', 'url' ) );

		$this -> load -> helper( 'template' );
		$this -> load -> library( 'session' );//loads the library for all the functions
		$this -> load -> helper( 'validation_helper' );
		$this -> load -> helper( 'login_helper' );


	}

	public function index() {

		$data['base']=$this->config->item( 'base_url' );
		$data['title'] = 'Edit Profile';

		// Check user is logged in
		if ( !is_loggedin() )
			header( 'Location: /' );

		$data['login_header'] = set_login_header();//get from template_helper.php

		$user_data = $this->session->userdata( 'authorized' );//stores the information array for the user into $user_data

		// Get live scoring
		$data['livescores'] = $this -> Division_Model -> get_live_scores();

		$data['query']=$this->user_model->get_user_by_id( $user_data['id'] );


		$data['results'] = $this -> user_model -> get_user_info( $user_data['id'] );

		if ( $this -> fb -> is_registered() )
			$data['facebook_picture'] = $this -> fb -> get_image_url();

		$this -> load -> model( 'Twitter_Model', 'twitter' );

		//Check if twitter is link
		// if($this -> twitter -> is_registered())
		//  $data['twitter_picture'] = $this -> get_twitter_image_url();

		$data['twitter_is_link'] = $this -> twitter -> is_link( $user_data['id'] );

		$this -> load -> view( 'templates/header', $data );
		$this -> load -> view( 'edit_profile_view', $data );
		$this -> load -> view( 'templates/footer', $data );
	}

	public function link_twitter() {
		// Load TwitterOauth Library
		$this -> load -> library( 'TwitterOAuth' );

		// Loading twitter configuration.
		$this -> config -> load( 'twitter' );

		//Load User Model
		$this -> load -> model( 'User_Model', 'user', TRUE );


		if ( is_twitter_loggedin() ) {
			// If user already logged in
			$this -> connection = $this -> twitteroauth -> create( $this -> config -> item( 'twitter_consumer_token' ),
				$this -> config -> item( 'twitter_consumer_secret' ),
				$this -> session -> userdata( 'access_token' ),
				$this -> session -> userdata( 'access_token_secret' ) );
		} elseif ( is_twitter_authenticating() ) {
			// If user in process of authentication
			$this -> connection = $this -> twitteroauth -> create( $this -> config -> item( 'twitter_consumer_token' ),
				$this -> config -> item( 'twitter_consumer_secret' ),
				$this -> session -> userdata( 'request_token' ),
				$this -> session -> userdata( 'request_token_secret' ) );
		} else {
			// Unknown user
			$this -> connection = $this -> twitteroauth -> create( $this -> config -> item( 'twitter_consumer_token' ),
				$this -> config -> item( 'twitter_consumer_secret' ) );
		}

	}

	public function get_twitter_image_url() {

	}

	/*
	 * $sess_array is an array with the session id and full name stored in it from the validate_user in controllers/action.php
	 *
	 */
	public function edit_player() {

		$user_data = $this -> session -> userdata( 'authorized' );
		$this -> load -> library('form_validation');
		$this -> load -> helper('validation_helper');

		//Get post array
		$result = $this -> input -> post(NULL, TRUE);

		//make sure user doesn't run the action script immediately
		if (!$result)
			return;

		//Set rules
		$rules = array( array('field' => 'fname', 'label' => 'first name', 'rules' => 'required|alpha'),
					    array('field' => 'lname', 'label' => 'last name', 'rules' => 'required|alpha'),
					    array('field' => 'height', 'label' => 'height', 'rules' => 'required|numeric|is_natural_no_zero|callback_check_height'),
					    array('field' => 'weight', 'label' => 'weight', 'rules' => 'required|numeric|is_natural_no_zero|callback_check_weight'),
					    array('field' => 'city', 'label' => 'city', 'rules' => 'required|alpha'),
					    array('field' => 'province', 'label' => 'province', 'rules' => 'required|alpha'),
					    array('field' => 'address', 'label' => 'address', 'rules' => 'required'),
					    array('field' => 'pcode', 'label' => 'postal code', 'rules' => 'required|callback_check_postal_code'),
					    array('field' => 'phone1', 'label' => 'phone number', 'rules' => 'required|numeric|is_natural_no_zero|min_length[10]|max_length[10]'),
						array('field' => 'phone2' , 'label' => 'other phone number', 'rules' => 'required|numeric|is_natural_no_zero|min_length[10]|max_length[10]'));

		$this -> form_validation -> set_rules($rules);	

		if ($this -> form_validation -> run() == FALSE) {
			echo json_encode(array("success" => false, 
								   "message" => form_error('fname') . 
												form_error('lname') . 
												form_error('height') . 
												form_error('weight') . 
												form_error('city') . 
												form_error('province') . 
												form_error('address') . 
												form_error('pcode') . 
												form_error('phone1') . 
												form_error('phone2')));
			return;
		}

		$data = array ( 'FirstName'=> $this -> input -> post( 'fname' )
			, 'LastName'=> $this -> input -> post( 'lname' )
			, 'Height'=> $this -> input -> post( 'height' )
			, 'Weight'=> $this -> input -> post( 'weight' )
			, 'City'=> $this -> input -> post( 'city' )
			, 'Province'=> $this -> input -> post( 'province' )
			, 'Address'=> $this -> input -> post( 'address' )
			, 'PostalCode'=> $this -> input -> post( 'pcode' )
			, 'ContactNumber'=> $this -> input -> post( 'phone1' )
			, 'OtherNumber'=> $this -> input -> post( 'phone2' )
		);

		$where = array ( 'Id' => $user_data['id'] );

		$result = $this -> user_model -> update_user( $data, $where );
		
		echo json_encode(array("success" => true));
	}

	public function check_postal_code($val) {
		return validate_postal_code($this -> form_validation, $val, __FUNCTION__);
	}

	public function check_height($val) {
		$min = 100;
		$max = 230;

		$this->form_validation->set_message('check_height', 'Height is invalid, must be between ' . $min . ' and ' . $max);

		return ($val > $min && $val <= $max);
	}

	public function check_weight($val) {
		$min = 20;
		$max = 200;

		$this->form_validation->set_message('check_weight', 'Weight is invalid, must be between ' . $min . ' and ' . $max);

		return ($val > $min && $val <= $max);
	}

	public function edit_player_img() {
		
		$user_data = $this -> session -> userdata( 'authorized' );

		$image = $this -> input -> post( 'image' );
		$image_name = '';
		switch ( strtolower( $image ) ) {
		case 'facebook':
			{
				$image_name = $this -> fb -> save_profile_picture();
				break;
			}

		case 'user':
			{
				$config['upload_path'] = './uploads/playerlogo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library( 'upload', $config );

				if (  $this -> upload -> do_upload() ) {
					$user_data = $this->session->userdata( 'authorized' );

					$data = array( 'upload_data' => $this->upload->data() );

					$image_name = $_FILES['userfile']['name'];

				}
				break;
			}
		}

		$this -> image_model -> edit_image( $user_data['id'], $image_name );

		header( 'Location: '. base_url() . 'edit_profile' );
	}
}
?>
