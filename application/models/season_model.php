<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

/**
 * Assist
 *
 * This is the model file for Season_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package  Assist
 * @author  Team Assist
 */

// ------------------------------------------------------------------------
class Season_Model extends CI_Model {

	/**
	 * Constructor for the Season_Model Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Get a list of Season
	 *
	 * This will return an array of season for populating
	 * the select box
	 *
	 */

	function get_all_season() {
		$this -> db -> select( 'Id, Name' );
		$query = $this -> db -> get( 'Season' );

		return $query -> result();
	}

	// --------------------------------------------------------------------
}
?>
