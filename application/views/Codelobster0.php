<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Vegetable Unit<span class="table-project-n"></span></h1>
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
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">Sr No.</th>
                                                <th data-field="name" data-editable="true">Vegetable Unit </th>
                                                <th data-field="email" data-editable="true">Unit Per Quantity </th>
                                                <th data-field="email" data-editable="true"> Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i=0;$i<count($result);$i++){ ?>
                                            <tr>
                                                <td></td>
                                                
                                                <td><?php echo $i+1;?></td>
                                                <td><?php echo $result[$i]['vunit_unit'];?></td>
                                                <td><?php echo $result[$i]['vunit_qty'] ;?></td>
                                                <td><a href="<?php echo base_url().'Vegetables/edit_vegies_unit/'.$result[$i]['vunit_id'];?>">Edit</a></td>
                                                <td><a href="<?php echo base_url().'Vegetables/delete_vegies_unit/'.$result[$i]['vunit_id'];?>">Delete</a></td>
                                            </tr>
                                        <?php } ?>
                                            
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>