<?php
class Unit_Model extends CI_Model {
	function get_Vegies(){
		$result=$this->db->get('vegitables_mst');
		
		return $result->result_array();
	}
}
?>