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
                                                <div class="agent-row-label agent-row-label-primary"><?php echo $row['current_status']; ?></div><!-- /.agent-row-picture-label -->

                                                <div class="agent-row-picture-inner">
                                                    <a href="#" class="agent-row-picture-target">
                                                        <img src="<?php echo base_url(); ?>assets/img/tmp/agents/medium/3.jpg" alt="">
                                                    </a><!-- /.agent-row-picture-target -->
                                                </div><!-- /.agent-row-picture-inner -->
                                            </div><!-- /.agent-row-picture -->
                                            <div class="agent-row-content col-sm-7">
                                                <h3 class="agent-row-title"><a href="<?php echo base_url('agents/').$row['id']; ?>"><?php echo $row['first_name']." ".$row['last_name']; ?></a></h3><!-- /.agent-row-title -->
                                                <h4 class="agent-row-subtitle"><a href="#">187 properties in catalogue</a></h4><!-- /.agent-row-subtitle -->

                                                <ul class="agent-row-contacts list-unstyled">
                                                    <li><i class="fa fa-envelope-o"></i> <a href="mailto:@"><?php echo $row['email']; ?></a></li>
                                                    <li><i class="fa fa-skype"></i><?php echo $row['skype_id']; ?></li>
                                                </ul>

                                                <ul class="social social-boxed">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
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