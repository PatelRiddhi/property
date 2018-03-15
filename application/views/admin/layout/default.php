<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/admin/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo base_url(); ?>assets/css/admin/sb-admin.css" rel="stylesheet">
   
    <!-- Page Specific CSS -->
    <script src="<?php echo base_url(); ?>assets/js/admin/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 </head>

 <body>
    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('admin/dashboard'); ?>">SB Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="<?php echo base_url('admin/dashboard'); ?>"> Dashboard</a></li>

            <li><a href="<?php echo base_url('admin/properties'); ?>"><i class="fa fa-user"></i> Properties</a></li>
            <li><a href="<?php echo base_url('admin/agencies'); ?>"><i class="fa fa-user"></i> Agencies</a></li>
        </ul>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-user"></i><?php echo "Welcome  ".$this->session->userdata('username'); ?></a><br>
            <li class="divider"></li>
              <a href="<?php echo base_url('admin/login/logout'); ?>"><i class="fa fa-power-off"></i>LOGOUT</a>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <div id="page-wrapper">
<?php
        if(!$content =='')
        {
            echo $content;
        }
?>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/admin/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin/morris/chart-data-morris.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin/tablesorter/jquery.tablesorter.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin/tablesorter/tables.js"></script>
    
  </body>
</html>
<script type="text/javascript">
$("#ckbCheckAll").click(function () {
    $(".checkbBoxClass").prop('checked', $(this).prop('checked'));
});
</script>
