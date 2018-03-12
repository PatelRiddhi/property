<div id="main-wrapper">
    <div id="main">
        <div id="main-inner">

            <!-- MAP -->
<div class="block-content no-padding">
    <div class="block-content-inner">
        <div class="map-wrapper">
            <div id="map" data-style="1"></div><!-- /#map -->

            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 map-navigation-positioning">
                        <div class="map-navigation-wrapper">
                            <div class="map-navigation">
                                <form method="post" action="#" class="clearfix">
                                    <div class="form-group col-sm-12">
                                        <label>Country</label>

                                        <div class="select-wrapper">
                                            <select id="select-country" class="form-control">
                                                <option value="">Select Country</option>
<?php
                                                foreach ($countries as  $country) 
                                                {
?>
                                                    <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
<?php    
                                                }
?>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>State</label>

                                        <div class="select-wrapper">
                                            <select id="state" class="form-control">       
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>City</label>

                                        <div class="select-wrapper">
                                            <select id="city" class="form-control">
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>Property Type</label>

                                        <div class="select-wrapper">
                                            <select class="form-control">
                                                <option value="-1">--Select Type--</option>
<!-- <?php
    foreach($type as $value)
    {
?> -->
                                                <!-- <option value="<?php //echo $value['id']; ?>"><?php //echo $value['name']; ?></option> -->
<!-- <?php
    }
?> -->
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Price From</label>
                                        <input type="text"  class="form-control" placeholder="e.g. 1000">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Price To</label>
                                        <input type="text"  class="form-control" placeholder="e.g. 5000">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <input type="submit" class="btn btn-primary btn-inversed btn-block" value="Filter Properties">
                                    </div><!-- /.form-group -->
                                </form>
                            </div><!-- /.map-navigation -->
                        </div><!-- /.map-navigation-wrapper -->
                    </div><!-- /.col-sm-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->

        </div><!-- /.map-wrapper -->
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->
            <div class="container">
                <!-- SLOGAN -->
<div class="block-content background-primary background-map block-content-small-padding fullwidth">
    <div class="block-content-inner">
        <h2 class="no-margin center caps">Only Real Estate Template You Will Ever Need</h2>
    </div><!-- /.block-content-iner -->
</div><!-- /.block-content-->                <!-- ISOTOPE GRID -->
<div class="block-content block-content-small-padding">
<div class="block-content-inner">
<h2 class="center">Best Rated Properties</h2>

<!-- <ul class="properties-filter">
    <li class="selected"><a href="#" data-filter="*"><span>All</span></a></li>
    <li><a href="#" data-filter=".property-featured"><span>Featured</span></a></li>
    <li><a href="#" data-filter=".property-rent"><span>Rent</span></a></li>
    <li><a href="#" data-filter=".property-sale"><span>Sale</span></a></li>
</ul> -->
<!-- /.property-filter -->

<div class="properties-items">
<div class="row">
<?php
foreach ($properties as $row) 
{
?>    

    <div class="property-item property-featured col-sm-6 col-md-3">
        <div class="property-box">
            <div class="property-box-inner">
                <h3 class="property-box-title"><a href="<?php echo base_url('properties/').$row['id']; ?>"><?php echo $row['state']; ?></a></h3>
                <h4 class="property-box-subtitle"><a href="#"><?php echo $row['city']; ?></a></h4>

                <div class="property-box-label property-box-label-primary"><?php echo $row['status']; ?></div>
                <!-- /.property-box-label -->

                <div class="property-box-picture">
                    <div class="property-box-price">$ <?php echo $row['prize']; if($row['status']=='rent'){ echo '/month';} ?></div>
                    <!-- /.property-box-price -->
                    <div class="property-box-picture-inner">
                        <a href="property-detail.html" class="property-box-picture-target">
                            <img src="<?php echo base_url(); ?>assets/img/tmp/properties/medium/8.jpg" alt="">
                        </a><!-- /.property-box-picture-target -->
                    </div>
                    <!-- /.property-picture-inner -->
                </div>
                <!-- /.property-picture -->

                <div class="property-box-meta">
                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong><?php echo $row['bath']; ?></strong>
                        <span>Baths</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong><?php echo $row['beds']; ?></strong>
                        <span>Beds</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong><?php echo $row['area']; ?></strong>
                        <span>Area</span>
                    </div>
                    <!-- /.col-sm-3 -->

                    <div class="property-box-meta-item col-xs-3 col-sm-3">
                        <strong><?php echo $row['garages']; ?></strong>
                        <span>Garages</span>
                    </div>
                    <!-- /.col-sm-3 -->
                </div>
                <!-- /.property-box-meta -->
            </div>
            <!-- /.property-box-inner -->
        </div>
        <!-- /.property-box -->
    </div>
    <!-- /.property-item -->

<?php
}
?>

</div>
<!-- /.row -->  
</div>
<!-- /.properties-items -->

