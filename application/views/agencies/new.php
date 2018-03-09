<script src="<?php echo base_url('assets/js/ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script> -->
<style type="text/css">
    .error{
        color:red;
    }
</style>
<script>
$(document).ready(function(){
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
    $("#form").validate({
    // Specify validation rules
        rules: {
            title: {
                required: true
            },
            description: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            website: {
                required: true
            },
            mobile_no: {
                required:true,
                minlength:10,
                maxlength:10,
                digits: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo:"#password"
            },
            profile: {
                required: true
            }
        },
    
        messages: {
            title: {
                required: "Please Enter mobile number"
            },
            description: {
                required: "Please Enter mobile number"
            },
            email: {
                required: "Please Enter email",
                email: "Please Enter valid email"
            },
            website: {
                required: "Please Enter mobile number"
            },
            mobile_no: {
                required: "Please Enter mobile number",
                minlength:"Please Enter 10 digit mobile number",
                maxlength:"Please Enter 10 digit mobile number",
                number: "Please Enter number"
            },
            password: {
                required: "Please Enter password",
                minlength: "Please minimum 5 digits"
            },
            confirm_password: {
                required: "Please Enter password",
                minlength:"Please minimum 5 digits",
                equalTo:"Password is not matches"
            },
            profile: {
                required: "Please Enter mobile number"
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
                            <h2 class="center">Create Agency</h2>

                            <form method="post" id="form" enctype="multipart/form-data">
                                <div class="box">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" id="title" name="title" class="form-control">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="6"></textarea>
                                        <script>
      CKEDITOR.plugins.addExternal( 'timestamp', 'https://sdk.ckeditor.com/samples/assets/plugins/timestamp/', 'plugin.js' );
      CKEDITOR.replace( 'description', {
      extraPlugins: 'timestamp'
    } );
    </script>
                                    </div><!-- /.form-group -->
                                </div><!-- /.box -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>Contact</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" id="address" name="address"rows="4"></textarea>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" name="email" id="email" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" name="website" id="website" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Mobile No.</label>
                                                <input type="text" name="mobile_no" id="mobile_no" class="form-control">
                                            </div><!-- /.form-group -->
                                        </div><!-- /.box -->
                                    </div>     

                                    <div class="col-sm-4">
                                        <h3>Social sites</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Facebook URL</label>
                                                <input type="text" name="facebook_url" id="facebook_url" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Twitter URL</label>
                                                <input type="text" name="twitter_url" id="twitter_url" class="form-control">
                                            </div><!-- /.form-group -->

                                           <div class="form-group">
                                                <label>Linkedin URL</label>
                                                <input type="text" name="linkedin_url" id="linkedin_url" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Google+ URL</label>
                                                <input type="text" name="google_plus_url" id="google_plus_url" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Vimeo-Square URL</label>
                                                <input type="text" name="vimeo_square_url" id="vimeo_square_url" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>YouTube URL</label>
                                                <input type="text" name="youtube_url" id="youtube_url" class="form-control">
                                            </div><!-- /.form-group -->
                                        </div><!-- /.box -->
                                    </div>            

                                    <div class="col-sm-4">
                                        <h3>Social sites</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                               <div id='preview'></div>
                                            </div><!-- /.form-group -->


                                           <div class="form-group">
                                                <label>Profile</label>
                                                <!-- <div id='preview'></div>
                                                <div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
                                                <div id='imageloadbutton'> -->
                                                    <input type="file" name="profile" id="profile" />
                                               <!--  </div> -->
                                        
                                            </div><!-- /.form-group -->

                                        </div><!-- /.box -->
                                    </div>            
                                </div><!-- /.row -->


                               
                                <div class="form-group center">
                                    <input type="submit" value="Submit" id="submit" class="btn btn-inversed btn-primary">
                                </div><!-- /.form-group -->
                            </form>
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->