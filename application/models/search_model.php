<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );

/**
 * Assist
 *
 * This is the model file for News_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package  Assist
 * @author  Team Assist
 */

// ------------------------------------------------------------------------
class Search_Model extends CI_Model {

	/**
	 * Constructor for the Search_Model Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> helper( "grid_helper" );
	}

	function search_keyword( $keyword ) {
		//Get top 5 player data
		$this -> db -> select( 'Id, FullName as `Name`, Picture as `Picture`, \'Players\' as `Type`, \'\' as `Url` ', FALSE );
		$this -> db -> like( 'FullName', $keyword );
		$this -> db -> order_by( 'FullName', 'asc' );
		$this -> db -> limit( 5 );
		$query = $this -> db -> get( 'AllUsers' );

		$player_data = $query -> result();

		//Get top 5 team data
		$this -> db -> select( 'Id, Name as `Name`, Picture as `Picture`, \'Team\' as `Type`, \'pages/team/\' as `Url` ', FALSE );
		$this -> db -> like( 'Name', $keyword );
		$this -> db -> order_by( 'Name', 'asc' );
		$this -> db -> limit( 5 );
		$query = $this -> db -> get( 'Team' );

		$team_data = $query -> result();

		$return_data = array();

		$return_data = array_merge( $return_data, $player_data );
		$return_data = array_merge( $return_data, $team_data );

		// foreach ($return_data as $value) {
		// 	print_r($value);
		// 	print_r('<br />');
		// };
		// exit;

		return $return_data;
	}


	function get_search_news( $match ) {
		$this->db->from( 'News' );
		$this->db->like( 'Title', $match );
		$this->db->or_like( 'Description', $match );

		$query = $this->db->get();

		return $query->result();
	}

	function get_search_player( $match ) {

	}

	function all_searches( $match ) {
		$this -> get_search_news( $match );
		$this -> get_search_player( $match );
	}

	// function count_

	/*function get_search_row($match,$limit,$start)
	{
		//$this->db->limit($limit, $start);
		$this-> db-> select('Id, Title, Description');
		$this-> db-> from('News');
		$this->db->like('Title',$match);
		$this->db->or_like('Description',$match);

		//$query = $this->db->get('News');
		$query = $this->db->get();

		if ($query -> num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}*/

}
