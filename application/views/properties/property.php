<div id="main-wrapper">
    <div id="main">
        <div id="main-inner">
            <div id="map-property"></div><!-- /.map-property -->
            <div class="container">
                <div class="block-content block-content-small-padding">
                    <div class="block-content-inner">
                        <div class="row">
                            <div class="col-sm-9">
                                <h2 class="property-detail-title"><?php echo ucfirst($property['title']); ?>  <a href="<?php echo base_url('properties/manage/').$property['id'];?>" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i>Edit</a></h2>
                                <h3 class="property-detail-subtitle"><?php echo ucfirst($property['state']); ?>, <?php echo ucfirst($property['city']); ?><strong>$ <?php echo $property['prize']; ?></strong></h3>

                                <div class="property-detail-overview">
                                    <div class="property-detail-overview-inner clearfix">
                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Price:</strong>
                                            <span>$ <?php echo $property['prize']; ?></span>
                                        </div><!-- /.property-detail-overview-item -->

                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Type:</strong>
                                            <span><?php echo ucfirst($property['status']); ?></span>
                                        </div><!-- /.property-detail-overview-item -->

                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Area:</strong>
                                            <span><?php echo $property['area']; ?>m<sup>2</sup></span>
                                        </div><!-- /.property-detail-overview-item -->

                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Baths:</strong>
                                            <span><?php echo $property['bath']; ?></span>
                                        </div><!-- /.property-detail-overview-item -->

                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Beds:</strong>
                                            <span><?php echo $property['beds']; ?></span>
                                        </div><!-- /.property-detail-overview-item -->

                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Garages:</strong>
                                            <span><?php echo $property['garages']; ?></span>
                                        </div><!-- /.property-detail-overview-item -->
                                    </div><!-- /.property-detail-overview-inner -->
                                </div><!-- /.property-detail-overview -->

                                <div class="flexslider">
                                    <ul class="slides">
<?php
foreach($property['images'] as $image)
{
?>
                                        <li data-thumb="<?php echo base_url().$image; ?>">
                                            <img src="<?php echo base_url().$image; ?>" alt="" height="400" width="100">
                                        </li>
<?php
}
?>
                                    </ul><!-- /.slides -->
                                </div><!-- /.flexslider -->

                                <hr>

                                <h2>Description</h2>
                                <p>
                                    <?php echo $property['description']; ?>
                                </p>

                                <hr>
<?php
if($this->session->userdata('user'))
{
?>
                                <h2>Amenities</h2>
   
                                <div class="row">
                                    <ul class="property-detail-amenities">
<?php
foreach ($aminities as $row) 
{
?> 
                                    
                                        <li class="col-xs-6 col-sm-4"><i class="fa <?php if(in_array($row['id'], $property['aminities']))
                                        { echo 'fa-check ok'; }else{ echo ' fa-ban no'; }; 
                                        ?>" ></i><?php echo ucfirst($row['name']); ?></li>
<?php
}
?>
                                    </ul>
                                </div><!-- /.row -->
<?php
}
?>
                            </div>

                            <div class="col-sm-3">
                                <div class="sidebar">
                                    <div class="sidebar-inner">
                                        <div class="widget">
    <h3 class="widget-title">Social Networks</h3>
    <ul class="social social-boxed">
    <?php
    if($property['facebook_url'] !='')
    {
    ?>
        <li><a href="<?php echo $property['facebook_url']; ?>"><i class="fa fa-facebook"></i></a></li>
    <?php
    }
    if($property['twitter_url'] !='')
    {
    ?>
        <li><a href="<?php echo $property['twitter_url']; ?>"><i class="fa fa-twitter"></i></a></li>
    <?php
    }
    if($property['linked_in_url'] !='')
    {
    ?>
        <li><a href="<?php echo $property['linked_in_url']; ?>"><i class="fa fa-linkedin"></i></a></li>
    <?php
    }
    if($property['vimeo-square_url'] !='')
    {
    ?>
        <li><a href="<?php echo $property['vimeo-square_url']; ?>"><i class="fa fa-vimeo-square"></i></a></li>
    <?php
    }
    if($property['you_tube_url'] !='')
    {
    ?>
        <li><a href="<?php echo $property['you_tube_url']; ?>"><i class="fa fa-youtube"></i></a></li>
    <?php
    }
    ?>
    </ul><!-- /.social-->
</div><!-- /.widget -->                                        <div class="widget">
    <h3 class="widget-title">Enquire</h3>

    <div class="widget-content">
        <form method="post" action="<?php echo base_url('properties/').$property['id']; ?>">
            <div class="form-group">
                <label>Your e-mail</label>
                <input type="text" name="email" class="form-control">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label>Date From</label>
                <input type="date" name="date_from" class="form-control">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label>Date To</label>
                <input type="date" name="date_to" class="form-control">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control"></textarea>
            </div><!-- /.form-group -->

            <div class="form-group">
                <input type="submit" name="submit" value="Contact" class="btn btn-block btn-primary btn-inversed">
            </div><!-- /.form-group -->
        </form>
    </div><!-- /.widget-content -->
</div><!-- /.widget -->                                        <div class="widget">
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
                <h3 class="property-small-title"><a href="<?php echo base_url('properties/').$row['id']; ?>"><?php echo ucfirst($row['title']); ?></a></h3><!-- /.property-small-title -->
                <div class="property-small-price"> $ <?php echo $row['prize']; if($row['status']=='rent'){ echo '<span class="property-small-price-suffix">/per month</span>';} ?></div><!-- /.property-small-price -->
            </div><!-- /.property-small-content -->
        </div><!-- /.property-small -->
<?php
}
?>
    </div><!-- /.properties-small-list -->
</div><!-- /.widget -->                                        <div class="widget">
    <h3 class="widget-title">Assigned Agents</h3>
<?php
foreach ($property['agents'] as $key => $value) 
{
?>
    <div class="agent-small">
        <div class="agent-small-top">
            <div class="clearfix">
                <div class="agent-small-picture col-sm-12">
                    <div class="agent-small-picture-inner">
                        <a href="<?php echo base_url().$value['profile']; ?>" class="agent-small-picture-inner ">
                            <img src="<?php echo base_url().$value['profile']; ?>" alt="" height="200" width="200">
                        </a><!-- /.agent-small-picture-target -->
                    </div><!-- /.agent-small-picture-inner -->
                </div><!-- /.agent-small-picture -->
            </div><!-- /.row -->
        </div><!-- /.agent-small-top -->

        <div class="agent-small-bottom">
            <ul class="list-unstyled">
                <li><h3 class="agent-box-title"><a href="<?php echo base_url('agents/').$value['id']; ?>"><?php echo ucfirst($value['first_name'])." ".ucfirst($value['last_name']);?></a></h3><!-- /.agent-row-title --></li>
                <li><i class="fa fa-phone"></i> <?php echo $value['contact_no']; ?></li>
                <li><i class="fa fa-envelope-o"></i> <a href="#"><?php echo $value['email']; ?></a></li>
            </ul>
        </div><!-- /.agent-small-bottom -->
    </div><!-- /.agent-small -->
<?php
}
?>
    
</div><!-- /.widget -->                                    </div><!-- /.sidebar-inner -->
                                </div><!-- /.sidebar -->
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.block-content-inner -->
                </div><!-- /.block-content -->
            </div><!-- /.container -->
        </div><!-- /#main-inner -->
    </div><!-- /#main -->
</div><!-- /#main-wrapper -->