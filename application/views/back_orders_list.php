<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Order List for Supplier<span class="table-project-n"></span></h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                
                                                <th data-field="id">ID</th>
                                                <th data-field="name" data-editable="true">Order Date</th>
                                                <th data-field="email" data-editable="true">Order Amount</th>
                                               <th data-field="action">Action</th>
                                               <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i=0;$i<count($result);$i++){?>
                                            <tr>
                                               
                                                <td><?php echo $result[$i]['bo_id'];?></td>
                                                <td><?php echo $result[$i]['bo_added_on'];?></td>
                                                <td>Rs.<?php echo $result[$i]['bo_amount'];?></td>
                                                <td><div class="modal-area-button">
                                           
                                <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalftblack" id="ordDetails" onclick="get_backOrderDetails('<?php echo $result[$i]['bo_id']?>')">Details</a>
                                
                                             </div></td>
                                             <td><a href="<?php echo base_url().'Orders/deleteback_order/'.$result[$i]['bo_id']?>">Delete</a></td>
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
        
        
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        
                        <div id="PrimaryModalftblack" class="modal modal-edu-general default-popup-PrimaryModal  fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2> Back Order Details</h2>
                                        
                                         <table border="1">
										<thead>
											<tr>
												<td>Sr No.</td>
												<td>Vegetable Name</td>
												<td>Rate</td>
												<td>Quantity</td>
												
												<td >Total</td>
						
											</tr>
										</thead>
										
										<tbody id="backordvegDetails">
											
					                        <tr >
					                        	<td>Total Order Amount </td>                                         
					                        </tr>
										</tbody>
										
										</table>
                                    </div>
                                    <div class="modal-footer footer-modal-admin">
                                        <a data-dismiss="modal" href="#">Cancel</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                
<script>
	function get_backOrderDetails(backord_id){
		
		$.ajax({
 				url:'<?php echo base_url()."Orders/get_backorddetails"?>',
 				type :'POST',
 				data:{'bo_id':backord_id},
 				success:function(data1){
						//alert(data1);
						//var details=JSON.parse(data1);
						var details=JSON.parse(data1);
						/*$.each( details, function( key, value ) {
  alert( key + ": " + value );
});				
				}*/var ht='';
					var cnt=1;
					var total=0;
				 for(var i in details){
				//alert(details[i].veg_name);
				ht= ht+'<tr><td>'+cnt+'</td><td>'+details[i].veg_name+'</td><td>'+details[i].bod_rate+'</td><td>'+details[i].bod_veg_qty+'</td><td>'+details[i].bod_amount+'</td></tr>';
					total = total+parseInt(details[i].bod_amount);	
				cnt++;
				}
				ht= ht+'<tr><td colspan="4">Total</td><td>'+total+'</td></tr>';
				$("#backordvegDetails").html(ht);
				}
 			
 		});
	}
</script> 