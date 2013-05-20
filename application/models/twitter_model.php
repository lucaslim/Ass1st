<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twitter_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		//Load Login Helper
		$this -> load -> helper('login_helper');

		// Load TwitterOauth Library
		$this -> load -> library('TwitterOAuth');

		// Loading twitter configuration.
		$this -> config -> load('twitter');

		//Load User Model
		$this -> load -> model( 'User_Model', 'user', TRUE );
		
	}

	public function is_link($id) {
		$result = $this -> user -> get_user_by_id($id);

		if($result) {
			if (is_null($result -> TwitterId) || empty($result -> TwitterId))
				return false;
			else
				return true;
		}

		return false;
	}

	public function link_account() {
		
	}

	public function authorized() {
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
}

/* End of file twitter_model.php */
/* Location: ./application/models/twitter_model.php */