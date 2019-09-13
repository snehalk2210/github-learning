<form action="<?php echo base_url().'Customers/add_order_action';?>" method="post" name="frm" id="frm">
  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="#">
                                                    
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Select Date</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="form-select-list">
                                                                    <select class="form-control custom-select-value" name="date" id="date">
																			<option value="">--Select Date--</option>
																			<?php for($i=0;$i<count($dates);$i++){?>
																			<option value="<?php echo $dates[$i]['av_date']?>"><?php echo $dates[$i]['av_date'];?></option>
			
			<?php }?>															</select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
<div id="available_vegies">
	
</div>
                                                    
                                                  
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
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
<script>
 	$(document).ready(function(){
 		//alert('Hiii');
 		
 		$('#date').change(function(){
 			//alert(this.value);
 			var sel_date=this.value;
 			$.ajax({
 				url:'<?php echo base_url()."Customers/get_Avvegies"?>',
 				type :'POST',
 				data:{'dataS':sel_date},
 				success:function(data1){
					$("#available_vegies").html(data1);
					//alert(data1);
				}
 			})
 		});
 	});
 </script>