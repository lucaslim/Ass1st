<?php
if (!defined('BASEPATH'))	exit('no direct script access allowed');
if(!isset($_SESSION))	session_start();
/**
 * Assist
 *
 * This is the controller for the login
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

class Login_Twitter extends CI_Controller {

	/**
	 * Constructor for the Facebook Login Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		//Load Login Helper
		$this -> load -> helper('login_helper');

		//Redirect if user is logged in
		if (is_loggedin())
			redirect(base_url());

		// Load TwitterOauth Library
		$this -> load -> library('TwitterOAuth');

		// Loading twitter configuration.
		$this -> config -> load('twitter');

		//Load User Model
		$this -> load -> model('User_Model', 'user', TRUE);

		if (is_twitter_loggedin()) {
			// If user already logged in
			$this -> connection = $this -> twitteroauth -> create($this -> config -> item('twitter_consumer_token'), $this -> config -> item('twitter_consumer_secret'), $this -> session -> userdata('access_token'), $this -> session -> userdata('access_token_secret'));
		} elseif (is_twitter_authenticating()) {
			// If user in process of authentication
			$this -> connection = $this -> twitteroauth -> create($this -> config -> item('twitter_consumer_token'), $this -> config -> item('twitter_consumer_secret'), $this -> session -> userdata('request_token'), $this -> session -> userdata('request_token_secret'));
		} else {
			// Unknown user
			$this -> connection = $this -> twitteroauth -> create($this -> config -> item('twitter_consumer_token'), $this -> config -> item('twitter_consumer_secret'));
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Twitter Login Class
	 *
	 * In case no parameters are given in the Url (e.g. path/Login/).
	 * The system will load this function by default
	 *
	 *
	 */

	function index() {

		if (is_twitter_loggedin()) {
			redirect(base_url('/'));

		} else {
			// Making a request for request_token
			$request_token = $this -> connection -> getRequestToken(site_url('/login_twitter/callback'));

			$this -> session -> set_userdata('request_token', $request_token['oauth_token']);
			$this -> session -> set_userdata('request_token_secret', $request_token['oauth_token_secret']);

			if ($this -> connection -> http_code == 200) {
				$url = $this -> connection -> getAuthorizeURL($request_token);
				redirect($url);
			} else {
				// An error occured. Make sure to put your error notification code here.
				redirect(base_url('/'));
			}
		}

	}

	// --------------------------------------------------------------------

	/**
	 * Default index for the Twitter Login Class
	 *
	 * In case no parameters are given in the Url (e.g. path/Login/).
	 * The system will load this function by default
	 *
	 *
	 */

	function callback() {
		if ($this -> input -> get('oauth_token') && $this -> session -> userdata('request_token') !== $this -> input -> get('oauth_token')) {
			redirect(site_url('/login_twitter'));
		} else {
			$access_token = $this -> connection -> getAccessToken($this -> input -> get('oauth_verifier'));

			if ($this -> connection -> http_code == 200) {
				//remove request token from session
				$this -> session -> unset_userdata('request_token');
				$this -> session -> unset_userdata('request_token_secret');

				$this -> session-> set_userdata('access_token', $access_token['oauth_token']);
				$this -> session-> set_userdata('access_token_secret', $access_token['oauth_token_secret']);

				$twitter_user = $this -> connection -> get('account/verify_credentials');

				//start transaction
				$this -> db -> trans_start();

				if ($twitter_user != NULL) {
					//Get twitter Id
					$t_id = $twitter_user -> id;

					//Get user account
					$account = $this -> user -> check_twitter_account($t_id);

					//twitter_id is not attached to account
					if ($account == NULL) {
						$username = isset($twitter_user -> screen_name) ? $twitter_user -> screen_name : NULL;

						//set twitter data
						$t_data = set_oauth_data($t_id, $username);

						//Insert twitter id into the database
						if ($this -> user -> insert_twitter_user($t_data)) {
							//get name
							$name = $twitter_user -> name;

							//since twitter only store whole name we need to check how many words are there
							$arr_name = explode(' ', $name);
							$first_name = '';
							$last_name = '';
							if (count($arr_name) == 1) {
								$first_name = $arr_name[0];
							} elseif (count($arr_name) == 2) {
								$first_name = $arr_name[0];
								$last_name = $arr_name[1];
							} elseif (count($arr_name > 2)) {
								$first_name = $arr_name[0];
								unset($arr_name[0]);
								$last_name = implode(' ', $arr_name);
							}

							//get picture
							$picture = isset($twitter_user -> profile_image_url) ? $twitter_user -> profile_image_url : NULL;

							$data = array('FirstName' => $first_name, 
										  'LastName' => $last_name, 
										  'TwitterId' => $t_id, 
										  'Picture' => $picture);

							//Create new user account
							$user_id = $this -> user -> insert_user($data);

							if ($user_id > 0) {
								//attach player role
								$this -> user -> insert_user_role($user_id, 7);
							}

							//Get account details for session
							$account = $this -> user -> get_user_info($user_id);
							
							//Complete Transaction
							$this -> db -> trans_complete();
						}
					}

					if ($account != null) {
						//Create session
						$sess_array = set_session_data($account -> Id, 
													   $account -> FullName, 
													   $account -> Picture);

						$this -> session -> set_userdata('authorized', $sess_array);
					}
				}
				redirect(base_url('/'));

			} else {
				// An error occured. Add your notification code here.
				redirect(base_url('/'));
			}
		}
	}
}
?>