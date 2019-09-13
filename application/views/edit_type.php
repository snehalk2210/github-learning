<div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row"> 
 
<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="sparkline9-list responsive-mg-b-30">
                            <div class="sparkline9-hd">
                                <div class="main-sparkline9-hd">
                                    <h1>User Type Details</h1>
                                </div>
                            </div>
                            <div class="sparkline9-graph">
                                <div class="basic-login-form-ad">
                                    
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner">
                                               
                                                
                                                <form method="post" action="<?php echo base_url().'User/edit_type_action'?>">
                                                <input type="hidden" name="type_ID" id="type_ID" value="<?php echo $result['user_type_id'];?>"
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">User Type</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="form-select-list">
                                                                    <select class="form-control custom-select-value" name="type" id="type">
																			<option value="">--Select your user type</option>
																			<?php for($i=0;$i<count($types);$i++){
																				    $selected="";
				if($result['user_type_id']==$types[$i]['user_type_id'])
				{
					$selected="selected='selected'";
				}
				?>
				<option value="<?php echo $types[$i]['user_type_id']?>" <?php echo $selected?>><?php echo $types[$i]['user_type']?></option>
			<?php } ?>
																		</select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Type Description</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <textarea type="text" name="desc"  id="desc" class="form-control"><?php echo $result['type_description']?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="login-btn-inner">
                                                       <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="login-horizental">
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Update</button>
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