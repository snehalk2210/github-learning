<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	
	/*function getUsers(){
		$this->load->model('Test_model');
		$sql_query=$this->Test_model->get_users();
		echo "<pre>";
		print_r($sql_query);
	}
	function test_table(){
		$data['inner_view']='list_demo';
		$this->load->view('includes/main_layout',$data);
	}*/
	
	
	function __construct(){
		parent::__construct();
		$this->load->Model('User_Model');
		$config['upload_path']          = './uploads/vegetables/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
		}
		
	function login()
	{
		$this->load->view('main_view');
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
			$this->load->model('User_Model');
			$id=$this->User_Model->isvalidate($username,$pwd);
			if($id){
				
			    //echo "details matched.";
			    $this->session->set_userdata('id',$id);
			   
			    return redirect(base_url().'User/welcome');
			}
			else{
				//echo "not matched";
				$this->session->set_flashdata('Login_failed','Invalid Username/Password');
				redirect(base_url().'User/user_login');
			}
		}
		else{
			//echo validation_errors();
			
	
		    
		}
		
		//$data['inner_view']='customers/login';
		//$this->load->view('customers/includes/main_layout2',$data);
		$this->load->view('add_user');
	}
	
	public function welcome(){
		//$this->load->view('customers/welcome_msg');
		$data['inner_view']='welcome_msg';
		$this->load->view('includes/main_layout',$data);
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
			$this->load->model('User_Model');
			$id=$this->User_Model->isvalidate($username,$pwd);
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
		      $this->load->model('User_Model');
		      $data['inserted_id']=$this->User_Model->insert_userdetails($userd);
		
		 }
		}
		else{
			//echo "not successful";
			echo validation_errors();
		}
		$this->load->view('User/add_login_details');
	}
	
		
	function all_user(){
		
		$rs=$this->User_Model->get_all_users();
		
		//Print_r($rs);
		$data['inner_view']='user_list';
		$data['result']=$rs;
		$this->load->view('includes/main_layout',$data);
	}
	
	function edit_user($id){
		$result=$this->User_Model->getuserDetails($id);
		$user_types=$this->User_Model->get_all_types();
		/*echo "<pre>";
		print_r($result);
		exit;//*/
		$data['result']=$result;
		$data['user_types']=$user_types;
		$data['inner_view']='edit_user';
		$this->load->view('includes/main_layout',$data);
	}
	
	function edit_user_action(){
		/*echo "<pre>";
		print_r($this->input->post());
		exit;//*/
		$user_id=$this->input->post('user_Id');
		$user_name=$this->input->post('usr_name');
		$user_type=$this->input->post('user_type');
		$email=$this->input->post('user_email');
		//$pwd=$this->input->post('pwd');
		
		$userdata=array('user_name'=>$user_name,
		            'user_type'=>$user_type,
		            'email'=>$email
		            );
		             
		$this->User_Model->updateuser($userdata,$user_id);
		
		//echo $this->db->last_query();
		redirect(base_url().'User/all_user');
		
	}
	function delete_user($id){
		
		$rs=$this->User_Model->deleteUser($id);
		
		//$this->load->view('includes/main_layout',$data);
		redirect(base_url().'User/all_user');
	}
	
	
	
	function sub_admin(){
		$rs=$this->User_Model->getsubadmin();
		//print_r($result);
		//exit;
		$data['users']=$rs;
		
		
		$data['inner_view']='sub_admin_list';
		$this->load->view('includes/main_layout',$data);
	}
	
	function admin(){
		$rs=$this->User_Model->getadmin();
		//print_r($result);
		//exit;
		$data['users']=$rs;
		
		
		$data['inner_view']='admin_list';
		$this->load->view('includes/main_layout',$data);
	}
	
	
	
	function customers(){
		$cust=$this->User_Model->getcustomers();
		//print_r($cust);
		//exit;
		$data['rs']=$cust;
		$data['inner_view']='customers_list';
		$this->load->view('includes/main_layout',$data);
	}
	
	function delivery_person(){
		$dp=$this->User_Model->getdeliveryboy();
		$data['divp']=$dp;
		$data['inner_view']='delivery_person_list';
		$this->load->view('includes/main_layout',$data);
	}
	
	function d_person_details()
	{
		$user_id=$this->input->post('user_id');
		$user_details=$this->User_Model->get_d_person_details($user_id);
		 
		 if($user_details!="")
		{
			
			echo json_encode($user_details);
		}
		else{
			echo "0";
			
		}
	}
	
	
	
	function addD_details_action()
	{
	    /*echo "<pre>";
		print_r($this->input->post());
		exit;*/
		$user=$this->input->post('user_Id');
		//echo $user;
		$user_details=$this->User_Model->get_d_person_details($user);
	
		 if($user_details=="")
		 {
		 	//echo "not";
		
		$user_id=$this->input->post('user_Id');
		$user_name=$this->input->post('person_name');
		
		$date=$this->input->post('join_date');
		$license_no=$this->input->post('license_no');
		$vehical_no=$this->input->post('vehical_no');
		$v_type=$this->input->post('v_type');
		
		$v_capacity=$this->input->post('v_capacity');
	    //$img_config=array();
		/*$img_config['upload_path'] = 'E:\wamp\www\organic_vegies\uploads\delivery_person';
		$img_config['allowed_types'] = 'gif|jpg|png|jpeg';
		$img_config['max_size']     = '100';
		$img_config['max_width'] = '1024';
		$img_config['max_height'] = '768';
		
	    
		$this->upload->initialize($img_config);
                if ( ! $this->upload->do_upload('v_photo'))
                {
                        $error = array('error' => $this->upload->display_errors());
						//echo $config['upload_path'];
						echo $img_config['upload_path'];
							print_r($error);exit;
                      //  $this->load->view('upload_form', $error);
                }
                else
                {
                        $vehical = array('upload_vehical_photo' => $this->upload->data());

						//print_r($data);exit;
                      //  $this->load->view('upload_success', $data);
                }
         
        $v_photo=$vehical['upload_vehical_photo']['file_name'];       
        $this->upload->initialize($img_config);
                if ( ! $this->upload->do_upload('person_photo'))
                {
                        $error = array('error' => $this->upload->display_errors());
						//echo $config['upload_path'];
						echo $img_config['upload_path'];
							print_r($error);exit;
                      //  $this->load->view('upload_form', $error);
                }
                else
                {
                        $user = array('upload_user_photo' => $this->upload->data());

						//print_r($data);exit;
                      //  $this->load->view('upload_success', $data);
                }
        $user_photo=$user['upload_user_photo']['file_name'];
		//$d_person_details=json_encode($orderDetails);
		//print_r($order_details);*/
		$details=array(
		               'dlp_user_id'=>$user_id,
		               'dlp_user_name'=>$user_name,
		               'dlp_join_date'=>$date,
		               'dlp_license_no'=>$license_no,
		               'dlp_vehical_no'=>$vehical_no,
		               'dlp_vehical_type'=>$v_type,
		               'dlp_vehical_capacity'=>$v_capacity,
		               'dlp_status'=>1);
		 
		 $this->User_Model->insertd_persondetails($details,$user_id);
		//redirect(base_url().'User/delivery_person');
		//}
		 }
		 else
		 {
		 	//echo "exists";
		 
		
		$user_id = $this->input->post('user_Id');	
		$user_name=$this->input->post('person_name');
		
		$date=$this->input->post('join_date');
		$license_no=$this->input->post('license_no');
		$vehical_no=$this->input->post('vehical_no');
		$v_type=$this->input->post('v_type');
		
		$v_capacity=$this->input->post('v_capacity');
		$details=array(
		               'dlp_user_id'=>$user_id,
		               'dlp_user_name'=>$user_name,
		               'dlp_join_date'=>$date,
		               'dlp_license_no'=>$license_no,
		               'dlp_vehical_no'=>$vehical_no,
		               'dlp_vehical_type'=>$v_type,
		               'dlp_vehical_capacity'=>$v_capacity,
		               'dlp_status'=>1);
			$this->User_Model->edit_person_details($details,$user_id);
		
		
	   }
	   	    redirect(base_url().'User/delivery_person');	
	}
	
	
	function delete_delivery_person(){
		$data['inner_view']='vegies_list';
		$this->load->view('includes/main_layout',$data);
	}
	
	function user_type(){
		$rs=$this->User_Model->get_all_types();
		$data['inner_view']='user_type_list';
		$data['result']=$rs;
		
		$this->load->view('includes/main_layout',$data);
	}
	
	function add_user_type(){
		
		$data['inner_view']='add_user_type';
		$this->load->view('includes/main_layout',$data);
	}
	
	function add_type_action()
	{
		/*echo "<pre>";
		print_r($this->input->post());
		exit;*/
		$user_type=$this->input->post('type');
		$type_description=$this->input->post('desc');
		
		$usrtype=array('user_type'=>$user_type,
		             'type_description'=>$type_description);
		             
	    $this->User_Model->inserttype($usrtype);
		//echo $this->db->last_query(); 
		redirect(base_url().'User/user_type');
	    
	}
	
	function edit_user_type($id){
		
		$result=$this->User_Model->gettypedetails($id);
		$user_types=$this->User_Model->get_all_types();
		
		/*echo "<pre>";
		print_r($user_types);
		exit;//*/
		$data['result']=$result;
	    $data['types']=$user_types;
	
		$data['inner_view']='edit_type';
		$this->load->view('includes/main_layout',$data);
	
	}
	
	function edit_type_action()
	{
		/*echo "<pre>";
		print_r($this->input->post());
		exit;*/
		$type_id=$this->input->post('type_ID');
		$user_type=$this->input->post('type');
		$type_description=$this->input->post('desc');
		
		$usertype=array('user_type'=>$user_type,
		                'type_description'=>$type_description);
		
		$this->User_Model->updatetype($usertype,$type_id);
		redirect(base_url().'User/user_type');
		
	}
	
	function delete_user_type($id){
		
		$rs=$this->User_Model->deletetype($id);
		$data['inner_view']='vegies_list';
		$this->load->view('includes/main_layout',$data);
		redirect(base_url().'User/user_type');
	}
	
	
}
?>