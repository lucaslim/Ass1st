<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Facebook_model extends CI_Model {

	private $facebook_user;
	private $facebook_data;

	public function __construct() {
		parent::__construct();

		//Load Login Helper
		$this -> load -> helper( 'login_helper' );

		//Load facebook config
		$this -> config -> load( "facebook", TRUE );

		//Set config variable
		$config = $this -> config -> item( 'facebook' );

		//Loads Facebook API Library
		$this -> load -> library( 'facebook', $config );

		//Load User Model
		$this -> load -> model( 'User_Model', 'user', TRUE );

		//Set facebook user
		$this -> facebook_user = $this -> facebook -> getUser();

		if ( $this -> is_loggedin() )
			$this -> facebook_data = $this -> set_basic_data();
		else
			$this -> facebook_data = NULL;
	}


	function is_loggedin() {
		return $this -> facebook_user > 0;
	}

	function get_redirect_url() {
		return $this -> facebook -> getLoginUrl( array( 'scope' => 'email ,user_birthday, publish_actions' ) );
	}

	function set_data( $fields ) {
		try{
			return $this -> facebook -> api( '/me?fields=' . $fields );
		}
		catch ( FacebookApiException $e ) {
			return null;
		}
	}

	function set_basic_data() {
		return $this -> set_data( 'first_name,last_name,gender,email,picture.type(large)' );
	}

	function get_data() {
		return $this -> facebook_data;
	}

	function is_registered( &$account = null ) {
		if ( !$this -> is_loggedin() || $this -> facebook_data == null )
			return false;

		$account = $this -> user -> check_facebook_account( $this -> get_id() );

		if ( $account == NULL )
			return false;
		else
			return true;
	}

	function get_id() {
		return $this -> facebook_data['id'];
	}

	function get_image_url() {
		return $this -> facebook_data['picture']['data']['url'];
	}

	function register_user() {
		$username = array_key_exists( 'username', $this -> facebook_data ) ? $this -> facebook_data['username'] : NULL;

		//Set facebook data
		$oauth_data = set_oauth_data( $this -> get_id(), $username );

		return $this -> user -> insert_facebook_user( $oauth_data );
	}

	function create_account() {
		$data = $this -> fb -> get_data();
		$first_name = array_key_exists( 'first_name', $data ) ? $data['first_name'] : '';
		$last_name = array_key_exists( 'last_name', $data ) ? $data['last_name'] : '';
		$gender = array_key_exists( 'gender', $data ) ? $data['gender'] : '';
		// $picture = array_key_exists( 'picture', $data ) ? $data['picture']['data']['url'] : NULL;
		$email = array_key_exists( 'email', $data ) ? $data['email'] : '';

		$user_id = $this -> user -> check_user_email( $email );

		//Check if email already exists
		if ( $user_id ) {
			$data = array( 'FacebookId' => $this -> get_id(),
				'Picture' => $picture );

			$where_clause = array( 'Email' => $email );

			//Attached facebook Id to existing user account
			$this -> user -> update_user( $data, $where_clause );
		} else {
			//set facebook data to user account
			$data = array( 'FirstName' => $first_name,
				'LastName' => $last_name,
				'Gender' => $gender,
				'Email' => $email,
				'FacebookId' => $this -> get_id(),
				'Picture' => $this -> save_profile_picture() );

			//Create new user account
			$user_id = $this -> user -> insert_user( $data );

			if ( $user_id > 0 ) {
				//attach player role
				$this -> user -> insert_user_role( $user_id, 7 );
			}
		}

		return $this -> user -> get_user_info( $user_id );
	}

	function save_profile_picture() {
		$image_url = $this -> get_image_url();

		//Get file extenstion
		$ext = pathinfo( $image_url, PATHINFO_EXTENSION );

		$image_name =  $this -> get_id() . '.' . $ext;

		//image path
		$file_path = './uploads/playerlogo/' . $image_name;

		//upload image
		file_put_contents( $file_path, file_get_contents( $image_url ) );

		return $image_name;
	}
}

/* End of file facebook_model.php */
/* Location: ./application/models/facebook_model.php */
