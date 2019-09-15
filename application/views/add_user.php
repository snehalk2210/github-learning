<?php include('includes/header2.php');?>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/js/bootstrap.min.js'?>">
</head>
 
 
 <div class="container" style="margin-top:20px;">
<h1>User Login</h1>

<?php if($error=$this->session->flashdata('Login_failed')):?>

<div class="row">
<div class="col-lg-6">
<div class="alert alert-danger">
<?php echo $error;?>
	
</div>
	
</div>
	
</div>

<?php endif; ?>


<!--<form action="base_url('admin/index')">-->
<?php echo form_open('User/user_login');?>
    <div class="row">
    <div class="col-lg-6" >
    <div class="form-group">
    	<label for="Username">Username</label>
    	
    	<!--<input type="text" class="form-control" id="usr_name" placeholder="Enter Username" name="usr_name" value="set_value">-->
    	
    	<?php 
    	$data=array('class'=>'form-control','placeholder'=>'Enter Username','name'=>'usr_name','id'=>'usr_name','value'=>set_value("usr_name"));
    	echo form_input($data);?>
    	
    </div>
    </div>
    <div class="col-lg-6" style="margin-top:20px;">
        <?php echo form_error('usr_name');?>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
    	<label for="pwd">Password</label>
    	
    	<input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd" >
    	<!--<?php 
    	$pass=array('class'=>'form-control','id'=>'pwd','name'=>'pwd','placeholder'=>'Enter Password','value'=>set_value("pwd"));
    	echo form_input($pass);?>-->
    </div>
    </div >
    <div class="col-lg-6" style="margin-top:20px;">
    	<?php echo form_error('pwd');?>
    </div>
        
    </div>
    
     <button type="submit" class="btn btn-default">Submit</button>
	 <button type="reset" class="btn btn-default">Reset</button>
	 <!--<?php $submit=array('type'=>'submit',
	               'class'=>'btn btn-default',
	               'value'=>'submit');?>
	 <?php echo form_submit($submit);?>-->
	 <a href="register/" class="link-class">Sign up?</a>
	 
</div>