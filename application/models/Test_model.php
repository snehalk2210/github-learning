<?php
class Test_model extends CI_Model {
	function get_users(){
		$this->db->select('cust_name,cust_email');
		$this->db->where('cust_status',1);
		$query = $this->db->get('customers_mst');
		return $query->result_array();
	}
}
?>