<form action="<?php echo base_url().'Orders/add_suplier_action';?>" method="post" name="frm" id="frm">

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
<div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            
<div class="form-group-inner">


<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <label class="login2 pull-right pull-right-pro">Select Date</label>
    </div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
  <div class="form-select-list">
    <select class="form-control custom-select-value" name="selected_date" id="selected_date">
																			<option>Select Date</option>
			<?php for($dt=0;$dt<count($dateresult);$dt++){?>				<option value="<?php echo $dateresult[$dt]['av_date']?>"><?php echo $dateresult[$dt]['av_date']?></option>
																			<?php }?>
																		</select>
                                                    </div>
                                                     </div>
                                                     </div>
                                                     
<div id="available_vegiess">
	<div class="data-table-area mg-b-15">
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
                                    
                                    <table id="veg_table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
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
                                        <?php for($i=0;$i<count($vegee);$i++) {?>
                                        <tr id="veg_<?php echo $vegee[$i]['veg_id'];?>">
                                            <td><input type="checkbox" name="veges[<?php echo $vegee[$i]['veg_id'];?>]"></td>
                                                <td><?php echo $vegee[$i]['veg_name'];?></td>
                                                <td><?php echo $vegee[$i]['vunit_unit'];?></td>
                                                
                                                <td><input type="hidden" name="sup_rate_per_unit_<?php echo $vegee[$i]['veg_id'];?>" id="sup_rate_per_unit_<?php echo $vegee[$i]['veg_id'];?>" value="<?php echo $vegee[$i]['sup_rate_per_unit'];?>"><?php echo $vegee[$i]['sup_rate_per_unit'];?></td>                
                                            <td><input type="text" name="veg_qty_<?php echo $vegee[$i]['veg_id'];?>" id="veg_qty_<?php echo $vegee[$i]['veg_id'];?>"></td>
                                                
                                            </tr>
                                           <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	 
	
</div>

 <div class="form-group-inner">
                                                        
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro"></label>
                                                            </div>
                                                            
                                                        </div>
                                               
                                                      </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                   
                                                    
                                                                    
                                                                

                                                   


 
 <div class="form-group-inner" >
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele" >
                                                                        
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit" > Place Order</button>
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
		$('#selected_date').change(function(){
			var selected_date=this.value;
			$.ajax({
				
				url:'<?php echo base_url()."Orders/getdate"?>',
 				type :'POST',
 				data:{'dataS':selected_date},
 				success:function(data1){
					//alert(data1);
					var vegData=JSON.parse(data1);
					for(var i in vegData){
						var veg_id=vegData[i].od_veg_id;
						var qty = vegData[i].total_veg_qty;
						//alert(qty);
							$("#veg_qty_"+veg_id).val(qty);
						
					}
					}

			});
		});
	});
</script>