<?php
/**
 * Assist
 *
 * This is the validation helper class where all common validation will
 * be placed
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

/**
 * Set Login Header
 *
 * This will set the login header depending if the user is logged in 
 * or not
 *
 */
function set_login_header() {
	//Create a new instance of CI
	$CI = &get_instance();

	$userdata = $CI -> session -> userdata('authorized');
	$CI -> load -> model('User_Model');

	if($userdata) {
			// Set Profile Data
		$profile['full_name'] = $userdata['fullname'];
		$profile['id'] = $userdata['id'];
		$profile['picture'] = $userdata['picture'];
		$profile['captain'] = $userdata['captain'];
		$profile['team'] = $userdata['team'];

		return $CI -> load -> view('header_profile_view', $profile, true);
	}
	else {
		return $CI -> load -> view('header_login_view', '', true);
	}
}

?>