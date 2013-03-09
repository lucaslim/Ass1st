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
 * Trim Html Text
 *
 * This will remove all html tags from the content itself. By setting
 * number of characters, user could limit the number of words
 * return based on the given number.
 *
 */
function trim_html_text($content, $number_of_character = NULL) {
	
	$content = strip_tags($content);

	if($number_of_character != null){
		$content = wordwrap(trim($content), $number_of_character, "<br />");

		$arrContent = explode('<br />', $content);

		return $arrContent[0];
	}

	return content;
}

// --------------------------------------------------------------------

?>