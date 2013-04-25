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

	function search_count( $keyword ) {
		$option = array( 'like' => array( 'FullName' => $keyword ) );

		$player_count = get_row_count( "AllUsers", $option );

		$option = array( 'like' => array( 'Name' => $keyword ) );

		$team_count = get_row_count( "AllTeams", $option );

		return $player_count + $team_count;
	}

	function search_all_keywords( $keyword, $total_num, $start_num, $total_rows ) {

		//Get all results
		$result = $this -> search_keyword( $keyword );

		//sort array
		usort( $result, function( $a, $b ) {
				return strcmp( $a -> Name, $b -> Name );
			} );


		$count = 0;
		$page_data = array();

		//paging
		while ( $count < $total_num && ($start_num + $count) < $total_rows) {

			array_push( $page_data, $result[$start_num + $count] );

			$count++;
		}

		return $page_data;


		// $option = array( 'table_name' => 'AllUsers',
		//  'start_number' => $start_num/2,
		//  'total_number' => $total_num/2,
		//  'like' => array( 'FullName' => $keyword ),
		//  'column_names' => 'Id, FullName as `Name`, Picture as `Picture`, \'Players\' as `Type`, \'\' as `Url`, City, Province, CountryName ',
		//  'order_by' => array( 'FullName' => 'asc' ) );

		// $player_data = get_result( $option );

		// $option = array( 'table_name' => 'AllTeams',
		//  'start_number' => $start_num/2,
		//  'total_number' => $total_num/2,
		//  'like' => array( 'Name' => $keyword ),
		//  'column_names' => 'Id, Name as `Name`, Picture as `Picture`, \'Team\' as `Type`, \'pages/team/\' as `Url`, LeagueName, ConferenceName, ArenaName ',
		//  'order_by' => array( 'Name' => 'asc' ) );

		// $team_data = get_result( $option );

		// $return_data = array();
		// if(is_array($player_data))
		//  $return_data = array_merge( $return_data, $player_data );

		// if(is_array($team_data))
		//  $return_data = array_merge( $return_data, $team_data );

		// return $return_data;
	}

	function search_keyword( $keyword, $num_results = null ) {
		//Get top 5 player data
		$this -> db -> select( 'Id, FullName as `Name`, Picture as `Picture`, \'Players\' as `Type`, \'pages/player/\' as `Url`, City, Province, CountryName ', FALSE );
		$this -> db -> like( 'FullName', $keyword );
		$this -> db -> order_by( 'FullName', 'asc' );
		if ( $num_results != null )
			$this -> db -> limit( $num_results );
		$query = $this -> db -> get( 'AllUsers' );

		$player_data = $query -> result();

		//Get top 5 team data
		$this -> db -> select( 'Id, Name as `Name`, Picture as `Picture`, \'Team\' as `Type`, \'pages/team/\' as `Url`, LeagueName, ConferenceName, ArenaName ', FALSE );
		$this -> db -> like( 'Name', $keyword );
		$this -> db -> order_by( 'Name', 'asc' );
		if ( $num_results != null )
			$this -> db -> limit( $num_results );
		$query = $this -> db -> get( 'AllTeams' );

		$team_data = $query -> result();

		$return_data = array();

		$return_data = array_merge( $return_data, $player_data );
		$return_data = array_merge( $return_data, $team_data );

		// foreach ($return_data as $value) {
		//  print_r($value);
		//  print_r('<br />');
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
