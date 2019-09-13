
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
                                               
                                                
                                                <form name="frm" id="frm" method="post" action="<?php echo base_url().'Vegetables/add_sup_vegies_action'?>" enctype="multipart/form-data">
                                                <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Vegitable Name</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    
                                           
                                                                <select type="text" name="veg_name"  id="veg_name" class="form-control">
                        <option value="">--select vegname--</option>
                        <?php for($i=0;$i<count($rs);$i++){?>
                        <option value="<?php echo $rs[$i]['veg_id'];?>" ><?php echo $rs[$i]['veg_name']?></option>
                        	<?php }?>
                        </select>
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
																			<option value="">--Select type--</option>
																			<?php for($i=0;$i<count($types);$i++){?>
																			<option value="<?php echo $types[$i]['type_id']?>"><?php echo $types[$i]['veg_type']?></option>
																			
																			
				<?php }?>														</select>
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
        <input type="file" name="veg_photo" id="veg_photo">
                                                                        
                                                                       	                                                                 </div>
                                                                </div>
                                                            </div>
                                                        
                                                    
                                                    <div class="login-btn-inner">
                                                       <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="login-horizental">
                                                                    <button class="btn btn-sm btn-success login-submit-cs" name="submit" id="submit" type="submit">Submit</button>
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
              </div>
             </div>
          