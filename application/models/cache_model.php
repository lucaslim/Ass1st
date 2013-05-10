<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cache_model extends CI_Model {

	function new_update($id, $val) {

		$this -> db -> where('id', $id);
		$query = $this -> db -> get('Cache');

		if($query -> num_rows() > 0){
			$row = $query -> row();

			return intval($row -> timestamp) > $val;
		}

		return false;

	}

	function update_cache($id, $time){
		$this -> db -> set('timestamp', $time);
		$this -> db -> where('id', $id);
		$this -> db -> update('Cache'); 
	}

}

/* End of file cache_model.php */
/* Location: ./application/models/cache_model.php */