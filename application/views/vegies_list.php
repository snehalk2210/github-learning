<?php
$counter=1;
 for($i=0;$i<count($result);$i++)
 {
 	?>  
      
       
               
                        


 	
 	
        <div class="contacts-area mg-b-15">
            <div class="container-fluid">
            <div class="row">
                  
 	            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel hblue contact-panel contact-panel-cs responsive-mg-b-30">
                            <div class="panel-body custom-panel-jw">
                                <div class="social-media-in" >
                                    <a href="<?php echo base_url().'Vegetables/edit_vegetable/'.$result[$i]['veg_id']?>">Edit</a>
                                    <a href="<?php echo base_url().'Vegetables/delete_vegetable/'.$result[$i]['veg_id']?>">Delete</a>
                                    
                                   
                                </div>
                                <img alt="logo" class="img-circle m-b" src="<?php echo base_url().'uploads/vegetables/'.$result[$i]['veg_photo'];?>" width="150" height="150" margin-left="20px">
                                <h3><a href=""><?php echo $result[$i]['veg_name'];?></a></h3>
                                <p class="all-pro-ad"><?php echo $result[$i]['veg_type'];?></p>
                              
                            </div> 
                            <div class="panel-footer contact-footer">
                                <div class="professor-stds-int">
                                    <div class="professor-stds">
                                        <div class="contact-stat"><span>Unit: </span> <strong><?php echo $result[$i]['vunit_unit']?></strong></div>
                                    </div>
                                    <div class="professor-stds">
                                        <div class="contact-stat"><span>Quantity: </span> <strong><?php echo $result[$i]['vunit_qty']?></strong></div>
                                    </div>
                                    <div class="professor-stds">
                                        <div class="contact-stat"><span>Prize: </span> <strong>Rs.<?php echo $result[$i]['vr_rate_per_unit']?></strong></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                            </div>
                            
                            
                         
                           
            </div>
            
            
            
            </div>
        </div>
        
            
         <?php } ?>    
                            
                         
                        
                    
                    
                   
                    
               
                
            
        
        
        