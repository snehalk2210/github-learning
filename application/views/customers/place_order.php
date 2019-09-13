<form action="<?php echo base_url().'Customers/add_order_action';?>" method="post" name="frm" id="frm">
<!--<form name="frmAddOrder" id="frmAddOrder" action="<??>">-->
<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
<div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                               
<div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">User Name</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                             <div class="form-select-list">
                                                                <input type="text" name="usr_name" id="usr_name" class="form-control" placeholder="Enter Your Name" />
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                     
                                                     <br>
                                                     </div>
<div class="form-group-inner">


<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <label class="login2 pull-right pull-right-pro">Select Date</label>
    </div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
  <div class="form-select-list">
    <select class="form-control custom-select-value" name="sel_date" id="sel_date">
																			<option>Select Date</option>
			<?php for($dt=0;$dt<count($date_result);$dt++){?>				<option value="<?php echo $date_result[$dt]['av_date']?>"><?php echo $date_result[$dt]['av_date']?></option>
																			<?php }?>
																		</select>
                                                    </div>
                                                     </div>
                                                     </div>
                                                     
<div id="available_vegiess">
	
	 
	
</div>

 <div class="form-group-inner">
                                                        
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro"></label>
                                                            </div>
                                                            
                                                        </div>
                                               
                                                      </div>
                                                    </div>
                                                    
                                                    
                                                    
                   <div name="list" id="list">
                   	
                   	
                   	
                   </div>                                 
                                                    
                                                                    
                                                                

                                                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-group custom-go-button">
 
   <!-- <hr>  
                                                                    <span class="input-group-btn"><button type="button" class="btn btn-primary">Go!</button></span>-->
                                                                </div>
                                                            </div>

<!--<div class="form-group-inner">
<div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro" >Total Amount</label>
                                                            </div>

                                                                
<div class="row">

     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                        <div class="form-select-list basic-ele-mg-t-10">
                                                                            <input type="text" class="form-control" placeholder=".col-md-6" name="total_amt" id="total_amt">
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                    </div>-->
 
 <div class="form-group-inner" >
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele" >
                                                                        
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit" >Add Order</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                                   
                                                                    
                                                       
                                                             
                                                        </div>
                                                    </div>
                                               

 </div>
 </div>
 </form> 
 <script>
 	$(document).ready(function(){
 		//alert('Hiii');
 		
 		$('#sel_date').change(function(){
 			//alert(this.value);
 			var sel_date=this.value;
 			$.ajax({
 				url:'<?php echo base_url()."Orders/getAvvegies"?>',
 				type :'POST',
 				data:{'dataS':sel_date},
 				success:function(data1){
					$("#available_vegiess").html(data1);
					//alert(data1);
				}
 			})
 		});
 	});
 </script>