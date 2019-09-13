<?php
class User_Model extends CI_Model {
	function get_all_users(){
		$result=$this->db->get('user_mst');
		
		return $result->result_array();
	}
	/*function add_user_db()
	{
		$query=$this->db->query('insert into user_mst value(null,'".$."')')
	}*/
	
	function insertuser($user)
	{
		$this->db->insert('user_mst',$user);
		return $this->db->insert_id();
	}
	
	function insertuserdetails($userd)
	{
		$this->db->insert('user_details_mst',$userd);
		return $this->db->insert_id();
	}
	
	function getuserDetails($id){
		$this->db->where('user_id',$id);
		$result=$this->db->get('user_mst');
		return $result->row_array();
	}
	
	
	function updateuser($userdata,$user_id)
	{
		//print_r($userdata);exit;
		$this->db->where('user_id',$user_id);
		$result=$this->db->update('user_mst',$userdata);
	}
	function inserttype($usrtype)
	{
		$this->db->insert('user_type_mst',$usrtype);
		return $this->db->insert_id();
	}
	
	function deleteUser($id)
	{
		$this->db->where("user_id",$id);
		$rs=$this->db->delete("user_mst");
		return $rs;
	}
	
	function deletetype($id)
	{
		$this->db->where("user_type_id",$id);
		$rs=$this->db->delete("user_type_mst");
		return $rs;
	}
	function get_all_types()
	{
		$result=$this->db->get('user_type_mst');
		
		return $result->result_array();
	}
	
	function edit_type($id)
	{
		$this->db->get_where("user_type_id",$id);
		$rs=$this->db->delete("user_type_mst");
		return $rs;
	}
	
	function gettypedetails($id)
	{
		$this->db->where('user_type_id',$id);
		$result=$this->db->get('user_type_mst');
		return $result->row_array();
	}
	
	function updatetype($usertype,$type_id)
	{
		//print_r($usertype);
		//exit;
		$this->db->where("user_type_id",$type_id);
		$result=$this->db->update('user_type_mst',$usertype);
	}
	
	
	function getsubadmin()
	{
		$this->db->where('user_type','2');
		$result=$this->db->get('user_mst');
		return $result->result_array();
	}
	
	function getadmin()
	{
		$this->db->where('user_type','1');
	    $result=$this->db->get('user_mst');
	    return $result->result_array();
	}
	
	function getcustomers()
	{
		$this->db->where('user_type','3');
	    $result=$this->db->get('user_mst');
	    return $result->result_array();
	}
	
	function getdeliveryboy()
	{
		$query="select u.user_id,u.user_name,u.email,ud.contact
		from user_mst as u
		join user_details_mst as ud on ud.ud_user_id=u.user_id
		where user_type=4";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
	
	function get_d_person_details($user_Id)
	{
		$this->db->where('dlp_user_id',$user_Id);
		$result=$this->db->get('delivery_person_details_mst');
		return $result->row_array();
		
	}
	
	function insertd_persondetails($details,$user_id)
	{
		
		$this->db->insert('delivery_person_details_mst',$details);
		return $this->db->insert_id();
	}
	
	function edit_person_details($details,$insertId)
	{
		
		$this->db->where('dlp_user_id',$insertId);
		$result=$this->db->update('delivery_person_details_mst',$details);
	}
	
	
}
?>