<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Delivery Persons<span class="table-project-n"></span></h1>
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
                                                <th data-field="name" data-editable="true"> Person Name</th>
                                                
                                                <th data-field="email" data-editable="true">Email </th>
                                                <th data-field="price" data-editable="true">Phone No.</th>
                                                <th data-field="action">Action</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        	
                                        <tbody>
                                        <?php 
                                        for($i=0;$i<count($divp);$i++)
                                        {
										?>
                                            <tr>
                                                
                                            <td><?php echo $divp[$i]['user_id'];?></td>
                                            <td><?php echo $divp[$i]['user_name'];?></td>
                                            <td><?php echo $divp[$i]['email'];?></td>
                                            <td><?php echo $divp[$i]['contact'];?></td>
                                            
                                            <td>
                                            
                                            <div class="modal-area-button">
                                           
                                <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalftblack" id="ordDetails" onclick="D_person_details('<?php echo $divp[$i]['user_id']?>')" >Details</a>
                               
                                             </div>
                                                </td>
                                            
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
        
  
                     
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                       <form name="frm" id="frm" method="post" action="<?php echo base_url().'User/addD_details_action'?>" enctype="multipart/form-data"> 
                       <input type="hidden" id="user_Id" name="user_Id">
                        <div id="PrimaryModalftblack" class="modal modal-edu-general default-popup-PrimaryModal  fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2> Person Details</h2>
                                        
                                        
                                        <table id="record">
                                        	<tr>
                                        		<td>Person Name</td>
                                        		
                                        		<td><input type="text" name="person_name" id="person_name" class="form-control" /></td>
                                        		
                                        	</tr>
                                        	<tr>
                                        		<td>Person Photo</td>
                                        		<td><input type="file" name="person_photo" id="person_photo" class="form-control" /></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Join Date</td>
                                        		<td><input type="date" name="join_date" id="join_date" class="form-control" /></td>
                                        	</tr>
                                        	<tr>
                                        		<td>License No.</td>
                                        		<td><input type="text" name="license_no" id="license_no" class="form-control" /></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Vehical No.</td>
                                        		<td><input type="text" name="vehical_no" id="vehical_no" class="form-control" /></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Vehical Type</td>
                                        		<td><select type="text" name="v_type" id="v_type" class="form-control" >
                                                                	<option value="">--select your vehical type--</option>
    <option value="1">With gear</option>
    <option value="2">Without gear</option>
                                                    </select></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Vehical Photo</td>
                                        		<td><input type="file" name="v_photo" id="v_photo" class="form-control" /></td>
                                        	</tr>
                                        	<tr>
                                        		<td>Vehical Capacity</td>
                                        		<td><input type="text" name="v_capacity" id="v_capacity" class="form-control" /></td>
                                        	</tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer footer-modal-admin">
                                        <!--<a data-dismiss="modal" href="#">Submit</a>-->
                                        <input type="submit" name="sbtDetails" id="sbtDetails" value="Update"/>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        </form>
                    </div>
                
               
                
                
                
                
                
                
<script>

        function D_person_details(usr_id)
        {
        	$("#user_Id").val(usr_id);
			$.ajax({
 				url:'<?php echo base_url()."User/d_person_details"?>',
 				type :'POST',
 				data:{'user_id':usr_id},
 				success:function(data1){
 					//alert(data1);
 					var details=JSON.parse(data1);
 					
                            alert(details);
 					if(data1!=0){
						//alert("not blank");
						
						$("#person_name").val(details.dlp_user_name);
						$("#join_date").val(details.dlp_join_date);
						$("#license_no").val(details.dlp_license_no);
						$("#vehical_no").val(details.dlp_vehical_no);
						$("#v_type").val(details.dlp_vehical_type);
						$("#v_capacity").val(details.dlp_vehical_capacity);
						
					}
				
					
					
 				 }
 				});
		}
</script>  