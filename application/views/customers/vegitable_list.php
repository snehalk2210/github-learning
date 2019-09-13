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

                        
 
                                
                               
                                <img alt="logo" class="img-circle m-b" src="<?php echo base_url().'uploads/vegetables/'.$result[$i]['veg_photo'];?>" width="150" height="150">
                                <h3><a href=""><?php echo $result[$i]['veg_name']?></a></h3>
                                <p class="all-pro-ad"><?php echo $result[$i]['veg_type']?></p>
                              
                              <div class="panel-footer contact-footer">
                                <div class="professor-stds-int">
                                    <div class="professor-stds">
                                        <div class="contact-stat"><span>Unit: </span> <strong><?php echo $result[$i]['vunit_unit']?></strong></div>
                                    </div>
                                    <div class="professor-stds">
                                        <div class="contact-stat"><span>Quantity: </span> <strong><?php echo $result[$i]['vunit_qty']?></strong></div>
                                    </div>
                                    <div class="professor-stds">
                                        <div class="contact-stat"><span>Prize: </span> <strong>Rs.<?php echo $result[$i]['veg_rate']?></strong></div>
                                    </div>
                                </div>
                            </div>
                            </div> 
                             </div>
                            
                            
                         
                        </div>
                    </div>
                    
                   
                    
               
                
            </div>
       <?php } ?>
        