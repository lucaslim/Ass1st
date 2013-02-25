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
 * Call back function for email validation
 *
 * make sure email matches the email regular expression pattern
 *
 */
function validate_email($obj, $email, $error_message = 'Please enter a valid email address.') {
	$pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

	//if matches
	if (preg_match($pattern, $email) == 1)
		return TRUE;

	//set error message
	$obj -> set_message('validate_email', $error_message);
	return FALSE;
}

// --------------------------------------------------------------------
?>