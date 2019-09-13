<form method ="post" action="<?php echo base_url().'Orders/sup_comfirmation_action'?>"><div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Your Order <span class="table-project-n"></span></h1>
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
                                                
                                                <th data-field="id">Vegetables Name</th>
                                                <th data-field="name" data-editable="true">Vegetables Rate</th>
                                                
                                                <th data-field="price" data-editable="true">Vegetables Quantity</th>
                                                <th data-field="action">Total</th>
                                            </tr>
                                        </thead>
                                        	
                                        <tbody>
                                        <?php
                                            for($i=0;$i<count($orders1);$i++)
                                            {
                                            	?>
                                            <tr>
                                                
                                            <td><?php echo $orders1[$i]['vegetable_name']?></td>
                                            <td><?php echo $orders1[$i]['Vegetable_Rate']?></td>
                                            <td><?php echo $orders1[$i]['vegetable_quantity']?></td>
                                            <td><?php echo $orders1[$i]['total']?></td>
                                              
                                            </tr>
                                            <?php 
                                            }
                                        ?>
                                        
                                        <tr>
                                        	<td colspan="3" align="right">Total</td>
                                                <td><?php echo $total;?></td>
                                        </tr>
                                      </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-btn-inner">
                                                       <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="login-horizental">
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="confirm" id="confirm">Confirm</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
	<br>
	
</form> 