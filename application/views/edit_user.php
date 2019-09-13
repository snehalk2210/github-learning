<div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row"> 
 
<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="sparkline9-list responsive-mg-b-30">
                            <div class="sparkline9-hd">
                                <div class="main-sparkline9-hd">
                                    <h1>User Login </h1>
                                </div>
                            </div>
                            <div class="sparkline9-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="login-social-inner">
                                                <a href="#" class="button btn-social basic-ele-mg-b-10 facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                                                <a href="#" class="button btn-social basic-ele-mg-b-10 twitter span-left"> <span><i class="fa fa-twitter"></i></span> Twitter </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner">
                                                <h3>Sign In</h3>
                                                <p> Register New User sign here</p>
                                                <form method="post" action="<?php echo base_url().'User/edit_user_action'?>" name="frm" id="frm">
                                                <input type="hidden" name="user_Id" id="user_Id" value="<?php echo $result['user_id']; ?>"/>
                                                <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">User Name</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="text" name="usr_name" id="usr_name" class="form-control"  value="<?php echo $result['user_name'];?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">User Type</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="form-select-list">
                                                                    <select class="form-control custom-select-value" name="user_type">
																			<option value="">--Select your user type</option>
			
			<?php for($i=0;$i<count($user_types);$i++){
				$selected="";
				if($result['user_type']==$user_types[$i]['user_type_id']){
					$selected="selected='selected'";
				}
				?>																<option value="<?php echo $user_types[$i]['user_type_id']?>" <?php echo $selected?>><?php echo $user_types[$i]['user_type']?></option>
			<?php } ?>																
																		</select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Email</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="email" class="form-control" name="user_email" id="user_email" value="<?php echo $result['email'];?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Password</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="password" class="form-control" placeholder="password" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="login-horizental">
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit" >Update</button>
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