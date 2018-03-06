
<!doctype html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libraries/font-awesome/css/font-awesome.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/libraries/jquery-bxslider/jquery.bxslider.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?><?php echo base_url(); ?>assets/libraries/flexslider/flexslider.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/realocation.css" media="screen, projection" id="css-main">

    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">

    <title>
        Realocation | Modern Real Estate Template
    </title>
</head>

<body>
<?php
$CI = &get_instance(); 
$CI->load->model('settings_model');
$setting_data = $CI->settings_model->get_by_id('1');
$page = $this->uri->segment(1); ?>
<div id="wrapper">
    <div id="header-wrapper">
        <div id="header">
    <div id="header-inner">
        <div class="header-bar">
            <div class="container">
                <div class="header-infobox">
                    <strong>E-mail:</strong> <a href="#"></a><?php echo $setting_data['email']; ?></a>
                </div><!-- /.header-infobox-->

                <div class="header-infobox">
                    <strong>Phone:</strong><?php echo $setting_data['phone_no']; ?>
                </div><!-- /.header-infobox-->

                <ul class="header-bar-nav nav nav-register">
    <li><a href="login.html">Login</a></li>
    <li><a href="register.html">Register</a></li>
    <li><a href="renew-password.html">Renew Password</a></li>
</ul>            </div><!-- /.container -->
        </div><!-- /.header-bar -->

        <div class="header-top">
            <div class="container">
                <div class="header-identity">
                    <a href="<?php echo base_url(); ?>" class="header-identity-target">
                        <span class="header-icon"><i class="fa fa-home"></i></span>
                        <span class="header-title">Realocation</span><!-- /.header-title -->
                        <span class="header-slogan">Real Estate &amp; Rental <br> Bussiness Template</span><!-- /.header-slogan -->
                    </a><!-- /.header-identity-target-->
                </div><!-- /.header-identity -->

                <div class="header-actions pull-right">
                    <a href="create-agency.html" class="btn btn-regular">Create Agency Profile</a> <strong class="separator">or</strong> <a href="submit-property.html" class="btn btn-primary"><i class="fa fa-plus"></i>Submit Property</a>
                </div><!-- /.header-actions -->

                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".header-navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- /.container -->
        </div><!-- .header-top -->

        <div class="header-navigation">
            <div class="container">
                <div class="row">
                    <ul class="header-nav nav nav-pills">
    <li >
        <a <?php if($page=='' || $page=='home') echo 'class="active"';  ?> href="<?php echo base_url(); ?>">Home</a>
    </li>

    <li>
        <a  <?php if($page=='properties') echo 'class="active"';  ?> href="<?php echo base_url(); ?>properties/">Properties</a>
    </li>

    <li>
        <a <?php if($page=='agencies') echo 'class="active"';  ?> href="<?php echo base_url(); ?>agencies/">Agencies</a>
    </li>

    <li>
        <a <?php if($page=='agents') echo 'class="active"';  ?> href="<?php echo base_url(); ?>agents/">Agents</a>
    </li>

</ul><!-- /.header-nav -->
                    <div class="form-search-wrapper col-sm-3">
                        <form method="post" action="?" class="form-horizontal form-search">
                            <div class="form-group has-feedback no-margin">
                                <input type="text" class="form-control" placeholder="Search">

                                <span class="form-control-feedback">
                                    <i class="fa fa-search"></i>
                                </span><!-- /.form-control-feedback -->
                            </div><!-- /.form-group -->
                        </form>
                    </div>
                </div>
            </div><!-- /.container -->
        </div><!-- /.header-navigation -->
    </div><!-- /.header-inner -->
</div><!-- /#header -->    </div><!-- /#header-wrapper -->

<?php
echo $content;
?>
<div class="row">
    <div class="col-sm-9">
        <ul class="footer-nav nav nav-pills">
            <li><a href="#">Home</a></li>
            <li><a href="#">Properties</a></li>
            <li><a href="#">Agents</a></li>
            <li><a href="#">Agencies</a></li>
            <li><a href="#">Contact</a></li>
        </ul><!-- /.footer-nav -->
    </div>

    <div class="col-sm-3">
        <form method="post" action="?" class="form-horizontal form-search">
            <div class="form-group has-feedback no-margin">
                <input type="text" class="form-control" placeholder="Search">

                                        <span class="form-control-feedback">
                                            <i class="fa fa-search"></i>
                                        </span><!-- /.form-control-feedback -->
            </div><!-- /.form-group -->
        </form>
    </div>
</div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.footer-top -->
                <div class="footer-bottom">
                    <div class="container">
                        <p class="center no-margin">
                            &copy; <?php echo date('Y'); ?>  Your Company, All Right reserved
                        </p>

                        <div class="center">
                            <ul class="social">
                                <li><a href="<?php echo $setting_data['facebook_url']; ?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?php echo $setting_data['twitter_url']; ?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?php echo $setting_data['linked_in_url']; ?>"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="<?php echo $setting_data['flickr_url']; ?>"><i class="fa fa-flickr"></i></a></li>
                                <li><a href="<?php echo $setting_data['pinterest_url']; ?>"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="<?php echo $setting_data['youtube_url']; ?>"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="<?php echo $setting_data['google_plus_url']; ?>"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="<?php echo $setting_data['vimeo-square_url']; ?>"><i class="fa fa-vimeo-square"></i></a></li>
                                <li><a href="<?php echo $setting_data['dribbble_url']; ?>"><i class="fa fa-dribbble"></i></a></li>
                            </ul><!-- /.social -->
                        </div><!-- /.center -->
                    </div><!-- /.container -->
                </div><!-- /.footer-bottom -->
            </div><!-- /#footer-inner -->
        </div><!-- /#footer -->
    </div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/isotope/jquery.isotope.min.js"></script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=true"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/gmap3.infobox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/gmap3.clusterer.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/map.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/bootstrap-sass/vendor/assets/javascripts/bootstrap/transition.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/bootstrap-sass/vendor/assets/javascripts/bootstrap/collapse.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/jquery-bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/libraries/flexslider/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.chained.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/realocation.js"></script>

</body>
</html>