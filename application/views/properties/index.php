<div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2 class="center">Properties Grid</h2>
                                      <div class="row">
<?php
foreach ($properties as $row) 
{
?>
                                  
                                        <div class="property-item property-featured col-sm-6 col-md-3">
                                            <div class="property-box">
                                                <div class="property-box-inner">
                                                    <h3 class="property-box-title"><a href="<?php echo base_url('properties/').$row['id']; ?>" ><?php echo $row['title']; ?></a></h3>
                                                    <h4 class="property-box-subtitle"><a href="#"><?php echo $row['city'].",".$row['country']."."; ?></a></h4>
                                                    <div class="property-box-label property-box-label-primary"><?php echo $row['status']; ?></div><!-- /.property-box-label -->

                                                    <div class="property-box-picture">
                                                        <div class="property-box-price">$ <?php echo $row['prize']; if($row['status']=='rent'){ echo '/month';} ?></div><!-- /.property-box-price -->
                                                        <div class="property-box-picture-inner">
                                                            <a href="#" class="property-box-picture-target">
                                                                <img src="<?php echo base_url(); ?>assets/img/tmp/properties/medium/5.jpg" alt="">
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

                                    <div class="center">
                                        <ul class="pagination">
                                            <li><?php echo $links; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->
