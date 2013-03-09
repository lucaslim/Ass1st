<?php
/**
 * Assist
 *
 * This class extends the system's text_helper class
 *
 * @package		Assist
 * @author		Team Assist
 */

// --------------------------------------------------------------------

/**
 * Get array of birth years
 *
 * Dynamically populate an array of birth year from the
 * range of current year and  80 years ago.
 *
 */
function trim_html_text($content, $number_of_character) {
	
	$content = strip_tags($content);

	$content = wordwrap(trim($content), $number_of_character, "<br />");

	$arrContent = explode('<br />', $content);

	return $arrContent[0];
}

// --------------------------------------------------------------------

?>