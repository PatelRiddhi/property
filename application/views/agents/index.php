<div id="main-wrapper">
    <div id="main">
        <div id="main-inner">
            <div class="container">
                <div class="block-content block-content-small-padding">
                    <div class="block-content-inner">
                        <h2 class="center">Agents</h2>


                        <div class="agents-list clearfix">
                            <div class="row">
<?php
foreach ($agents as $row) 
{
?>  
                                <div class="col-sm-6">
                                    <div class="agent-row">
                                        <div class="row">
                                            <div class="agent-row-picture col-sm-5">
                                                <div class="agent-row-label agent-row-label-primary"><?php echo ucfirst($row['current_status']); ?></div><!-- /.agent-row-picture-label -->

                                                <div class="agent-row-picture-inner">
                                                    <a href="<?php echo base_url().$row['profile']; ?>" class="agent-row-picture-target">
                                                        <img src="<?php echo base_url().$row['profile']; ?>" alt="" height="200" width="200">
                                                    </a><!-- /.agent-row-picture-target -->
                                                </div><!-- /.agent-row-picture-inner -->
                                            </div><!-- /.agent-row-picture -->
                                            <div class="agent-row-content col-sm-7">
                                                <h3 class="agent-row-title"><a href="<?php echo base_url('agents/').$row['id']; ?>"><?php echo ucfirst($row['first_name'])." ".ucfirst($row['last_name']); ?></a></h3><!-- /.agent-row-title -->
                                                <h4 class="agent-row-subtitle"><?php echo $row['properties']; ?> properties in catalogue</h4><!-- /.agent-row-subtitle -->
                                            
                                                <ul class="agent-row-contacts list-unstyled">
                                                    <li><i class="fa fa-envelope-o"></i> <a href="mailto:@" target="blank"><?php echo $row['email']; ?></a></li>
                                            <?php
                                            if($row['skype_id'] !='')
                                            {
                                            ?>
                                                    <li><i class="fa fa-skype"></i><?php echo $row['skype_id']; ?></li>
                                                </ul>
                                            <?php
                                            }
                                            ?>
                                                <ul class="social social-boxed">
                                                <?php
                                                if($row['facebook_url'] !='')
                                                {
                                                ?>
                                                    <li><a href="<?php echo $row['facebook_url']; ?>" target="blank"><i class="fa fa-facebook"></i></a></li>
                                                <?php
                                                }
                                                if($row['twitter_url'] !='')
                                                {
                                                ?>
                                                    <li><a href="<?php echo $row['twitter_url']; ?>" target="blank"><i class="fa fa-twitter"></i></a></li>
                                                <?php
                                                }
                                                if($row['linked_in_url'] !='')
                                                {
                                                ?>
                                                    <li><a href="<?php echo $row['linked_in_url']; ?>" target="blank"><i class="fa fa-linkedin"></i></a></li>
                                                <?php
                                                }
                                                ?>
                                                </ul><!-- /.social-->
                                            </div><!-- /.agent-row-content -->
                                        </div><!-- /.row -->
                                    </div><!-- /.agent-row -->
                                </div>
<?php
}
?>
                               
                            </div><!-- /.row -->
                        </div><!-- /.agents-list -->
                    </div><!-- /.block-content-inner -->
                </div><!-- /.block-content -->
            </div><!-- /.container -->
        </div><!-- /#main-inner -->
    </div><!-- /#main -->
</div><!-- /#main-wrapper -->