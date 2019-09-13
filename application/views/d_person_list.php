<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Delivery Persons <span class="table-project-n"></span></h1>
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
                                                <th data-field="name" data-editable="true">Person Name</th>
                                                <th data-field="email" data-editable="true">Email</th>
                                                <th data-field="phone" data-editable="true">Phone</th>
                                                 <th  data-editable="true"></th>
                                                
                                                
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
                                                <td><?php echo $divp[$i]['contact'];?></td><!--<a href="#" id="d_details" onclick="D_person_details('<?php echo $divp[$i]['user_id'];?>')">Details</a>-->
                                                <td>
                                                
                                <a onclick="D_person_details('<?php echo $divp[$i]['user_id']?>')">Details</a>
                                
                                             </td>
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
        
        
        

                    
                    
                    
                    
                  