 <div class="panel-group m-bot20" id="accordion">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    
                                                    <img src="<?php echo base_url().$agency['profile'];?>" style="float:left;" height="80" width="80"></img>
                                                
                                                   <br><br><br>More information about <?php echo $agency['title']; ?>; 
                                                </h4>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Categories :</label>
                                                <div class="col-lg-10">
                                               <?php echo $agency['description']; ?>
                                                </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Facebook URL :</label>
                                            <div class="col-lg-10">
                                                <h5><a href="<?php echo $agency['facebook_url']; ?>" target="blank"><?php echo $agency['facebook_url']; ?></a></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Twitter URL :</label>
                                            <div class="col-lg-10">
                                                <h5><a href="<?php echo $agency['twitter_url']; ?>" target="blank"><?php echo $agency['twitter_url']; ?></a></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">LinkedIn URL :</label>
                                            <div class="col-lg-10">
                                                <h5><a href="<?php echo $agency['linked_in_url']; ?>" target="blank"><?php echo $agency['linked_in_url']; ?></a></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Vimeo-square URL :</label>
                                            <div class="col-lg-10">
                                                <h5><a href="<?php echo $agency['vimeo-square_url']; ?>" target="blank"><?php echo $agency['vimeo-square_url']; ?></a></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">YouTube URL :</label>
                                            <div class="col-lg-10">
                                                <h5><a href="<?php echo $agency['youtube_url']; ?>" target="blank"><?php echo $agency['youtube_url']; ?></a></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Twitter URL :</label>
                                            <div class="col-lg-10">
                                                <h5><a href="<?php echo $agency['twitter_url']; ?>" target="blank"><?php echo $agency['twitter_url']; ?></a></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Website URL :</label>
                                            <div class="col-lg-10">
                                                <h5><a href="<?php echo $agency['website']; ?>" target="blank"><?php echo $agency['website']; ?></a></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Email :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $agency['email']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Address :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $agency['address']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Mobile No. :</label>
                                            <div class="col-lg-10">
                                                <h5><?php echo $agency['mobile_no']; ?></h5>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Properties :</label>
                                            <div class="col-lg-10">
                                            <?php 
                                            foreach ($agency['properties'] as $value) 
                                            {
                                            	?>
	                                               	<h5><?php echo "-".$value; ?></h5>
                                            <?php	
                                            }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Agents:</label>
                                            <div class="col-lg-10">
                                                <div class="col-lg-10">

                                                <?php
                                                    foreach($agency['agents'] as $value)
                                                    {
                                                ?>
                                                			<h5><?php echo $value; ?></h5>
                                                <?php
                                                    } 
                                                ?>
                                            	</div>
                                            </div>
                                          <br><br>
                                        </div>
                                       
                                        <button class="btn btn-info"><a href="<?php echo base_url('admin/agencies/cancel'); ?>">BACK</button>
</div>                                        
                                            