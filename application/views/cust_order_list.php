<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Customers Orders <span class="table-project-n"></span></h1>
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
                                                <th data-field="name" data-editable="true"> Customer Name</th>
                                                
                                                <th data-field="price" data-editable="true">Price </th>
                                                <th data-field="action">Action</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        	
                                        <tbody>
                                        <?php 
                                        for($i=0;$i<count($result);$i++)
                                        {
										?>
                                            <tr>
                                                
                                            <td><?php echo $i+1;?></td>
                                            <td><?php echo $result[$i]['user_name'];?></td>
                                            <td>Rs.<?php echo $result[$i]['order_amount'];?></td>
                                            
                                            <td>
                                            <div class="modal-area-button">
                                           
                                <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalftblack" id="ordDetails" onclick="getOrderDetails('<?php echo $result[$i]['order_id']?>')">Details</a>
                                
                                             </div>
                                                </td>
                                            <td><a href="<?php echo base_url().'Orders/deletecust_order/'.$result[$i]['order_id']?>">Delete</a></td>    
                                            </tr>
                                            <?php 
                                            }
                                        ?>
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
                                        <h2>Order Details</h2>
                                        
                                         <table border="1">
										<thead>
											<tr>
												<td>Sr No.</td>
												<td>Vegetable Name</td>
												<td>Rate</td>
												<td>Quantity</td>
												
												<td>Total</td>
						
											</tr>
										</thead>
										
										<tbody id="vegDetails">
											
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
	function getOrderDetails(ord_id){
		
		$.ajax({
 				url:'<?php echo base_url()."Orders/getOrderDetails"?>',
 				type :'POST',
 				data:{'order_id':ord_id},
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
				ht= ht+'<tr><td>'+cnt+'</td><td>'+details[i].veg_name+'</td><td>'+details[i].od_veg_unit_prize+'</td><td>'+details[i].od_veg_qty+'</td><td>'+details[i].od_total_prize+'</td></tr>';
					total = total+parseInt(details[i].od_total_prize);	
				cnt++;
				}
				ht= ht+'<tr><td colspan="4">Total</td><td>'+total+'</td></tr>';
				$("#vegDetails").html(ht);
				}
 			
 		});
	}
</script>   