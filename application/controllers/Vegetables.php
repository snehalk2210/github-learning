<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vegetables extends CI_Controller {
	
	/*function index(){
		echo "This is Index method";
	}
	function getVegies(){
		
		echo "Get all the vegetables";
		
	}
	function getUsers(){
		$this->load->model('Test_model');
		$sql_query=$this->Test_model->get_users();
		echo "<pre>";
		print_r($sql_query);
	}*/
	//function for includes all models and image config files 
	function __construct(){
		parent::__construct();
		$this->load->Model('Veg_Model');
		$config['upload_path']          = './uploads/vegetables/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
	}
	
	//load all css and view on function
	function vegetable(){
		$this->load->view('includes/header');
		//$this->load->view('includes/logo');
		//$this->load->view('includes/welcome_bar');
		$this->load->view('includes/left_menu');
		$this->load->view('includes/mobile_menu_area');
		$this->load->view('includes/preloader');
		$this->load->view('includes/footer');
	}
	
	//add vegetables to show the list of vegetables to customers 
	function add_vegetable(){
		
		$rs=$this->Veg_Model->get_Units();
		//echo "<pre>";
		//print_r($rs);
		//exit;  
		$data['vegunits']=$rs;
		$result=$this->Veg_Model->gettypes();
		$data['vegtypes']=$result;
		
	
		$data['inner_view']='add_vegies';
			$this->load->view('includes/main_layout',$data);
		       
		
		
	}
	
	//give the add action to Vegetables 
	function add_vegetable_action(){
		//echo "<pre>";
		//print_r($this->input->post());
		//print_r($_FILES);
		//exit;//*/
		
		$veg_name=$this->input->post('veg_name');
		$veg_type=$this->input->post('veg_type');
		//echo $veg_type;
		//exit;
		$veg_unit=$this->input->post('veg_unit');
		$veg_rate=$this->input->post('veg_rate');
		//echo $veg_unit;
		//exit;
		$img_config=array();
		$img_config['upload_path'] = 'E:\wamp\www\organic_vegies\uploads\vegetables';
		$img_config['allowed_types'] = 'gif|jpg|png|jpeg';
		$img_config['max_size']     = '100';
		$img_config['max_width'] = '1024';
		$img_config['max_height'] = '768';
		
	    
		$this->upload->initialize($img_config);
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
						//echo $config['upload_path'];
						echo $img_config['upload_path'];
							print_r($error);exit;
                      //  $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

						//print_r($data);exit;
                      //  $this->load->view('upload_success', $data);
                }
        
		$veg_photo=$data['upload_data']['file_name'];
		
		/*$id=$this->Veg_Model->isvalidate($veg_name);
		if($id)
		{
			echo "details matched";
		}
		else
		{
			echo "not matched";
		}*/
		
		$vegies=array('veg_name'=>$veg_name,
		               'veg_type_id'=>$veg_type,
		               'veg_unit_id'=>$veg_unit,
		               'veg_photo'=>$veg_photo,
		               'veg_rate'=>$veg_rate);
		$this->Veg_Model->insertdata($vegies);//
		echo validation_errors();
        redirect(base_url().'Vegetables/add_vegetable');
		
		 
	}
	
	
	
	//to edit the vegetables
	function edit_vegetable($veg_id){
		$result=$this->Veg_Model->get_Vegies_details($veg_id);
		$data['rs']=$result;
		$veg_units=$this->Veg_Model->get_Units();
		$data['result']=$veg_units;
		$veg_type=$this->Veg_Model->gettypes();
		$data['types']=$veg_type;
		$data['inner_view']='edit_vegies';
		
		$this->load->view('includes/main_layout',$data);
	}
	
	//to give the action to edit vegetables
	function edit_vegetable_action()
	{
		/*echo "<pre>";
		print_r($this->input->post());
		print_r($_FILES);
		exit;//*/
		
		$veg_id=$this->input->post('veg_Id');
		$veg_name=$this->input->post('veg_name');
		$veg_type=$this->input->post('veg_type');
		$veg_unit=$this->input->post('veg_unit');
		$veg_photo=$this->input->post('veg_pic');
		
		$veg_rate=$this->input->post('veg_rate');
		
		$img_config=array();
		$img_config['upload_path'] = 'E:\wamp\www\organic_vegies\uploads\vegetables';
		$img_config['allowed_types'] = 'gif|jpg|png|jpeg';
		$img_config['max_size']     = '100';
		$img_config['max_width'] = '1024';
		$img_config['max_height'] = '768';
		
	    
		$this->upload->initialize($img_config);
                if ( ! $this->upload->do_upload('veg_photo'))
                {
                        $error = array('error' => $this->upload->display_errors());
						//echo $config['upload_path'];
						//echo $img_config['upload_path'];
						print_r($error);exit;
                      //  $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

						//print_r($data);exit;
                      //  $this->load->view('upload_success', $data);
                }
              //  print_r($data);exit;
              if($_FILES['veg_photo']['name']!=""){
			  		$photo=$data['upload_data']['file_name'];
			  }
			  elseif($veg_photo!=""){
			  		$photo=$veg_photo;
			  }
			  else{
			  	$photo="";
			  }
		
		$vegdata=array('veg_name'=>$veg_name,
		            'veg_type_id'=>$veg_type,
		            'veg_unit_id'=>$veg_unit,
		            'veg_photo'=>$photo,
		            'veg_rate'=>$veg_rate
		            );         
		$this->Veg_Model->update_vegies($vegdata,$veg_id);
		
		//echo $this->db->last_query();
		redirect(base_url().'Vegetables/list_vegetables');
	}
	
	
	//to delete vegies photo which are added to  customers vegetables list
	function delete_vegie_photo()
	{
		 /*echo "<pre>";
		 print_r($this->input->post($_FILES));
		 exit;*/
	    $veg_id=$this->input->post('id');
        $filename=$this->input->post('filename');
        //$path=$this->input->SERVER['DOCUMENT_ROOT'].'/organic_vegies/uploads/vegetables'.$filename ;
        $path=FCPATH.'uploads/vegetables/'.$filename ;
       
       if(file_exists($path)){
        if(unlink($path))
             {
			  $data=array('veg_photo'=>'');
		      $this->Veg_Model->update_photo_vegie($data,$veg_id);
              echo "1";
             }
		  else 
		     {
			echo "0";
        
             } 
        }
      else{
        echo "0";
         }
	}
	
	//delete vegitables from the vegetables list
	function delete_vegetable($id){
		$result=$this->Veg_Model->deletevegie($id);
		$data['inner_view']='vegies_list';
		$this->load->view('includes/main_layout',$data);
		redirect(base_url().'Vegetables/list_vegetables');
	}
	
	
	//show the list of vegetables to admin information 
	function list_vegetables(){
		
		$rs= $this->Veg_Model->get_Vegies();
		//print_r($rs);
		$data['result']=$rs;
		$data['inner_view']='vegies_list';
		
		/*echo "<pre>";
		print_r($rs);
		exit;//*/
		$this->load->view('includes/main_layout',$data);
	}
	
	function add_vegies_rate()
	{
		$vegie=$this->Veg_Model->get_Vegies();
		$data['rs']=$vegie;
		$unit=$this->Veg_Model->get_units();
        $data['veg_unit']=$unit;
		$data['inner_view']='vegies_rate';
		$this->load->view('includes/main_layout',$data);
	}
	
	
	
	//list of available vegetables this list for customers only 
	function available_vegies(){
		$rs=$this->Veg_Model->get_Vegies();
		$data['result']=$rs;
		$data['inner_view']='available_vegies';
		$this->load->view('includes/main_layout',$data);
	}
	
	
	//list of vegies unit 
	function vegies_unit(){
		
		$rs= $this->Veg_Model->get_units();
		//print_r($rs);
		$data['inner_view']='unit_list';
		$data['result']=$rs;
		$this->load->view('includes/main_layout',$data);
	}
	
	//add vegies unit forms
	function add_vegies_unit(){
		$this->form_validation->set_rules('veg_unit','Vegetable Unit','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run())
		{
			echo "validation successfull";
		}
		else{
			echo validation_errors();
			//$this->load->view('Vegetables/add_unit_action');
		}
		$data['inner_view']='add_unit';
		$this->load->view('includes/main_layout',$data);
	}
	
	//action to vegies unit addition form
	function add_unit_action()
	{
		
		/*echo "<pre>";
		print_r($this->input->post());
		print_r($_POST);
		exit;//*/
		
		$vegies_unit=$this->input->post('veg_unit');
		$vegies_unit_qty=$this->input->post('veg_unit_qty');
		
		/*$id=$this->Veg_Model->isvalidateunit($vegies_unit);
		if($id)
		{
			echo "details matched";
		}
		else
		{
			echo "not matched";
		}*/
		
		$veg_unit=array('vunit_unit'=>$vegies_unit,
		                'vunit_qty'=>$vegies_unit_qty);
		
		$this->Veg_Model->insertunit($veg_unit);
		//echo $this->db->last_query(); 
		redirect(base_url().'Vegetables/vegies_unit');
	}
	
	//to fetch data to edit
	function edit_vegies_unit($id){
		$result=$this->Veg_Model->getunitdetails($id);
		$data['result']=$result;
		$data['inner_view']='edit_unit';
		$this->load->view('includes/main_layout',$data);
	}
	
	
	//give action to edit informaiton of vegis unit
	function edit_unit_action()
	{
		/*echo"<pre>";
		print_r($this->input->post());
		exit;*/
		$unit_id=$this->input->post('unit_ID');
		$veg_unit=$this->input->post('veg_unit');
		$qty=$this->input->post('veg_unit_qty');
		
		$units=array('vunit_unit'=>$veg_unit,
		            'vunit_qty'=>$qty);
		
		$this->Veg_Model->updateunit($units,$unit_id);
		
		redirect(base_url().'Vegetables/vegies_unit');
		
	}
	
	//delete vegies unit from the unit list
	function delete_vegies_unit($id){
		$result=$this->Veg_Model->deleteunit($id);
		$data['inner_view']='vegies_list';
		$this->load->view('includes/main_layout',$data);
		redirect(base_url().'Vegetables/vegies_unit');
	}
	
	//add vegies type form
	function add_veg_type()
	{
		$data['inner_view']='add_vegies_type';
		$this->load->view('includes/main_layout',$data);
	}
	
	//give the action to veg type form
	function add_veg_type_action()
	{
		/*$this->form_validation->set_rules('type','Vegetables Type','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if($this->form_validation->run())
		{
			echo "validation successfull";
		}
		else{
			//echo validation_errors();
			//$this->load->view('Vegetables/add_veg_type_action');
			redirect(base_url().'Vegetables/add_veg_type');
		}*/
		
		$vegies_type=$this->input->post('type');
		$type=array(
		            'veg_type'=>$vegies_type);
		$this->Veg_Model->inserttype($type);
		//echo $this->db->last_query(); 
		redirect(base_url().'Vegetables/add_veg_type');
	}
	
	//list of vegies type 
	function vegies_type_list(){
		
		$rs= $this->Veg_Model->gettypes();
		//print_r($rs);
		$data['inner_view']='type_list';
		$data['result']=$rs;
		$this->load->view('includes/main_layout',$data);
	}
	
	//delete vegies type from list
	function delete_type($id)
	{
		$result=$this->Veg_Model->deletetype($id);
		$data['inner_view']='type_list';
		$this->load->view('includes/main_layout',$data);
		redirect(base_url().'Vegetables/vegies_type_list');
	}
	
	//add delivery dates form for vegetables delivery
	function add_delivery_dates()
	{
		$data['inner_view']='add_delivery_dates';
		$this->load->view('includes/main_layout',$data);
	}
	
	//give action to delivery dates form
	function add_dates_action()
	{
		$delivery_date=$this->input->post();
	    $this->Veg_Model->insertdelivery_date($delivery_date);
		redirect(base_url().'Vegetables/add_delivery_dates');
		
	}
	
	//add vegies form of supplier vegies
	function add_vegies_from_sup()
	{
		$result=$this->Veg_Model->get_Vegies();
		$data['rs']=$result;
		$rs=$this->Veg_Model->gettypes();
		$data['types']=$rs;
		$data['inner_view']='add_supplier_vegies';
		$this->load->view('includes/main_layout',$data);
	}
	
	//action of addition to vegis supplier form 
	function add_sup_vegies_action()
	{
		/*echo"<pre>";
		print_r($this->input->post());
		exit;*/
		$name=$this->input->post('veg_name');
		$type=$this->input->post('veg_type');
		//$photo=$this->input->post('veg_photo');
		$img_config=array();
		$img_config['upload_path'] = 'E:\wamp\www\organic_vegies\uploads\sup_vegies';
		$img_config['allowed_types'] = 'gif|jpg|png|jpeg';
		$img_config['max_size']     = '100';
		$img_config['max_width'] = '1024';
		$img_config['max_height'] = '768';
		
	    
		$this->upload->initialize($img_config);
                if ( ! $this->upload->do_upload('veg_photo'))
                {
                        $error = array('error' => $this->upload->display_errors());
						//echo $config['upload_path'];
						echo $img_config['upload_path'];
							print_r($error);exit;
                      //  $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

						//print_r($data);exit;
                      //  $this->load->view('upload_success', $data);
                }
        
		$photo=$data['upload_data']['file_name'];
		$sup_vegies=array('vs_veg_id'=>$name,
		               'vs_veg_type'=>$type,
		               'vs_veg_photo'=>$photo,);
		$this->Veg_Model->insertsup_vegiesdata($sup_vegies);//*/
		 redirect(base_url().'Vegetables/add_vegies_from_sup'); 
	
	}
	
	//form of add vegies rate of supplier  
	function vegies_sup_rate()
	{
		$vegie=$this->Veg_Model->get_Vegies();
		$data['rs']=$vegie;
		$unit=$this->Veg_Model->get_units();
		$data['veg_unit']=$unit;
		$data['inner_view']='add_sup_vegies_rate';
		$this->load->view('includes/main_layout',$data);
	}
	
	//give action to form of supplier vegies rate 
	function add_sup_rate_action()
	{
		
		$veg_id=$this->input->post('veg_id');
		$veg_rate=$this->input->post('veg_rate');
		$veg_unit=$this->input->post('veg_unit');
		$veg_data=array(
		                'sup_veg_id'=>$veg_id,
		                'veg_unit'=>$veg_unit,
		                'sup_rate_per_unit'=>$veg_rate);
		
		$this->Veg_Model->insert_sup_vegies_rate($veg_data);
		redirect(base_url().'Vegetables/vegies_sup_rate');
	}
	
	//list of vegies available from supplier
	function vegies_available_supllier()
	{
		$result=$this->Veg_Model->get_vegies_from_sup_list();
		$data['rs']=$result;
		$data['inner_view']='suplier_vegies_list';
		$this->load->view('includes/main_layout',$data);
	}
	

	function available_date()
	{
		$data['inner_view']='available_date';
		$this->load->view('includes/main_layout',$data);
	}
	 /*$planmonths=$_POST['planmonths'];
	//echo "Start date is ".$_POST['plan_start_date']."<br/>";
	$start_date=date('Y-m-d',strtotime($_POST['plan_start_date']));
	//echo $start_date;
	$enddate=strtotime('+'.$planmonths.' months',strtotime($start_date));
	$enddate = date('Y-m-d',$enddate); */
	function add_av_dates_action()
	{
		$av_date=$this->input->post('av_date');
		//$av_end_date=$this->input->post('end_date');
		//$start_date=date('Y-m-d',srttotime($av_date));
		//echo $start_date;
		//exit;
		$date=date($av_date);
        $next_date= date('Y-m-d', strtotime($date. ' + 4 days'));
        //print_r($next_date);
        //exit;


		$dates=array('av_date'=>$av_date,
		             'av_end_date'=>$next_date);
	    $this->Veg_Model->insertav_date($dates);
		redirect(base_url().'Vegetables/available_date');
	}
	
	
	
	//available dates form
	function add_available_vegies_on_date()
	{
		$date=$this->Veg_Model->getAvailableDates();
		$data['date']=$date;
		$result=$this->Veg_Model->get_Vegies();
		$data['rs']=$result;
		$data['inner_view']='add_available_vegies_on_dates';
		$this->load->view('includes/main_layout',$data);
	}
	
	
	//give action to available dates form
	function add_av_vegies_dates_action()
	{
		/*echo "<pre>";
		print_r($this->input->post());
		exit;*/
		$av_date=$this->input->post('av_date');
		$vegies=$this->input->post('vegies');
		$date=date($av_date);
        $added_datentime= date('Y-m-d H:m:s', strtotime($date. ' + 5 days'));
        
        //print_r($added_datentime);
        //exit;
		foreach($vegies as $key=>$value){
		      
			   $data=array('av_date'=>$av_date,
			               'av_vegi_id'=>$value,
			               'av_added_dnt'=>$added_datentime,
			               'av_status'=>1);
		    $this->Veg_Model->insertav_vegies_on_date($data);
		}
		
		/*echo"<pre>";
		print_r($data);
		exit;*/
		
		   
		/*echo"<pre>";
		print_r($available_date);
		exit;*/
	    
		redirect(base_url().'Vegetables/add_available_vegies_on_date');
		
	}
}
?>