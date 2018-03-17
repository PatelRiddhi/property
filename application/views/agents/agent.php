 <div id="main-wrapper">
    <div id="main">
    <div id="main-inner">
    <div class="container">
    <div class="block-content block-content-small-padding">
    <div class="block-content-inner">
    <div class="row">
    <div class="col-sm-9">
    <h2><?php echo ucfirst($agent['first_name'])." ".ucfirst($agent['last_name']); ?>  <?php if(($this->session->userdata('user')['role']==1) || ($this->session->userdata('user')['role']==2)){?><a href="<?php echo base_url('agents/manage/').$agent['id'];?>" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i>Edit</a><?php }?></h2>

    <div class="agency-detail">
        <div class="row">
            <div class="col-sm-3">
                <div class="agency-detail-picture">
                    <img src="<?php echo base_url().$agent['profile']; ?>" alt="" class="img-responsive">
                </div><!-- /.agent-detail-picture -->
            </div>

            <div class="col-sm-8">
                <p>
                   Donec faucibus metus sed eros euismod, eu viverra augue viverra. Sed auctor vel ligula nec molestie. Aenean a gravida metus, non sagittis nisl. Nunc quis sem sit amet leo tincidunt laoreet. Praesent a tempor nisl, id suscipit elit. Cras dolor turpis, posuere ut mollis id, rutrum eget augue. Aenean ut ligula quis neque ullamcorper tristique ut a ante. Vivamus enim erat, sollicitudin non facilisis accumsan, dictum nec libero.
                </p>

                <ul class="social social-boxed">
                <?php
                if($agent['facebook_url']!='')
                {
                ?>
                    <li><a href="<?php echo $agent['facebook_url'];?>"><i class="fa fa-facebook"></i></a></li>
                <?php
                }
                if($agent['twitter_url']!='')
                {
                ?>

                    <li><a href="<?php echo $agent['twitter_url'];?>"><i class="fa fa-twitter"></i></a></li>
                <?php
                }
                if($agent['linked_in_url']!='')
                {
                ?>
                    <li><a href="<?php echo $agent['linked_in_url'];?>"><i class="fa fa-linkedin"></i></a></li>
                <?php
                }
                if($agent['google_plus_url']!='')
                {
                ?>
                    <li><a href="<?php echo $agent['google_plus_url'];?>"><i class="fa fa-google-plus"></i></a></li>
                <?php
                }
                if($agent['vimeo-square_url']!='')
                {
                ?>
                    <li><a href="<?php echo $agent['vimeo-square_url'];?>"><i class="fa fa-vimeo-square"></i></a></li>
                <?php
                }
                if($agent['you_tube_url']!='')
                {
                ?>
                    <li><a href="<?php echo $agent['you_tube_url'];?>"><i class="fa fa-youtube"></i></a></li>
                <?php
                }
                ?>
                </ul><!-- /.social-->
            </div>
        </div><!-- /.row -->
    </div><!-- /.agency-detail -->

    <h2>Assigned Properties</h2>

    <div class="row">
<?php
foreach ($agent['properties'] as $row) 
{
?>
        <div class="property-item property-featured col-sm-6 col-md-4">
            <div class="property-box">
                <div class="property-box-inner">
                    <h3 class="property-box-title"><a href="<?php echo base_url('properties/').$row['id']; ?>"><?php echo ucfirst($row['title']); ?></a></h3>
                    <h4 class="property-box-subtitle"><a href="#"><?php echo ucfirst($row['state']).",".ucfirst($row['country']); ?></a></h4>
                    <div class="property-box-label property-box-label-primary"><?php echo ucfirst($row['status']); ?></div><!-- /.property-box-label -->

                    <div class="property-box-picture">
                        <div class="property-box-price">$ <?php if($row['status'] =='rent')
                                                                { echo $row['prize']."/month"; } 
                                                                else
                                                                { echo $row['status']; }  ?></div><!-- /.property-box-price -->
                        <div class="property-box-picture-inner">
                            <a href="<?php echo base_url().$row['thumbnail']; ?>" class="property-box-picture-target">
                                <img src="<?php echo base_url().$row['thumbnail']; ?>" alt="" height="250" width="200">
                            </a><!-- /.property-box-picture-target -->
                        </div><!-- /.property-picture-inner -->
                    </div><!-- /.property-picture -->

                    <div class="property-box-meta">
                        <div class="property-box-meta-item col-sm-3">
                            <strong><?php echo $row['bath']; ?></strong>
                            <span>Baths</span>
                        </div><!-- /.col-sm-3 -->

                        <div class="property-box-meta-item col-sm-3">
                            <strong><?php echo $row['beds']; ?></strong>
                            <span>Beds</span>
                        </div><!-- /.col-sm-3 -->

                        <div class="property-box-meta-item col-sm-3">
                            <strong><?php echo $row['area']; ?></strong>
                            <span>Area</span>
                        </div><!-- /.col-sm-3 -->

                        <div class="property-box-meta-item col-sm-3">
                            <strong><?php echo $row['garages']; ?></strong>
                            <span>Garages</span>
                        </div><!-- /.col-sm-3 -->
                    </div><!-- /.property-box-meta -->
                </div><!-- /.property-box-inner -->
            </div><!-- /.property-box -->
        </div><!-- /.property-item -->
<?php
}
?>
    </div><!-- /.row -->

    </div>

    <div class="col-sm-3">
        <div class="sidebar">
            <div class="sidebar-inner">
                <div class="widget">
                    <h3 class="widget-title">Contact</h3>

    <div class="widget-content">
        <form method="post" action="<?php echo base_url('agents/').$agent['id']; ?>">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control"></textarea>
            </div><!-- /.form-group -->

            <div class="form-group">
                <input type="submit" value="Contact" class="btn btn-block btn-primary btn-inversed">
            </div><!-- /.form-group -->
        </form>
    </div><!-- /.widget-content -->
</div><!-- /.widget -->                <div class="widget">
    <h3 class="widget-title">Recent Properties</h3>

    <div class="properties-small-list">
<?php
foreach ($properties as $row) 
{
?>      
        <div class="property-small clearfix">
            <div class="property-small-picture col-sm-12 col-md-4">
                <div class="property-small-picture-inner">
                    <a href="<?php echo base_url().$row['thumbnail']; ?>" class="property-small-picture-target">
                        <img src="<?php echo base_url().$row['thumbnail']; ?>" alt="" height="70" width="100">
                    </a>
                </div><!-- /.property-small-picture -->
            </div><!-- /.property-small-picture -->

            <div class="property-small-content col-sm-12 col-md-8">
                <h3 class="property-small-title"><a href="<?php echo base_url('properties/').$row['id']; ?>" ><?php echo ucfirst($row['title']); ?></a></h3><!-- /.property-small-title -->
                <div class="property-small-price">$ <?php echo $row['prize']; if($row['status']=='rent'){ echo '<span class="property-small-price-suffix">/per month</span>';} ?></div><!-- /.property-small-price -->
            </div><!-- /.property-small-content -->
        </div><!-- /.property-small -->
<?php
}
?>
    </div><!-- /.properties-small-list -->
</div><!-- /.widget -->            </div><!-- /.sidebar-inner -->
        </div><!-- /.sidebar -->
    </div>
    </div><!-- /.row -->
    </div><!-- /.block-content-inner -->
    </div><!-- /.block-content -->
    </div><!-- /.container -->
    </div><!-- /#main-inner -->
    </div><!-- /#main -->
    </div><!-- /#main-wrapper -->