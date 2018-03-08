 <div id="main-wrapper">
    <div id="main">
    <div id="main-inner">
    <div class="container">
    <div class="block-content block-content-small-padding">
    <div class="block-content-inner">
    <div class="row">
    <div class="col-sm-9">
    <h2>Agencies</h2>
    <div class="agencies-list">
<?php
foreach ($agencies as $row) 
{
?>    
       
            <div class="agency-row clearfix">
                <div class="agency-row-picture col-sm-6 col-md-5 col-lg-4">
                    <div class="agency-row-picture-inner">
                        <a href="#" class="agency-row-picture-target">
                            <img src="<?php echo base_url(); ?>assets/img/tmp/properties/medium/10.jpg" alt="">
                        </a><!-- /.agency-row-picture-target -->
                    </div><!-- /.agency-row-picture-inner -->
                </div><!-- /.agency-row-picture  -->

                <div class="agency-row-content col-sm-6 col-md-7 col-lg-8">
                    <h3 class="agency-row-title"><a href="<?php echo base_url('agencies/').$row['id'];?>"><?php echo $row['title']; ?></a></h3>
                    <h4 class="agency-row-subtitle"><?php echo $row['properties']; ?></h4>

                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone"></i><?php echo $row['mobile_no']; ?></li>
                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:#"><?php echo $row['email']; ?></a></li>
                        <li><i class="fa fa fa-mail-forward"></i> contact form</li>
                    </ul>
                </div><!-- /.agency-row-content -->
            </div><!-- /.agency-row -->

<?php
}
?>
            </div><!-- /.agency-row -->

    <div class="center">
        <ul class="pagination">
            <li><?php echo $links; ?></li>
        </ul>
    </div>
    </div>

    <div class="col-sm-3">
        <div class="sidebar">
            <div class="sidebar-inner">
                <div class="widget">
     
    <h3 class="widget-title">Filter</h3>

    <div class="widget-content">
        <form method="post" action="?">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Country</label>
                    <input type="text"  class="form-control" placeholder="e.g. USA">
                </div><!-- /.form-group -->

                <div class="form-group col-sm-12">
                    <label>Location</label>
                    <input type="text"  class="form-control" placeholder="e.g. California">
                </div><!-- /.form-group -->

                <div class="form-group col-sm-12">
                    <label>Sublocation</label>
                    <input type="text"  class="form-control" placeholder="e.g. Sacramento">
                </div><!-- /.form-group -->

                <div class="form-group col-sm-12">
                    <label>Property Type</label>
                    <input type="text"  class="form-control" placeholder="e.g. Apartment">
                </div><!-- /.form-group -->

                <div class="form-group col-sm-6">
                    <label>Price From</label>
                    <input type="text"  class="form-control" placeholder="e.g. 1000">
                </div><!-- /.form-group -->

                <div class="form-group col-sm-6">
                    <label>Price To</label>
                    <input type="text"  class="form-control" placeholder="e.g. 5000">
                </div><!-- /.form-group -->
            </div><!-- /.row -->

            <div class="form-group">
                <input type="text" value="Filter" class="btn btn-block btn-primary btn-inversed">
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
                    <a href="#" class="property-small-picture-target">
                        <img src="<?php echo base_url(); ?>assets/img/tmp/properties/medium/11.jpg" alt="">
                    </a>
                </div><!-- /.property-small-picture -->
            </div><!-- /.property-small-picture -->

            <div class="property-small-content col-sm-12 col-md-8">
                <h3 class="property-small-title"><a href="<?php echo base_url('properties/').$row['id']; ?>" ><?php echo $row['title']; ?></a></h3><!-- /.property-small-title -->
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
