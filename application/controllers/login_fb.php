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

	function test() {
		$fb_user = $this -> facebook -> getUser();

		$data = $this -> facebook -> api('/me/?fields=picture');

		var_dump($data['picture']['data']['url']);
	}

	function index() {

		$fb_user = $this -> facebook -> getUser();


		if($fb_user == 0){
			//Generate Login Url
			Redirect($this -> facebook -> getLoginUrl(array('scope'=>'email')));
		}
		else {
			try{
				// Get user's data and print it
				$fb_user = $this -> facebook -> api('/me?fields=picture');
			} catch(FacebookApiException $e) {
				Redirect($base_url() . 'index.php/login') ;
			}

			//Get facebook Id
			$fb_id = $fb_user['id'];

			//Get user account
			$account = $this -> user -> check_facebook_account($fb_id);

			//facebook_id is attached to an account
			if($account == NULL) {
				$username = $fb_user['username'];
				//Set facebook data
				$fb_data = array('OauthUid' => $fb_id, 
								 'Username' => isset($username) ? $username : NULL);


				if($this -> user -> insert_facebook_user($fb_data))
				{
					$first_name = $fb_user['first_name'];
					$last_name = $fb_user['last_name'];
					$gender = $fb_user['gender'];
					$email = $fb_user['email'];
					$picture = $fb_user['picture']['data']['url'];

					//set facebook data to user account
					$data = array('FirstName' => isset($first_name) ? $first_name : '',
						'LastName' => isset($last_name) ? $last_name : '',
						'Gender' => isset($gender) ? $gender : NULL,
						'Email' => isset($email) ? $email : '',
						'FacebookId' => $fb_id,
						'Picture' => isset($picture) ? $picture : NULL) ;

					$user_id = $this -> user -> insert_user($data);

					if($user_id > 0){
						$this -> user -> insert_user_role($user_id, 7);
					}

					$account = $this -> user -> get_user_info($user_id);
				}
			}

			if($account != NULL){
				//Create session
				$sess_array = array(
					'id' => $account -> Id,
					'fullname' => $account -> FullName,
					);

				$this -> session -> set_userdata('authorized', $sess_array);


			}

			Redirect(base_url());
		}
	}
}
?>