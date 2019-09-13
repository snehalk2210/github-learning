<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	//To load the veg_model ,Order_Model and User_Model
	function __construct(){
		parent::__construct();
		$this->load->Model('Order_Model');
		$this->load->Model('User_Model');
		$this->load->Model('Veg_Model');
		}
	
	//get all users,vegies on order from 
	 function add_order()
	 { 
	 //echo "Hello";
	 	/*echo "<pre>";
		print_r($this->input->post());
		exit;//*/
	    $rs=$this->User_Model->get_all_users();
	    $data['result']=$rs;
	    
	    $date_rs=$this->Veg_Model->getAvailableDates();
	    $data['date_result']=$date_rs;
	    /*echo "<pre>";
	    print_r($date_rs);
	    exit;//*/
	    
	 	$data['inner_view']='order_form';
	 	
		$this->load->view('includes/main_layout',$data);
	 }
	 
	 
	 
	 
	//get selected date from ajax and as per selected date show available vegies list on order form 
	function getAvvegies(){
		//print_r($_POST);
		$date=$_POST['dataS'];
		//$date='2019-07-09';
		//echo $date;
		$avvegies=$this->Order_Model->getAvvegiesonDate($date);
		//echo $this->db->last_query();
		/*echo "<pre>";
		print_r($avvegies);
		exit;//*/
		$html='<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Available Vegetables</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <!--<div id="toolbar">
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>-->
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th ></th>
                                                
                                                <th >Available Vegetables</th>
                                                <th >Unit</th>
                                                <th >Rate</th>
                                                <th >Quantity</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ';
                                    
											for($i=0;$i<count($avvegies);$i++){

                                            $html.='<tr>
                                            <td><input type="checkbox" name=veges['.$avvegies[$i]['av_vegi_id'].']></td>
                                                <td>'.$avvegies[$i]['veg_name'].'</td>
                                                <td>'.$avvegies[$i]['vunit_unit'].'</td>
                                                <td>'.$avvegies[$i]['vr_rate_per_unit'].'<input type="hidden" name="rate_'.$avvegies[$i]['av_vegi_id'].'" value="'.$avvegies[$i]['vr_rate_per_unit'].'"></td>
                                                <td ><select name="qty_'.$avvegies[$i]['av_vegi_id'].'"  id="qty">
 	<option value="1">1</option>
 	<option value="2">2</option>
 	<option value="3">3</option>
 	<option value="4">4</option>
 	<option value="5">5</option>
 	<option value="6">6</option>
 	<option value="7">7</option>
 	<option value="8">8</option>
 	<option value="9">9</option>
 	<option value="10">10</option>
 	
 </select></td>
                                            </tr>';
                                            }
                                           $html.='</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
		
		echo $html;
		
	}
	
	
	//give action on add order button and show order data on sesson window
	function  add_order_action()
	{
		/*/echo "<pre>";
		print_r($this->input->post());
		exit;//*/
		$orders=$this->input->post();
		$this->session->set_userdata('order_confirmation',$orders);
		
		$select_user=$this->input->post('sel_user');
		$select_date=$this->input->post('sel_date');
		$veges=$this->input->post('veges');
		
		/*echo "<pre>";
		print_r($this->input->post());
		exit;*/
		$total=0;
		foreach($veges as $key=>$value){
			$total = $total + ($this->input->post('rate_'.$key)*$this->input->post('qty_'.$key));
		}
		$data['total']=$total;
		
		//echo $total;exit;
		//$orderdata=array('');
		
		$vegies=$this->input->post('veges');
		$tot=0;
		foreach($vegies as $key=>$value)
		{
		
			$veg_name=$this->Order_Model->getvegname($key);
			$rate= $this->input->post('rate_'.$key);
			$qty=$this->input->post('qty_'.$key);
			$total=$rate*$qty;
			$tot=$tot+$total;
			$orders1[]=array('vegetable_name'=>$veg_name,
			                'Vegetable_Rate'=>$rate,
			                'vegetable_quantity'=>$qty,
			                'total'=>$total);
		
			
		}
		$data['orders']=$orders;
		$data['orders1']=$orders1;
		$data['total']=$tot;
		//echo "<pre>";
		//print_r ($data);exit;
		//$this->load->view('confirm',$data);
		$data['inner_view']='confirm'; 
		$this->load->view('includes/main_layout',$data);
		 //
	    
	}
	
	
	//give action to confirm button and insert order data in order_mst
	function confirm_action()
	{
		$ord=$this->session->userdata('order_confirmation');
		//print_r($ord);
		//exit;
		$vegies=$ord['veges'];
		//print_r($vegies);
	    //exit;
		
		$total=0;
		//for($i=0;$i<count($vegies);$i++)
		foreach($vegies as $key=>$value)
		{
			$qty=$ord['qty_'.$key];
			$rate=$ord['rate_'.$key];
			$veg_total=$rate*$qty;
			$order_details[]=array('veg_id'=>$key,
			                        'qty'=>$qty,
			                        'rate'=>$rate,
			                        'total'=>$veg_total);
			                      
		    //print_r($order_details);
		    $total=$total+$veg_total;
		    
		}
		
		/*echo "<pre>";
		print_r($order_details);
		exit;//*/
		
		$ord_arr=array('order_user_id'=>$ord['sel_user'],
						'order_amount'=>$total,
						'order_for_date'=>$ord['sel_date'],
						'order_added_dnt'=>date('Y-m-d H:i:s'),
						'order_status'=>1);
		$tableName="order_mst";
		$addOrd=$this->Order_Model->add_record($ord_arr,$tableName);
		//echo $addOrd;		//echo '<pre>';
		//print_r($addOrd);
		//exit;
		
		if($addOrd){
		
			for($i=0;$i<count($order_details);$i++){
				$ord_details_arr=array('od_order_id'=>$addOrd,
										'od_veg_id'=>$order_details[$i]['veg_id'],
										'od_veg_qty'=>$order_details[$i]['qty'],
										'od_veg_unit_prize'=>$order_details[$i]['rate'],
										'od_total_prize'=>$order_details[$i]['total'],
										'od_added_dnt'=>date('Y-m-d H:i:s'),
										'od_status'=>1);
										
			$tablename="order_details_mst";
			$addorder=$this->Order_Model->add_record($ord_details_arr,$tablename);
			}
			
			
			
		}	
		redirect(base_url().'Orders/add_order');	
	}
	
	
	
	
    //show customers orders list
	function customer_orders(){
		$result=$this->Order_Model->getallorders();
		/*echo "<pre>";
		print_r($result);
		exit;//*/
		$data['inner_view']='cust_order_list';
		$data['result']=$result;
		$this->load->view('includes/main_layout',$data);
	}
	
	function deletecust_order($id)
	{
		
		$rs1=$this->Order_Model->delete_cust_order($id);
		
		if($rs1)
		{
			$this->Order_Model->delete_cust_details($id);
		}
		$data['inner_view']='cust_order_list';
		$this->load->view('includes/main_layout',$data);
		redirect(base_url().'Orders/customer_orders');
		
	}
	
	function modaldata()
	{
		$data['inner_view']='modal1';
		$this->load->view('includes/main_layout',$data);
	}
	
	
	function supplierorder()
	{
		$date_rs=$this->Veg_Model->getAvailableDates();
	    $data['dateresult']=$date_rs;
	    $vegies=$this->Order_Model->getallvegiesof_supplier();
	    //echo "<pre>";
	    //print_r($vegies);
	    //exit;
		$data['vegee']=$vegies;
		
	  	$data['inner_view']='supllier_order_form';
		$this->load->view('includes/main_layout',$data);
	}
	
	function getdate()
	{
		$date=$_POST['dataS'];
		//print_r($date);
		//exit;
		$order_ids=$this->Order_Model->getorderids($date);
		$order_ids=array_column($order_ids,'order_id');
		//print_r($order_ids);
		//exit;
		$order_ids=implode(',',$order_ids);
		//echo $order_ids;
		//exit;
		$data['ord_id']=$order_ids;
		
		$vegtotal=$this->Order_Model->getvegqty($order_ids);
		//echo $vegtotal;
		$vegqty=json_encode($vegtotal);
		echo $vegqty;
		
	}
	
	function add_suplier_action()
	{
		/*/echo "<pre>";
		print_r($this->input->post());
		exit;//*/
		$suporder=$this->input->post();
		$this->session->set_userdata('sup_order_confirmation',$suporder);
		$select_date=$this->input->post('selected_date');
		$vegies=$this->input->post('veges');
		$veg_rate=$this->input->post('sup_rate_per_unit');
		/*/echo"<pre>";
		print_r($this->input->post());
		exit;/*/
		$total=0;
		foreach($vegies as $key=>$value){
			
			$total = $total + ($this->input->post('sup_rate_per_unit_'.$key)*$this->input->post('veg_qty_'.$key));
		}
		$data['total']=$total;
		
		//echo $total;exit;
		//$orderdata=array('');
		$vegies=$this->input->post('veges');
		$tot=0;
		foreach($vegies as $key=>$value)
		{
		
			$veg_name=$this->Order_Model->getvegname($key);
			$rate= $this->input->post('sup_rate_per_unit_'.$key);
			$qty=$this->input->post('veg_qty_'.$key);
			$total=$rate*$qty;
			$tot=$tot+$total;
			$orders1[]=array('vegetable_name'=>$veg_name,
			                'Vegetable_Rate'=>$rate,
			                'vegetable_quantity'=>$qty,
			                'total'=>$total);
		
			
		}
		$data['orders']=$suporder;
		$data['orders1']=$orders1;
		$data['total']=$tot;
		//echo "<pre>";
		//print_r ($data);exit;
		//$this->load->view('sup_confirmation',$data);
		$data['inner_view']='sup_confirmation'; 
		$this->load->view('includes/main_layout',$data);
		
		
	}
	
	function sup_comfirmation_action()
	{
		$sup_order=$this->session->userdata('sup_order_confirmation');
		//echo "<pre>";
		//print_r($sup_order);
		//exit;
		$supvegies=$sup_order['veges'];
		//print_r($vegies);
		//exit;
		$total=0;
		//for($i=0;$i<count($vegies);$i++)
		foreach($supvegies as $key=>$value)
		{
			$qty=$sup_order['veg_qty_'.$key];
			$rate=$sup_order['sup_rate_per_unit_'.$key];
			$supveg_total=$rate*$qty;
			$order_details[]=array('veg_id'=>$key,
			                        'qty'=>$qty,
			                        'rate'=>$rate,
			                        'total'=>$supveg_total);
			                      
		    //print_r($order_details);
		    $total=$total+$supveg_total;
		    
		}
		
		/*/echo "<pre>";
		print_r($order_details);
		exit;/*/
		$sup_order_details=array('bo_amount'=>$total,
		                          'bo_added_on'=>$sup_order['selected_date'],
		                          'bo_order_status'=>1);
		
		
		$tableName="back_order_mst";
		$placebackOrd=$this->Order_Model->placebackord($sup_order_details,$tableName);
		//echo $placebackOrd;		
		//echo '<pre>';
		//print_r($placebackOrd);
		//exit;
		
		if($placebackOrd){
		
			for($i=0;$i<count($order_details);$i++){
				$backord_details_arr=array('bod_bo_id'=>$placebackOrd,
										'bod_veg_id'=>$order_details[$i]['veg_id'],
										'bod_veg_qty'=>$order_details[$i]['qty'],
										'bod_rate'=>$order_details[$i]['rate'],
										'bod_amount'=>$order_details[$i]['total'],
										);
										
			$tablename="back_order_details_mst";
			$placeback_order=$this->Order_Model->add_record($backord_details_arr,$tablename);
			}
			
			redirect(base_url().'Orders/supplierorder');
			
		}	
	}
	
	function back_orders(){
		$rs=$this->Order_Model->getbackorders();
		$data['result']=$rs;
		$data['inner_view']='back_orders_list';
		$this->load->view('includes/main_layout',$data);
	}
	
	function get_backorddetails()
	{
		$backorder_id=$this->input->post('bo_id');
		$backorderDetails=$this->Order_Model->get_allbackinfo($backorder_id);
		$backorder_details=json_encode($backorderDetails);
		print_r($backorder_details);
		//echo $this->db->last_query();
	}
	
	function deleteback_order($id)
	{
		
		$rs1=$this->Order_Model->delete_back_details($id);
		
		if($rs1)
		{
			$this->Order_Model->delete_back_order($id);
		}
		$data['inner_view']='back_orders_list';
		$this->load->view('includes/main_layout',$data);
		redirect(base_url().'Orders/back_orders');
		
	}
	
	function cancelled_orders(){
		$data['inner_view']='canclled_list';
		$this->load->view('includes/main_layout',$data);
	}
	
	
	function invalid_orders(){
		$data['inner_view']='invalid_list';
		$this->load->view('includes/main_layout',$data);
	}
	
	function getOrderDetails(){
		$order_id=$this->input->post('order_id');
		$orderDetails=$this->Order_Model->getOrderDetails($order_id);
		$order_details=json_encode($orderDetails);
		print_r($order_details);
		//echo $this->db->last_query();
	}
	
	
}
?>