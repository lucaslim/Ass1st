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

/**
 * Create a random string, picked a predefined set of characters and symbols.
 * @param integer $length - lentgh of the string to be returned (optional, default 6)
 * @param boolean $numerics - Whether the string should contain numerics(optional, default TRUE)
 * @param boolean $lowercase - Whether the string should contain lowercase chars(optional, default TRUE)
 * @param boolean $uppercase - Whether the string should contain uppercase chars(optional, default TRUE)
 * @param boolean $symbols - Whether the string should contain symbols(optional, default FALSE)
 * @author Joost van Veen
 * @return string - Da word!
 */
function create_random_string ($length = 8, $numerics = TRUE, $lowercase = TRUE, $uppercase = TRUE, $symbols = FALSE)
{
    $string = "";
    
    // Create an array of characters to pick from.
    // A character will be picked from every node in this array, at least 
    // once (that is, if the string length permits this)
    // Feel free to leave out characters like 0 and o, for readability
    $charSet = array();
    $numerics == FALSE || $charSet[] = "123456789";
    $lowercase == FALSE || $charSet[] = "abcdfghjkmnpqrstvwxyz";
    $uppercase == FALSE || $charSet[] = "ABCDFGHJKMNPQRSTVWXYZ";
    $symbols == FALSE || $charSet[] = "/`~!@#$%^&\*()_+-={}|:\";\'<>?,.";
    
    $iCharset = 0;
    for ($i = 0; $i < $length; $i ++) {
        // Pick a random character from one of the arrays.
        $iCharset < count($charSet) || $iCharset = 0;
        $character = substr($charSet[$iCharset], mt_rand(0, strlen($charSet[$iCharset]) - 1), 1);
        $string .= $character;
        $iCharset ++;
    }
    
    // Now shuffe string so the order is unpredictable
    $string = str_shuffle($string);
    
    return $string;
}

// --------------------------------------------------------------------

?>