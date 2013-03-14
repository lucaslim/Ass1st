<?php
/**
 * Assist
 *
 * This is the login helper class where all common validation will
 * be placed
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

/**
 * Set oAuth Data
 *
 * This will set oAuth Data to be placed in database
 *
 */
function is_loggedin() {
	$CI =& get_instance();

	return $CI -> session -> userdata('authorized') != '';	
}

// --------------------------------------------------------------------

/**
 * Set oAuth Data
 *
 * This will set oAuth Data to be placed in database
 *
 */
function set_oauth_data($id, $username) {
	return array('OauthUid' => $id, 'Username' => $username);	
}

// --------------------------------------------------------------------

/**
 * Set Session Data
 *
 * This will set Session Data to be placed into session
 *
 */
function set_session_data($id, $full_name, $picture = NULL) {
	return array('id' => $id,
				 'fullname' => $full_name,
				 'picture' => $picture);
}

// --------------------------------------------------------------------

/**
 * Logged into Twitter
 *
 * Check if user is logged into the website with twitter
 *
 */
function is_twitter_loggedin() {
	$CI =& get_instance();

	return $CI -> session -> userdata('access_token') && $CI -> session -> userdata('access_token_secret');
}

// --------------------------------------------------------------------

/**
 * Authenticating on Twitter
 *
 * Check if user is authenticating on twitter
 *
 */
function is_twitter_authenticating() {
	$CI =& get_instance();

	return $CI -> session -> userdata('request_token') && $CI -> session -> userdata('request_token_secret');
}

// --------------------------------------------------------------------
?>