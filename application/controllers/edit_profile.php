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

		$this -> load -> model( 'Facebook_Model', 'fb' );

		if ( $this -> fb -> is_registered() )
			$data['facebook_picture'] = $this -> fb -> get_image_url();



		$data['twitter_picture'] = '';


		$this -> load -> view( 'templates/header', $data );
		$this-> load -> view( 'edit_profile_view', $data );
		$this -> load -> view( 'templates/footer', $data );
	}

	/*
		 * $sess_array is an array with the session id and full name stored in it from the validate_user in controllers/action.php
		 *
		 */
	public function edit_player() {
		$user_data = $this -> session -> userdata( 'authorized' );

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

		$where = array ( 'Id' , $user_data['id'] );

		$this -> user_model -> update_user( $data, $where );

		header( 'Location: edit_profile' );
	}

	public function edit_player_img() {

		$config['upload_path'] = './uploads/playerlogo/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library( 'upload', $config );



		if ( ! $this->upload->do_upload() ) {
			$error = array( 'error' => $this->upload->display_errors() );

			$this->load->view( 'edit_profile_view', $error );
		}
		else {
			$user_data = $this->session->userdata( 'authorized' );

			$data = array( 'upload_data' => $this->upload->data() );

			$pic = $_FILES['userfile']['name'];

			$this -> image_model -> edit_image( $user_data['id'], $pic );

			header( 'Location: edit_profile' );
		}
	}
}
?>
