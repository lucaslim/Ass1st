<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for Schedule Model class.
 *
 * @package		Assist
 * @author		Team Assist
 */

class Schedule_Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}	

	// --------------------------------------------------------------------
	/**
	 * Search
	 *
	 * Performs sorting and searching of the league schedule
	 *
	 */

	function search($limit, $sort_by, $sort_order, $offset) {

		// if sort_order is not desc, make asc
		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';

		// if sort by provided is inside sort_columns array, return $sort_by, else default to title
		$fields = array('Id', 'LeagueName', 'SeasonYear', 'HomeTeamName', 'AwayTeamName', 'HomeTeamId', 'AwayTeamId', 'ArenaName', 'Date', 'Time');
		$sort_by = (in_array($sort_by, $fields)) ? $sort_by : 'Date';

		// results query
		$query = $this -> db 
			-> select('Id, LeagueName, SeasonYear, HomeTeamName, AwayTeamName, HomeTeamId, AwayTeamId, ArenaName, Date, Time') 
			-> from('AllFixtures')
			-> where('Progress !=', 'complete')
			-> where('Date >=', date('Y-m-d'))
			-> limit($limit, $offset)
			-> order_by($sort_by, $sort_order);

		$return['rows'] = $query -> get() -> result();

		// count query
		$return['num_rows'] = $this -> db 
			-> where('Progress !=', 'complete')
			-> where('Date >=', date('Y-m-d'))
			-> count_all_results('AllFixtures');

		return $return;
	}	
}