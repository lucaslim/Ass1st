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
/**
 * Get array of minutes (20)
 *
 *
 */

function get_20_minutes() {
	$array = array();

	for ($i = 0; $i <= 20; $i++) {
		if($i < 10) {
			$array[$i] = 0 . $i;
		}
		else {
			$array[$i] = $i;
		}
	}

	return $array;
}

// --------------------------------------------------------------------
/**
 * Get array of seconds (60)
 *
 *
 */

function get_60_seconds() {
	$array = array();

	for ($i = 0; $i <= 59; $i++) {
		if($i < 10) {
			$array[$i] = 0 . $i;
		}
		else {
			$array[$i] = $i;
		}
	}

	return $array;
}

// --------------------------------------------------------------------
/**
 * Get Penalty Types
 *
 * Dynamically populate an array of penalty types
 *
 */

function get_penalty_types() {
	$array = array(
			"Abuse of officials" 	=> 2,
			"Aggressor penalty"		=> 2
			// "Attempt to injure",
			// "Biting",
			// "Boarding",
			// "Butt-ending",
			// "Broken stick",
			// "Charging",
			// "Checking from behind",
			// "Illegal check to the head",
			// "Clipping",
			// "Cross-checking",
			// "Delay of game",
			// "Diving",
			// "Elbowing",
			// "Eye-gouging", 
		);

	return $array;
}