<?php
/**
 * Assist
 *
 * This is the scoring helper class 
 *
 * @package		Assist
 * @author		Team Assist
 */

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
			"Aggressor penalty"		=> 2,
			"Attempt to injure"		=> 2,
			"Biting"				=> 2,
			"Boarding"				=> 2,
			"Butt-ending"			=> 2,
			"Broken stick"			=> 2,
			"Charging"				=> 2,
			"Checking from behind"	=> 2,
			"Illegal check to the head" => 2,
			"Clipping" 				=> 2,
			"Cross-checking" 		=> 2,
			"Delay of game" 		=> 2,
			"Diving"				=> 2,
			"Elbowing"				=> 2,
			"Eye-gouging"			=> 2,
			"Fighting"				=> 5,
			"Goaltender Interference" => 2,
			"Goaltender Leaving Crease" => 2,
			"Head-butting" => 2,
			"High-sticking (2 min)" => 2,
			"High-sticking (4 min)" => 2,
			"Holding" => 2,
			"Holding the stick" => 2,
			"Illegal Equipment" => 2,
			"Instigator penalty" => 2,
			"Interference" => 2,
			"Joining a fight" => 10,
			"Kicking" => 5,
			"Kneeing" => 2,
			"Leaving the Penalty Bench" => 2,
			"Playing with Too Many Sticks" => 2,
			"Roughing" => 2,
			"Secondary Altercation" => 2,
			"Slashing" => 2,
			"Slew Footing" => 2,
			"Spearing" => 2,
			"Starting the wrong lineup" => 2,
			"Substitution infraction (Illegal Substitution)" => 2,
			"Throwing Equipment" => 2,
			"Too many men on the ice" => 2,
			"Tripping" => 2, 
			"Unsportsmanlike conduct" => 2
		);

	return $array;
}