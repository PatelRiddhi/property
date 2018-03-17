 <style type="text/css">
     h5{
        text-transform: capitalize;
     }
     .h5{
        text-transform: lowercase;
     }
   
 </style>
 <div class="panel-group m-bot20" id="accordion">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <img src="<?php echo base_url($property['thumbnail']);?>" style="float:left;" height="100" width="100">
                                                
                                                   <h1>&nbsp;More information about <?php echo $property['title']; ?> </h1>
                                                </h4>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Categories :</label>
                                                <div class="col-lg-10">
                                               <?php echo $property['description']; ?>
                                                </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Price :</label>
                                            <div class="col-lg-10">
                                                <h5>$  <?php echo $property['prize']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Area :</label>
                                            <div class="col-lg-10">
                                                <h5 class="h5"><?php echo $property['area']; ?> m<sup>2</sup></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Bath :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $property['bath']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Price :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $property['beds']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Garages :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $property['garages']; ?></h5>
                                            </div>
                                        </div>
                                        <?php
                                        if($property['facebook_url']!='')
                                        {
                                        ?>
                                             <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Facebook URL :</label>
                                            <div class="col-lg-10">
                                                <h5 class="h5"><?php echo $property['facebook_url']; ?></h5>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        if($property['twitter_url']!='')
                                        {
                                        ?>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Twitter URL :</label>
                                            <div class="col-lg-10">
                                                <h5 class="h5"><?php echo $property['twitter_url']; ?></h5>
                                            </div>
                                        </div>
                                         <?php
                                        }
                                        if($property['linked_in_url']!='')
                                        {
                                        ?>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">LinkedIn URL :</label>
                                            <div class="col-lg-10">
                                                <h5  class="h5"><?php echo $property['linked_in_url']; ?></h5>
                                            </div>
                                        </div>
                                         <?php
                                        }
                                        if($property['vimeo-square_url']!='')
                                        {
                                        ?>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Vimeo-square URL :</label>
                                            <div class="col-lg-10">
                                                <h5  class="h5"><?php echo $property['vimeo-square_url']; ?></h5>
                                            </div>
                                        </div>
                                         <?php
                                        }
                                        if($property['you_tube_url']!='')
                                        {
                                        ?>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">YouTube URL </label>
                                            <div class="col-lg-10">
                                                <h5  class="h5">:<?php echo $property['you_tube_url']; ?></h5>
                                            </div>
                                        </div>
                                         <?php
                                        }
                                        if($property['twitter_url']!='')
                                        {
                                        ?>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Twitter URL :</label>
                                            <div class="col-lg-10">
                                                <h5 class="h5"><?php echo $property['twitter_url']; ?></h5>
                                            </div>
                                        </div>
                                         <?php
                                        }
                                        ?>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Address :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $property['address']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">City :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $property['city']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">State :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $property['state']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Country :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $property['country']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Status :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $property['status']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Type :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $property['pro_type_id']['name']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Eminities :</label>
                                            <div class="col-lg-10">
                                            <?php 
                                            foreach ($property['aminities'] as $value) 
                                            {
                                            	?>
	                                               	<h5><span class="label label-default"><?php echo $value['name']; ?></span></h5>
                                            <?php	
                                            }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Agents</label>
                                            <div class="col-lg-10">
                                                <div class="col-lg-10">

                                                <?php
                                                    foreach($property['agents'] as $value)
                                                    {
                                                ?>
                                                			<h5>:<?php echo $value['first_name'].$value['last_name']; ?></h5>
                                                <?php
                                                    } 
                                                ?>
                                            	</div>
                                            </div>
                                          <br><br>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Gallery:</label>
                                            <div class="col-lg-10">
                                                <div class="col-lg-10">
                                                    <h5>
                                                <?php
                                                    foreach($property['images'] as $value)
                                                    {
                                                ?>
                                                            <img src="<?php echo base_url().$value; ?>" height="100" width="100"></img>
                                                <?php
                                                    } 
                                                ?>
                                                </h5>
                                                </div>
                                            </div>
                                          <br><br>
                                        </div>
                                        <button class="btn btn-info"><a href="<?php echo base_url('admin/properties/cancel'); ?>">BACK</button>
</div>                                        
                                            