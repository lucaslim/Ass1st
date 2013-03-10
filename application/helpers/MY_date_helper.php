<?php
/**
 * Assist
 *
 * This class extends the system's date_helper class
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
function get_birth_years() {
	$array = array();

	foreach (range(date("Y"), date("Y") - 80) as $item) {
		$array[$item] = $item;
	}

	return $array;
}

// --------------------------------------------------------------------

/**
 * Get array of months
 *
 * Populate an array of months 
 *
 */
function get_months_long() {
	$array = array("January" => 1, "February" => 2, "March" => 3, "April" => 4, "May" => 5, "June" => 6, "July" => 7, "August" => 8, "September" => 9, "October" => 10, "November" => 11, "December" => 12);

	return $array;
}

// --------------------------------------------------------------------

/**
 * Get array of months
 *
 * Populate an array of months 
 *
 */
function get_months_short() {
	$array = array("Jan" => 1, "Feb" => 2, "Mar" => 3, "Apr" => 4, "May" => 5, "Jun" => 6, "Jul" => 7, "Aug" => 8, "Sep" => 9, "Oct" => 10, "Nov" => 11, "Dec" => 12);

	return $array;
}

// --------------------------------------------------------------------

/**
 * Get array of days
 *
 * Populate an array of days in numbers
 *
 */
function get_days() {
	$array = array();

	for ($i = 1; $i <= 31; $i++) {
		$array[$i] = $i;
	}

	return $array;
}

// --------------------------------------------------------------------
?>