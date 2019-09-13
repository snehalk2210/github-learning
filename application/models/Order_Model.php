
<?php 
 class Order_Model extends CI_Model {
	
	
	
	function getAvvegiesonDate($date)
	{
		/*$this->db->where('av_date',$date);
		$result=$this->db->get('available_vegies_mst');
		return $result->result_array();
		//*/
	   $query="SELECT a.av_vegi_id, vg.veg_name, vu.vunit_unit, vr.vr_rate_per_unit
FROM available_vegies_mst AS a
JOIN vegitables_mst AS vg ON vg.veg_id = a.av_vegi_id
JOIN vegies_unit_mst AS vu ON vu.vunit_id = vg.veg_unit_id
JOIN veegitable_rate_mst AS vr ON vr.vr_veg_id = a.av_vegi_id
WHERE av_date =  '".$date."'";
     
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	function getvegname($veg_id)
	{
		$this->db->select('veg_name');
		$this->db->where('veg_id',$veg_id);
		$result=$this->db->get('vegitables_mst');
		$rs=$result->row_array();
		return $rs['veg_name'];
	}
	
	
	function add_record($ord_arr,$tableName)
	{
	 $this->db->insert($tableName, $ord_arr);
	 $ord_id=$this->db->insert_id();
	 return $ord_id;
	 
	}
	
	
	
	function getallorders()
	{
		$query="select u.user_name,o.order_id,o.order_amount
		from order_mst as o 
		join user_mst as u on u.user_id=o.order_user_id";
		$uname=$this->db->query($query);
		return $uname->result_array();
		
	}
	
	function getOrderDetails($orderId){
		
		$query="select od.*,v.veg_name from order_details_mst as od join vegitables_mst as v on v.veg_id=od.od_veg_id where od.od_order_id=".$orderId;
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	function delete_cust_order($id)
	{
		$this->db->where("od_order_id",$id);
		$result1=$this->db->delete("order_details_mst");
		return $result1;
	}
	function delete_cust_details($id)
	{
		$this->db->where("order_id",$id);
		$result2=$this->db->delete("order_mst");
		return $result2;
	}
	
	
	function getorderids($date){
		$order_ids="SELECT order_id FROM `order_mst`WHERE order_for_date = '".$date."'";
		$result=$this->db->query($order_ids);
		return $result->result_array();
		
	}
	
	function getallvegiesof_supplier()
	{
		$query="SELECT v.veg_id,v.veg_name,vu.vunit_unit,s.sup_rate_per_unit
from  vegitables_mst as v
join  supplier_rate_mst as s on s.sup_veg_id = v.veg_id
join  vegies_unit_mst as vu on vu.vunit_id = v.veg_unit_id";
        
        $result=$this->db->query($query);
		return $result->result_array();
	}
	
    function getvegqty($order_ids)
    {
		$query="SELECT od_veg_id ,sum(od_veg_qty) as total_veg_qty from order_details_mst where od_order_id in(".$order_ids.")group by od_veg_id";
		//return $result;
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	function placebackord($sup_order_details,$tableName)
	{
		$this->db->insert($tableName, $sup_order_details);
	     $order_id=$this->db->insert_id();
	    return $order_id;
	}
	
	function getbackorders()
	{
		$result=$this->db->get('back_order_mst');
		return $result->result_array();
	}
	
	function get_allbackinfo($back_ord_ID)
	{
		$query="select bod.*,v.veg_name from back_order_details_mst as bod join vegitables_mst as v on v.veg_id=bod.bod_veg_id where bod.bod_bo_id=".$back_ord_ID;
		$result=$this->db->query($query);
		return $result->result_array();
	}
	
	function delete_back_details($id)
	{
		$this->db->where("bod_bo_id",$id);
		$result1=$this->db->delete("back_order_details_mst");
		return $result1;
	}
	function delete_back_order($id)
	{
		$this->db->where("bo_id",$id);
		$result2=$this->db->delete("back_order_mst");
		return $result2;
	}
	
}
?>



