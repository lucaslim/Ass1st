<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/**
 * Assist
 *
 * This is the model file for League_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package  Assist
 * @author  Team Assist
 */

// ------------------------------------------------------------------------
class League_Model extends CI_Model {

	/**
	 * Constructor for the League_Model Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Get a list league
	 *
	 * This will return an array of league for populating
	 * the select box
	 *
	 */

	function get_all_league() {
		$this -> db -> select( 'Id, Name' );
		$query = $this -> db -> get( 'League' );

		return $query -> result();
	}

	// --------------------------------------------------------------------
}
?>
