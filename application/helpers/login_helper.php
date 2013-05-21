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
function set_session_data($id, $full_name, $picture = 'blank_avatar.png') {
	$CI =& get_instance();

	$CI -> load -> model( 'User_Model');

	return array('id' => $id,
				 'fullname' => $full_name,
				 'picture' => $picture,
				 'team' => get_user_teams( $id ),
				 'captain' => is_captain( $id )
			 	);
}

// --------------------------------------------------------------------
/**
 * Check if user is a captain
 *
 * Returns true if user is a captain
 *
 */
function is_captain($id) {
	$CI =& get_instance();

	$CI -> db -> where('UserId', $id);

	//Execute query
	$query = $CI -> db -> get('Roster');

	return $query -> row('Captain');
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

function get_user_teams( $user_id ) {
		$CI =& get_instance();

		$CI -> load -> model( 'Team_Model', 'team' );

		$result = $CI -> team -> get_teams_by_user_id( $user_id );

		if ( $result ) {
			$team_id = array();
			foreach ( $result as $value ) {
				array_push( $team_id, $value -> TeamId, $value -> Name );
			}

			return $team_id;
		}

		return null;
	}

?>