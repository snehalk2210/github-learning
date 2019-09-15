    <?php include('includes/header2.php');?>
  <html>
  	<head>
  		<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/js/bootstrap.min.js'?>">
  	</head>
  
<div class="container-fluid" style="margin-top:30px;margin-left:50px;">

  <h5>User Details</h5>
   <?php echo form_open('Customers/register');?>
   
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Username</lable>
   		<input type="text" name="usr_name" id="usr_name" class="form-control" placeholder="Enter Your Username"/>
   	</div>
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('usr_name');?>
   		
   	</div>
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Password</lable>
   		<input type="password" name="pwd" id="pwd" class="form-control" placeholder="Enter Your Password"/>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('pwd');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Firstname</lable>
   		<input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Your Firstname"/>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('first_name');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Lastname</lable>
   		<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Your Lastname"/>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('last_name');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>User Type</lable>
   		<select type="text" name="usr_type" id="usr_type" class="form-control" >
   			<option value="">--Select your user type</option>
				<?php 
				for($i=0;$i<count($type);$i++){?>								<option value="<?php echo $type[$i]['user_type_id'];?>"><?php echo $type[$i]['user_type'];?></option>
																			
				<?php }?>														</select>
   		</select>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('usr_type');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Contact No.</lable>
   		<input type="text" name="contact" id="contact" class="form-control" placeholder="+91-88-888-88-888"/>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('contact');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Gender-</lable>
   		<input type="radio" name="gender" id="gender" value="male"/> Male <input type="radio" name="gender" id="gender" value="female"/> Female
   	</div>
   		
   	</div>
   	<div class="col-lg-6" >
   	<?php echo form_error('gender');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Address</lable>
   		<textarea name="address" id="address" class="form-control" ></textarea>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('address');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Country</lable>
   		<select type="text" name="country" id="country" class="form-control">
   			<option>--select your country--</option>
   			<option>India</option>
   			<option>Australia</option>
   		</select>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('country');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>State</lable>
   		<select type="text" name="state" id="state" class="form-control">
   			<option>--select your state--</option>
   			<option>Maharashtra</option>
   			<option>Karnataka</option>
   		</select>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('state');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>City</lable>
   		<select type="text" name="city" id="city" class="form-control">
   			<option>--select your City--</option>
   			<option>kolhapur</option>
   			<option>Belgaum</option>
   		</select>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('city');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Zip Code</lable>
   		<input type="text" name="zip_code" id="zip_code" class="form-control" placeholder="Enter Your Zip-code"/>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('zip_code');?>
   		
   	</div>	
   	</div>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="form-group">
   	<lable>Detailed Address</lable>
   		<textarea name="dadd" id="dadd" class="form-control" placeholder="Enter Your Detailed Address Here"></textarea>
   	</div>
   		
   	</div>
   	<div class="col-lg-6" style="margin-top:30px">
   	<?php echo form_error('dadd');?>
   		
   	</div>	
   	</div>
   	 <button type="submit" class="btn btn-primary">Submit</button>
  
</div>
	<!--<?php echo validation_errors();?>-->
    

     </html>         