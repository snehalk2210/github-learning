<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->Model('Veg_Model');
		$this->load->Model('User_Model');
		$this->load->Model('Order_Model');
		$this->load->Model('Customers_Model');
		$config['upload_path']          = './uploads/vegetables/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
	}
	
	function vegetables()
	{
		$this->load->view('customers/includes/header');
		$this->load->view('customers/includes/left_menu');
		//$data=$this->session->userdata('user_session');
		$this->load->view('customers/includes/mobile_menu_aera');
		$this->load->view('customers/includes/preloader');
		$this->load->view('customers/includes/footer');
	}
	
	function login()
	{
		$this->load->view('customers/main_view');
	}
	
	function user_login()
	{
		$this->form_validation->set_rules('usr_name','Username','required');
		$this->form_validation->set_rules('pwd','Password','required|max_length[12]');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run())
		{
			//echo "validation successful";
			$username=$this->input->post('usr_name');
			$pwd=$this->input->post('pwd');
			$this->load->model('Customers_Model');
			$id=$this->Customers_Model->isvalidate($username,$pwd);
			if($id){
				
			    //echo "details matched.";
			    $this->session->set_userdata('id',$id);
			    return redirect(base_url().'Customers/welcome');
			}
			else{
				//echo "not matched";
				$this->session->set_flashdata('Login_failed','Invalid Username/Password');
				redirect(base_url().'Customers/login');
			}
		}
		else{
			//echo validation_errors();
			
	
		    
		}
		
		//$data['inner_view']='customers/login';
		//$this->load->view('customers/includes/main_layout2',$data);
		$this->load->view('customers/login');
	}
	
	public function welcome(){
		//$this->load->view('customers/welcome_msg');
		$data['inner_view']='customers/welcome_msg';
		$this->load->view('customers/includes/main_layout',$data);
	}
	
	public function register()
	{
		$result=$this->User_Model->get_all_types();
		$data['type']=$result;
		$this->form_validation->set_rules('usr_name','Username','required');
		$this->form_validation->set_rules('pwd','Password','required');
		$this->form_validation->set_rules('first_name','First Name','required|alpha');
		$this->form_validation->set_rules('last_name','Last Name','required|alpha');
		$this->form_validation->set_rules('contact','Contact No.','required|numeric');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('address','Address','required');
		
		$this->form_validation->set_rules('zip_code','Zip-code','required|numeric');
		$this->form_validation->set_rules('dadd','Detailed Address','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run())
		{
			//echo "validation successful";
			$username=$this->input->post('usr_name');
			$pwd=$this->input->post('pwd');
			$this->load->model('Customers_Model');
			$id=$this->Customers_Model->isvalidate($username,$pwd);
			if($id)
			{
				
				echo "already exist";
				//return redirect(base_url().'admin_con/login_form');
			}
			else{
				$first_name=$this->input->post('first_name');
			    $last_name=$this->input->post('last_name');
			    $contact=$this->input->post('contact');
			    $gender=$this->input->post('gender');
			    $address=$this->input->post('address');
			    $country=$this->input->post('country');
			    $state=$this->input->post('state');
			    $city=$this->input->post('city');
			    $zip_code=$this->input->post('zip_code');
			    $dadd=$this->input->post('dadd');
			    
				$userd=array('user_name'=>$username,
			            'pwd'=>$pwd,
			            'first_name'=>$first_name,
			            'last_name'=>$last_name,
			            'contact'=>$contact,
			            'gender'=>$gender,
			            'address'=>$address,
			            'country'=>$country,
			            'state'=>$state,
			            'city'=>$city,
			            'zip_code'=>$zip_code,
			            'detailed_address'=>$dadd);
		      $this->load->model('Customers_Model');
		      $data['inserted_id']=$this->Customers_Model->insert_userdetails($userd);
		
		 }
		}
		else{
			//echo "not successful";
			echo validation_errors();
		}
		$this->load->view('customers/add_login_details');
	}

	
	function vegies_list()
	{
		$vegies=$this->Customers_Model->get_vegies();
		$data['result']=$vegies;
		$data['inner_view']='customers/vegitable_list';
		$this->load->view('customers/includes/main_layout',$data);
	}
	
	function add_order()
	{
		
		$date=$this->Veg_Model->get_available_vegies_date();
		$data['dates']=$date;
		$data['inner_view']='customers/add_order';
		$this->load->view('customers/includes/main_layout',$data);
	}
	
	function get_Avvegies()
	{
		//print_r($_POST);
		$date=$_POST['dataS'];
		//$date='2019-07-09';
		//echo $date;
		$avvegies=$this->Order_Model->getAvvegiesonDate($date);
		//echo $this->db->last_query();
		//echo "<pre>";
		//print_r($avvegies);
		//exit;
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
	
	
	function add_order_action()
	{
		/*echo "<pre>";
		print_r($this->input->post());
		exit;*/
		$addorders=$this->input->post();
		$this->session->set_userdata('order_confirmation',$addorders);
		
		$select_date=$this->input->post('date');
		$vegies=$this->input->post('veges');
		
		/*echo "<pre>";
		print_r($this->input->post());
		exit;*/
		$total=0;
		foreach($vegies as $key=>$value){
			$total = $total + ($this->input->post('rate_'.$key)*$this->input->post('qty_'.$key));
		}
		$data['total']=$total;
		
		//echo $total;exit;
		//$orderdata=array('');
		
		$veges=$this->input->post('veges');
		$tot=0;
		foreach($veges as $key=>$value)
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
		$data['orders']=$addorders;
		$data['orders1']=$orders1;
		$data['total']=$tot;
		//echo "<pre>";
		//print_r ($data);exit;
		//$this->load->view('confirm',$data);
		$data['inner_view']='confirm'; 
		$this->load->view('includes/main_layout',$data);
	}
	
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
	
	
}
?>