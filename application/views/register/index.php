<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<style type="text/css">
    .error{
        color:red;
    }
</style>
<script>
$(document).ready(function(){
    $("#form").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo:"#password"
            }
        },
    
        messages: {
            first_name: {
                required: "Please Enter First Name"
            },
            last_name: {
                required: "Please Enter Last Name"
            },
            email: {
                required: "Please Enter email",
                email: "Please Enter valid email"
            },
            password: {
                required: "Please Enter password",
                minlength: "Please minimum 5 digits"
            },
            confirm_password: {
                required: "Please Enter password",
                minlength:"Please minimum 5 digits",
                equalTo:"Password is not matches"
            }
        },
        submitHandler: function(form) {
          form.submit();
        }
  });
});
</script>
 <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <h2 class="center">Register</h2>

                                    <div class="box">
                                        <form method="post" id="form" name="form" action="<?php echo base_url('register'); ?>">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" name="email" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Last name</label>
                                                <input type="text" name="last_name" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <input type="submit" value="Register" class="btn btn-primary btn-inversed btn-block">
                                            </div><!-- /.form-group -->
                                        </form>
                                    </div><!-- /.box -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->