<?php
class Veg_Model extends CI_Model {
	function isvalidate($veg_name)
	{
		$data=array(
		            'veg_name'=>$veg_name);
		$q=$this->db->where($data)
		            ->get('vegitables_mst');
		    
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
		
	}
	
	
	function get_Vegies(){
		$query='SELECT v.veg_id,v.veg_photo,vr.vr_rate_per_unit,v.veg_name,vt.veg_type,vu.vunit_unit,vu.vunit_qty
from vegitables_mst as v
join vegies_unit_mst as vu on vu.vunit_id=v.veg_unit_id
join vegies_type_mst as vt on vt.type_id=v.veg_type_id
join veegitable_rate_mst as vr on vr.vr_veg_id=v.veg_id';
		
		
		$result=$this->db->query($query);
		//$result=$this->db->get('vegitables_mst');
		
		return $result->result_array();
	}
	
	function get_Vegies_details($id)
	{
		$this->db->where('veg_id',$id);
		$result=$this->db->get('vegitables_mst');
		return $result->row_array();
	}
	
	function update_photo_vegie($data,$veg_id)
	{
		$this->db->where("veg_id",$veg_id);
		$result2=$this->db->update('vegitables_mst',$data);
		
	}
	
	function update_vegies($vegdata,$veg_id)
	{
		$this->db->where("veg_id",$veg_id);
		$result=$this->db->update('vegitables_mst',$vegdata);
	}
	
	function get_Units()
    {
	  $result= $this->db->get('vegies_unit_mst');
	  return $result->result_array();
    }
    
    function insertdata($vegies)
    {
		$this->db->insert('vegitables_mst',$vegies);
		return $this->db->insert_id();
		
		
	}
	
	
	function isvalidateunit($vegies_unit)
	{
		$data=array(
		            'vunit_unit'=>$vegies_unit);
		$q=$this->db->where($data)
		            ->get('vegies_unit_mst');
		    
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
	}
	
	function insertunit($veg_unit)
	{
		$this->db->insert('vegies_unit_mst',$veg_unit);
		return $this->db->insert_id();
	}
	
	function updateunit($units,$unit_id)
	{
		$this->db->where("vunit_id",$unit_id);
		$result=$this->db->update('vegies_unit_mst',$units);
	}
	
	function deleteunit($id)
	{
		$this->db->where("vunit_id",$id);
		$result=$this->db->delete("vegies_unit_mst");
		return $result;
	}
	
	function getunitdetails($id)
	{
		$this->db->where('vunit_id',$id);
		$result=$this->db->get('Vegies_unit_mst');
		return $result->row_array();
	}
	
	function deletevegie($id)
	{
		$this->db->where("veg_id",$id);
		$result=$this->db->delete("vegitables_mst");
		return $result;
	}
	
	// This function gets the next dates when the vegeis are available
	function getAvailableDates(){
		
		$this->db->distinct();
		$this->db->select('av_date');
		$this->db->select('av_end_date');
		$result=$this->db->get('available_date_mst');
		//echo $this->db->last_query();exit;
		return $result->result_array();
	}
	
	
	function inserttype($type)
	{
		$this->db->insert('vegies_type_mst',$type);
		return $this->db->insert_id();
	}
	
	function gettypes()
	{
		 $result= $this->db->get('vegies_type_mst');
	     return $result->result_array();
	}
	
	function deletetype($id)
	{
		$this->db->where("type_id",$id);
		$result=$this->db->delete("vegies_type_mst");
		return $result;
	}
	
	function insertdelivery_date($delivery_date)
	{
		
		$this->db->insert('delivery_dates_mst',$delivery_date);
		$this->db->order_by('delivery_date','DESC');
		return $this->db->insert_id();
	}
	
	function insert_sup_vegies_rate($veg_data)
	{
		$this->db->insert('supplier_rate_mst',$veg_data);
		return $this->db->insert_id();
	}
	
	function get_sup_rate()
	{
		$result= $this->db->get('supplier_rate_mst');
	     return $result->result_array();
	}
	
	function insertsup_vegiesdata($sup_vegies)
	{
		$this->db->insert('vegies_available_from_supplier_mst',$sup_vegies);
		return $this->db->insert_id();
	}
	
	function get_vegies_from_sup_list()
	{
		$query='select vs.vs_veg_id,vs.vs_veg_photo,v.veg_name,vt.veg_type,vu.vunit_unit,vu.vunit_qty,sup.sup_rate_per_unit  from  vegies_available_from_supplier_mst as vs
join vegitables_mst as v on v.veg_id=vs.vs_veg_id
join vegies_type_mst as vt on vt.type_id=vs.vs_veg_type
join vegies_unit_mst as vu on vu.vunit_id=v.veg_unit_id
join supplier_rate_mst as sup on sup.sup_veg_id=v.veg_id';
		$result=$this->db->query($query);
	     return $result->result_array();
	}
	
	
	
	function insertav_date($dates)
	{
		$this->db->insert('available_date_mst',$dates);
		return $this->db->insert_id();
	}
	
	function insertav_vegies_on_date($data)
	{
		$this->db->insert(' available_vegies_mst',$data);
		return $this->db->insert_id();
	}
	
	function get_available_vegies_date()
	{
		$this->db->distinct();
		$this->db->select('av_date');
		$this->db->select('av_order_end_date');
		$result=$this->db->get('available_vegies_mst');
		//echo $this->db->last_query();exit;
		return $result->result_array();
	}
}
?>