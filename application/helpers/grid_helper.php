<?php
/**
 * Assist
 *
 * This is the grid helper class
 *
 * @package  Assist
 * @author  Team Assist
 */

// --------------------------------------------------------------------

/**
 * Get total row count
 *
 * Get the total number of rows in based on the table name
 *
 */

function get_row_count( $table_name, $option = null ) {
	//Create a new instance of CI
	$CI = &get_instance();

	if ( isset( $option ) ) {

		//Set column names
		if ( isset( $option['column_names'] ) ){			
			$CI -> db -> select( $option['column_names'] );
		}

		//Set distinct
		if ( isset( $option['distinct'] ) ) {

			if ( $option['distinct'] ) {
				$CI -> db -> distinct();
			}
		}

		//Set Where Clause
		if ( isset( $option['where'] ) ) {
			if ( is_array( $option['where'] ) ) {
				foreach ( $option['where'] as $column_name => $value ) {
					$CI -> db -> where( $column_name, $value );
				}
			}
			else {
				$CI -> db -> where( $option['where'] );
			}
		}
	}

	// $result = $CI -> db -> get( $table_name );

	// return $result -> num_rows());

	return $CI -> db -> count_all_results( $table_name );
}

// --------------------------------------------------------------------

/**
 * Get a array of information
 *
 * This will return an array of information based on the table name
 *
 */

function get_result( $option ) {

	if ( !isset( $option ) )
		return FALSE;

	if ( !isset( $option['table_name'] ) )
		return FALSE;

	//Create a new instance of CI
	$CI = &get_instance();

	//Set distinct
	if ( isset( $option['distinct'] ) ) {

		if ( $option['distinct'] ) {

			$CI -> db -> distinct();
		}
	}

	//Set column names
	if ( isset( $option['column_names'] ) )
		$CI -> db -> select( $option['column_names']  );

	//Set the limit on the database query
	if ( isset( $option['start_number'] ) && isset( $option['total_number'] ) )
		$CI -> db -> limit( $option['total_number'], $option['start_number'] );
	else {
		if ( isset( $option['total_number'] ) )
			$CI -> db -> limit( $option['total_number'] );
	}

	if ( isset( $option['order_by'] ) ) {
		foreach ( $option['order_by'] as $column_name => $direction ) {
			$CI -> db -> order_by( $column_name, $direction );
		}
	}

	if ( isset( $option['where'] ) ) {
		if ( is_array( $option['where'] ) ) {
			foreach ( $option['where'] as $column_name => $value ) {
				$CI -> db -> where( $column_name, $value );
			}
		}
		else {
			$CI -> db -> where( $option['where'] );
		}
	}

	//Execute select statement
	$query = $CI -> db -> get( $option['table_name'] );

	//Check if any rows returned
	if ( !$query || $query -> num_rows() <= 0 )
		return FALSE;

	return $query -> result();
}

// --------------------------------------------------------------------

/**
 * Set Config for Pagination
 *
 * This will set the default configuration for the pagination file.
 *
 */

function get_pagination_data( $controller_path, $total_rows, $per_page = 10 ) {

	//Create a new instance of CI
	$CI = &get_instance();

	//Load pagination library
	$CI -> load -> library( "pagination" );

	//set pagination configuration
	$config = array();
	$config["base_url"] = site_url() . '/' . $controller_path;
	$config["total_rows"] = $total_rows;
	$config["per_page"] = $per_page;
	$config["uri_segment"] = $CI -> uri -> total_segments();

	//initialize pagination config
	$CI -> pagination -> initialize( $config );

	//get current page
	$uri_seg = $CI -> uri -> segment( $config['uri_segment'] );
	$page = $uri_seg ? $uri_seg : 0;

	//create data for view
	$data['current_page'] = $page;
	$data['per_page'] = $config['per_page'];
	$data['page_links'] = $CI -> pagination -> create_links();

	return $data;
}

// --------------------------------------------------------------------
?>
