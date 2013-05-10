<?php
if ( !defined( 'BASEPATH' ) ) exit( 'no direct script access allowed' );

/**
 * Assist
 *
 * This is the controller for the index page
 *
 * @package  Assist
 * @author  Team Assist
 */

// --------------------------------------------------------------------

class Search extends CI_Controller {

	/**
	 * Constructor for the Pages Class
	 *
	 * Load required model, helper, library class file.
	 *
	 */
	function __construct() {
		parent::__construct();

		$this -> load -> model( 'search_model' );

		$this -> load -> helper( 'date' );
		$this -> load -> helper( 'template' );
		$this -> load -> helper( array( 'form', 'url' ) );
		$this -> load -> helper( 'login_helper' );
	}


	// public function index()
	//  $search = $this->input->post( 'q' );
	//  $data['login_header'] = set_login_header(); //get from template_helper.php


	//  $data['query'] = $this->search_model->get_search_news( $search );

	//  $this -> load -> view( 'templates/header', $data );
	//  $this-> load -> view( 'search_view', $data );

	//  $this -> load -> view( 'templates/footer', $data );

	// }


	public function query() {
		$keyword = $this -> input -> get( 'q' );

		$result = $this -> search_model -> search_keyword( $keyword, 3 );

		if ( $result > 0 )
			$return_array = array( 'success' => true, 'result' => $result );
		else
			$return_array = array( 'success' => false );

		echo json_encode( $return_array );
	}

	public function get_search_data() {
		$cache_result =  $this -> cache -> get( 'searchbox' );

		//If cache_result found
		if ( $cache_result ) {
			//check if update is not needed
			if ( !$this -> cache_model -> new_update( 1, $cache_result['timestamp'] ) ) {
				//return cache result
				echo json_encode( $cache_result );
				return;
			}
		}

		//grab new search data
		$result = $this -> search_model -> get_search_data();

		$time = now();

		if ( $result > 0 )
			$return_array = array( 'timestamp' => $time, 'success' => true, 'result' => $result );
		else
			$return_array = array( 'timestamp' => $time, 'success' => false );

		//write to cache
		$this -> cache -> write( $return_array, 'searchbox' );

		// //update cache table
		// $this -> cache_model -> update_cache( 1, $time );

		echo json_encode( $return_array );
	}
}
?>
