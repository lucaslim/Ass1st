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
function validate_email($obj, $val, $error_message = 'Please enter a valid email address.') {
	$pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

	//if matches
	if (preg_match($pattern, $val) == 1)
		return TRUE;

	//set error message
	$obj -> set_message('validate_email', $error_message);
	return FALSE;
}

function validate_postal_code($obj, $val, $field_name , $error_message = 'Please enter a valid postal code') {
	$pattern = '/^\s*[a-ceghj-npr-tvxy]\d[a-z](\s)?\d[a-z]\d\s*$/i';

	//if matches
	if (preg_match($pattern, $val) == 1)
		return TRUE;

	//set error message
	$obj -> set_message($field_name, $error_message);
	return FALSE;
}


/**
*Call back function for text validation
*
*make sure text only contains letters
*
*	function validate_text($obj, $text, $error_message = 'This field can only contain a letters'){
*		$pattern = '/^[a-zA-Z]+(([\'\,\.\-][a-zA-Z])?[a-zA-Z]*)*$/';
*
*		//if the entry matches the result will be 1
*		if (preg_match($pattern, $text) == 1)
*			return TRUE;
*
*		obj -> set_message('validate_text', $error_message)
*		return FALSE;
*	}
*/
// --------------------------------------------------------------------
?>