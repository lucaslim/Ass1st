<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Assist
 *
 * This is the model file for News_Model class.
 * This is where all the functions talks to the
 * database.
 *
 * @package		Assist
 * @author		Team Assist
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

		$this -> load -> helper("grid_helper");
	}


	function get_search_news($match)
	{
		$this->db->from('News');
		$this->db->like('Title',$match);
		$this->db->or_like('Description',$match);
		
		$query = $this->db->get();

		return $query->result();
	}

	function get_search_player($match)
	{

	}

	function all_searches($match)
	{
		$this -> get_search_news($match);
		$this -> get_search_player($match);
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