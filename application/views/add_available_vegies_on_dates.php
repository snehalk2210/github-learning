
<div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row"> 
 
<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="sparkline9-list responsive-mg-b-30">
                            <div class="sparkline9-hd">
                                <div class="main-sparkline9-hd">
                                    <h1>Available Dates</h1>
                                </div>
                            </div>
                            <div class="sparkline9-graph">
                                <div class="basic-login-form-ad">
                                    
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="basic-login-inner">
                                               
                                                
                                                <form name="frm" id="frm" method="post" action="<?php echo base_url().'Vegetables/add_av_vegies_dates_action'?>">
                                                
                                            
                                                
                                                <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2">Select Available Dates</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                
                                                                <select type="date" name="av_date"  id="av_date" class="form-control">
                                 <option value="">--Select Date</option>                                
                              <?php for($i=0;$i<count($date);$i++){ ?>
                                 <option value="<?php echo $date[$i]['av_date'];?>"><?php echo $date[$i]['av_date'];?></option>
                                                           
                             <?php }?>                   
                                             </select>
                
               
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                
                                                     <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Select Vegetables<span class="basic-ds-n"></span>
																	</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="bt-df-checkbox pull-left">
                                                                    
		<?php for($i=0;$i<count($rs);$i++){?>																	<input type="checkbox" cheked="" name="vegies[]" id="vegies" value="<?php echo $rs[$i]['veg_id'];?>"> <i></i><?php echo $rs[$i]['veg_name'];?>
		<br>
		

															
		<?php }?>		
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                     
                                                    
                                                    
                                                    
                                                    <div class="login-btn-inner">
                                                       <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="login-horizental">
                                                                    <button class="btn btn-sm btn-primary login-submit-cs" name="submit" id="submit" type="submit">Submit</button>
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