</div>
<!-- /.block-content-inner -->
</div><!-- /.block-content -->                
<!-- CAROUSEL -->
<div class="block-content background-secondary background-map fullwidth">
<div class="block-content-inner">
<ul class="bxslider clearfix">
<?php
foreach ($remaining_properties as $row) 
{
?>
<li>
    <div class="property-box no-border small">
        <div class="property-box-inner">
            <h3 class="property-box-title"><a href="#"><?php echo $row['state']; ?></a></h3>
            <h4 class="property-box-subtitle"><a href="#"><?php echo $row['city']; ?></a></h4>
            <div class="property-box-label property-box-label-primary"><?php echo $row['status']; ?></div><!-- /.property-box-label -->

            <div class="property-box-picture">
                <div class="property-box-price">$ <?php echo $row['prize']; if($row['status']=='rent'){ echo '/month';} ?></div><!-- /.property-box-price -->
                <div class="property-box-picture-inner">
                    <a href="#" class="property-box-picture-target">
                        <img src="<?php echo base_url(); ?>assets/img/tmp/properties/medium/5.jpg" alt="">
                    </a><!-- /.property-box-picture-target -->
                </div><!-- /.property-picture-inner -->
            </div><!-- /.property-picture -->
        </div><!-- /.property-box-inner -->
    </div><!-- /.property-box -->
</li>
<?php
}
?>


</ul>
</div><!-- /.block-content-inner -->
</div><!-- /.block-content -->                <!-- STATISTICS -->
<div class="block-content block-content-small-padding">
    <div class="block-content-inner">
        <div class="center">
            <h2 class="color-primary">Over <?php echo $total; ?> Properties In Our Directory</h2>
        </div><!-- /.center -->

        <div class="row">
            <div class="col-sm-2 col-sm-offset-2">
                <div class="block-stats background-dots background-primary color-white">
                    <strong>2</strong>
                    <span>Apartments</span>
                </div><!-- /.block-stats -->
            </div>
            <div class="col-sm-2">
                <div class="block-stats background-dots background-primary color-white">
                    <strong>3+</strong>
                    <span>Houses</span>
                </div><!-- /.block-stats -->
            </div>
            <div class="col-sm-2">
                <div class="block-stats background-dots background-primary color-white">
                    <strong>5+</strong>
                    <span>Condos</span>
                </div><!-- /.block-stats -->
            </div>
            <div class="col-sm-2">
                <div class="block-stats background-dots background-primary color-white">
                    <strong>6+</strong>
                    <span>Areas</span>
                </div><!-- /.block-stats -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->                <!-- HEXS -->
<div class="block-content fullwidth background-primary background-map clearfix">
    <div class="block-content-inner row">
        <div class="hex-wrapper col-sm-4 center">
            <div class="clearfix">
                <div class="hex col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="hex-inner">
                        <img src="assets/img/hex.png" alt="" class="hex-image">

                        <div class="hex-content">
                            <i class="fa fa-group"></i>
                        </div><!-- /.hex-content -->
                    </div><!-- /.hex-inner -->
                </div><!-- /.hex -->
            </div><!-- /.clearfix -->

            <h3>15 000+ Satisfied Users</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur diping elit. Curabitur non gravida nisi. Nam vel magna
            </p>

            <a class="btn btn-white" href="#">More</a>
        </div>

        <div class="hex-wrapper col-sm-4 center">
            <div class="clearfix">
                <div class="hex col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="hex-inner">
                        <img src="assets/img/hex.png" alt="" class="hex-image">

                        <div class="hex-content">
                            <i class="fa fa-search"></i>
                        </div><!-- /.hex-content -->
                    </div><!-- /.hex-inner -->
                </div><!-- /.hex -->
            </div><!-- /.clearfix -->

            <h3>Smart Property Search</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur diping elit. Curabitur non gravida nisi. Nam vel magna
            </p>

            <a class="btn btn-white" href="#">More</a>
        </div>

        <div class="hex-wrapper col-sm-4 center">
            <div class="clearfix">
                <div class="hex col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="hex-inner">
                        <img src="assets/img/hex.png" alt="" class="hex-image">

                        <div class="hex-content">
                            <i class="fa fa-compass"></i>
                        </div><!-- /.hex-content -->
                    </div><!-- /.hex-inner -->
                </div><!-- /.hex -->
            </div><!-- /.clearfix -->

            <h3>We Are Here To Help You</h3>

            <p>
                Lorem ipsum dolor sit amet, consectetur diping elit. Curabitur non gravida nisi. Nam vel magna
            </p>

            <a class="btn btn-white" href="#">More</a>
        </div>
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->            </div><!-- /.container -->
        </div><!-- /#main-inner -->
    </div><!-- /#main -->
</div><!-- /#main-wrapper -->


<script type="text/javascript">
    $(document).ready(function(){
        $("#select-country").change(function(){
            var id=$("#select-country").val();
            $.ajax({
                url: '<?php echo base_url('home/get_state');?>',
                type: 'POST',
                data: {"id":id},
                success: function(data){
                    $("#state").html(data);
                },
                error: function(errorThrown ){
                    console.log( errorThrown );
                }
            });
        });
    });

    $(document).ready(function(){
        $("#state").change(function(){
            var id=$("#state").val();
            $.ajax({
                url: '<?php echo base_url('home/get_city');?>',
                type: 'POST',
                data: {"id":id},
                success: function(data){
                    $("#city").html(data);
                },
                error: function(errorThrown ){
                    console.log( errorThrown );
                }
            });

        });


    });

</script>