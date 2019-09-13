<?php
/*echo "<pre>"; 
print_r($result);
print_r($rs);
print_r($types);
exit;*/
?>
<div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row"> 
 
<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="sparkline9-list responsive-mg-b-30">
                            <div class="sparkline9-hd">
                                <div class="main-sparkline9-hd">
                                    <h1>Vegitables</h1>
                                </div>
                            </div>
                            <div class="sparkline9-graph">
                                <div class="basic-login-form-ad">
                                    
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner">
                                               
                                                
                                                <form name="frm" id="frm" method="post" action="<?php echo base_url().'Vegetables/edit_vegetable_action'?>" enctype="multipart/form-data">
                                                
                                                <input type="hidden" name="veg_Id" id="veg_Id" value="<?php echo $rs['veg_id']; ?>"/>
                                                <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Vegitable Name</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="text" name="veg_name"  id="veg_name" class="form-control" placeholder="Enter vegitable name" value="<?php echo $rs['veg_name'];?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Vegitable Type</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="form-select-list">
                                                                    <select class="form-control custom-select-value" name="veg_type" id="veg_type">
																			
			<option value="">--select Vegie Type--</option>
			
				<?php 
             for($i=0;$i<count($types);$i++){
             	
             	$selected="";
             	
             	if($types[$i]['type_id']==$rs['veg_type_id'])
             	{
					$selected="selected='selected'";
					}
             	?>
		     	<option value="<?php echo $types[$i]['type_id']?>"<?php echo $selected?>><?php echo $types[$i]['veg_type'];?></option>
																			<?php }?>														</select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Vegitable Unit</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="form-select-list">
               
                                                                
                                                                    <select class="form-control custom-select-value" name="veg_unit" id="veg_unit">
																			
                                                                
        <option value="">--Select Unit--</option>
        <?php 
             for($i=0;$i<count($result);$i++){
             	
             	$selected="";
             	
             	if($result[$i]['vunit_id']==$rs['veg_unit_id'])
             	{
					$selected="selected='selected'";
					}
             	?>
		     	<option value="<?php echo $result[$i]['vunit_id'];?>"<?php echo $selected?>><?php echo $result[$i]['vunit_unit'];?></option>
																			<?php }?>
																			
																		</select>
																		
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Add Vegitable Photo</label>
                                                            </div>
                                                             <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="file-upload-inner ts-forms">
                                                                    <div class="input prepend-small-btn">
                                                                        <div class="file-button">
                                                                            Browse
                                                                            <input type="file" name="veg_photo" id="veg_photo" onchange="document.getElementById('prepend-small-btn').value = this.value;">
                                                                        </div>
 <?php 
   
   if(file_exists(FCPATH.'uploads/vegetables/'.$rs['veg_photo']))
   {
   	     $photo_name=$rs['veg_photo'];
    }
   else
   {
   	   $photo_name="";
   }
   ?>
         <input type="text" name="veg_pic" id="veg_pic" placeholder="no file selected" value="<?php echo $photo_name;?>">
  
  
   
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Vegitable Rate</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="text" name="veg_rate"  id="veg_rate" class="form-control" value="<?php echo $rs['veg_rate']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                       <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="login-horizental">
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" name="submit" id="submit" type="submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php 
                    if($rs['veg_photo']!=""){
						
					
                    if(file_exists(FCPATH.'uploads/vegetables/'.$rs['veg_photo'])){?>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    	<div class="sparkline9-list responsive-mg-b-30">                     
                    	
                    	<div class="sparkline9-graph">
                    	<div>
                    	
                    	    <img src="<?php echo base_url().'uploads/vegetables/'.$rs['veg_photo'];?>">	
                    	    
                    	    
                    	</div>
                    	<a href="#" onclick="delete_photo('<?php echo $rs['veg_id'];?>')">Delete</a>
                    	</div>
                    	
                    	
                    	</div>
                    </div>
                   <?php } }?> 
                    
                </div>
              </div>
             </div>
             
             
<script>

        function delete_photo(veg_Id)
        {
        	//alert("hello");
        	
			var veg_filename=$("#veg_pic").val();
			//alert(veg_filename);
			$.ajax({
				
			    
			    url:'<?php echo base_url()."Vegetables/delete_vegie_photo"?>',
			    type:'POST',
			    data:{id:veg_Id,
			          filename:veg_filename},
			    success:function(data1){  
			         //alert(data1);
			         if(data1==1){
					 	alert("File deleted successfully");
					 	location.reload();
					 }
					 else{
					 	alert("Sorry can not delete file");
					 }
			    }   
				
				 
			});//*/
		}
</script>