<?php
if (!defined('BASEPATH'))	exit('no direct script access allowed');

session_start();
/**
 * Assist
 *
 * This is the controller for the login
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Login_Fb extends CI_Controller {

	/**
	 * Constructor for the Facebook Login Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );

		//Load facebook config
		$this -> config -> load("facebook", TRUE);

		//Set config variable
		$config = $this -> config -> item('facebook');

		//Loads Facebook API Library
		$this -> load -> library('facebook', $config);

		$this -> load -> model('User_Model', 'user', TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Facebook Login Class
	 *
	 * In case no parameters are given in the Url (e.g. path/Login/).
	 * The system will load this function by default
	 *
	 */

	function index() {

		$fb_user = $this -> facebook -> getUser();


		if($fb_user == 0){
			//Generate Login Url
			Redirect($this -> facebook -> getLoginUrl(array('scope'=>'email')));
		}
		else {
			try{
				// Get user's data and print it
				$fb_user = $this -> facebook -> api('/me?fields=first_name,last_name,gender,email,picture');
			} catch(FacebookApiException $e) {
				// Throw Error
			}

			//Get facebook Id
			$fb_id = $fb_user['id'];

			//Get user account
			$account = $this -> user -> check_facebook_account($fb_id);

			//facebook_id is attached to an account
			if($account == NULL) {
				$username = array_key_exists('username', $fb_user) ? $fb_user['username'] : '';

				//Set facebook data
				$fb_data = array('OauthUid' => $fb_id, 
					'Username' => $username);

				//Insert facebook id into the database
				if($this -> user -> insert_facebook_user($fb_data))
				{	
					$first_name = array_key_exists('first_name', $fb_user) ? $fb_user['first_name'] : '';
					$last_name = array_key_exists('last_name', $fb_user) ? $fb_user['last_name'] : '';
					$gender = array_key_exists('gender', $fb_user) ? $fb_user['gender'] : '';
					$picture = array_key_exists('picture', $fb_user) ? $fb_user['picture']['data']['url'] : NULL;
					$email = array_key_exists('email', $fb_user) ? $fb_user['email'] : '';

					$user_id = $this -> user -> check_user_email($email);

					//Check if email already exists
					if($user_id) {
						$data = array('FacebookId' => $fb_id, 
							'Picture' => $picture);

						$where_clause = array('Email' => $email);

						//Attached facebook Id to existing user account
						$this -> user -> update_user($data, $where_clause);
					}
					else {
					//set facebook data to user account
						$data = array('FirstName' => $first_name,
							'LastName' => $last_name,
							'Gender' => $gender,
							'Email' => $email,
							'FacebookId' => $fb_id,
							'Picture' => $picture);

						//Create new facebook account
						$user_id = $this -> user -> insert_user($data);

						if($user_id > 0){
							//attach player role
							$this -> user -> insert_user_role($user_id, 7);
						}

					}

					$account = $this -> user -> get_user_info($user_id);
				}
			}

			if($account != NULL){
				//Create session
				$sess_array = array(
					'id' => $account -> Id,
					'fullname' => $account -> FullName,
					'picture' => $account -> Picture
					);

				$this -> session -> set_userdata('authorized', $sess_array);
			}
		}
	}
}
	?>