<?php
class Customers_Model extends CI_Model {
	/*function isvalidate($user_name,$pwd)
	{
		$data=array(
		            'user_name'=>$user_name,
		            'password'=>$pwd);
		$q=$this->db->where($data)
		            ->get('user_mst');
		    
		    //echo "<pre>";
		     //print_r($q->row()->veg_name);
		     //exit; 
		     if($q->num_rows())
		     {
		     	$id=$q->row();
			 	//return $q->row()->id;
			 }
			 else
			 {
				return false;
			 }
		
	}*/
	

	function getusername($user_id)
	{
		$this->db->select('user_name');
		$this->db->where('user_id',$user_id);
		$result=$this->db->get('user_mst');
		$rs=$result->row_array();
		return $rs['user_name'];
	}
	
	function get_vegies()
	{
		$query='SELECT v.veg_id,v.veg_photo,v.veg_rate,v.veg_name,vt.veg_type,vu.vunit_unit,vu.vunit_qty
from vegitables_mst as v
join vegies_unit_mst as vu on vu.vunit_id=v.veg_unit_id
join vegies_type_mst as vt on vt.type_id=v.veg_type_id';
		
		
		$result=$this->db->query($query);
		
		
		return $result->result_array();
	}
	
	function insert_user($user)
	{
		$this->db->insert('user_mst',$user);
		return $this->db->insert_id();
	}
	
	function insert_userdetails($userd)
	{
		$this->db->insert('user_details_mst',$userd);
		return $this->db->insert_id();
	}
	
	
	}
?>