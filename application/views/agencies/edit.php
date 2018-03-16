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
            }
        },
    
        messages: {
            title: {
                required: "Please Enter mobile number"
            },
            description: {
                required: "Please Enter mobile number"
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
                            <h2 class="center">Edit Agency Profile</h2>

                            <form method="post" id="form" action="<?php echo base_url('agencies/manage/').$agency['id']; ?>" enctype="multipart/form-data">
                                <div class="box">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" id="title" name="title" value="<?php echo ucfirst($agency['title']); ?>" class="form-control">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="6"><?php echo $agency['description']; ?></textarea>
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
                                                <textarea class="form-control" id="address" name="address" rows="4"> <?php echo $agency['address']; ?></textarea>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" name="website" id="website" value="<?php echo $agency['website']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Mobile No.</label>
                                                <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $agency['mobile_no']; ?>" class="form-control">
                                            </div><!-- /.form-group -->
                                        </div><!-- /.box -->
                                    </div>     

                                    <div class="col-sm-4">
                                        <h3>Social sites</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Facebook URL</label>
                                                <input type="text" name="facebook_url" id="facebook_url" value="<?php echo $agency['facebook_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Twitter URL</label>
                                                <input type="text" name="twitter_url" id="twitter_url" value="<?php echo $agency['twitter_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                           <div class="form-group">
                                                <label>Linkedin URL</label>
                                                <input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo $agency['linked_in_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Google+ URL</label>
                                                <input type="text" name="google_plus_url" id="google_plus_url" value="<?php echo $agency['google_plus_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Vimeo-Square URL</label>
                                                <input type="text" name="vimeo_square_url" id="vimeo_square_url" value="<?php echo $agency['vimeo-square_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>YouTube URL</label>
                                                <input type="text" name="youtube_url" id="youtube_url" value="<?php echo $agency['youtube_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->
                                        </div><!-- /.box -->
                                    </div>            

                                    <div class="col-sm-4">
                                        <h3>Social sites</h3>

                                        <div class="box">
                                            <!-- <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div><!-- /.form-group -->

                                            <!-- <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                            </div><!-- /.form-group -->
                                     <div class="form-group">
                                                <label>Profile</label>
                                                <input type="file" name="profile" id="profile" onchange="loadFile(event)" class="form-control">
                                                <input type="hidden" name="old_profile" value="<?php echo $agency['profile']; ?>">
                                                <img id="preview" src="<?php echo base_url().$agency['profile']; ?>" height="100" width="100" />
                                        
                                            </div><!-- /.form-group -->


                                        </div><!-- /.box -->
                                    </div>            
                                </div><!-- /.row -->


                               
                                <div class="form-group center">
                                    <input type="submit" value="Submit" id="submit" class="btn btn-inversed btn-primary">
                                     <a class="btn btn-inversed btn-primary" href="<?php echo base_url('agencies/cancel');?>">Cancel</a>
                                </div><!-- /.form-group -->
                            </form>
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->
<script type="text/javascript">
    var loadFile = function(event) 
    {
        var preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
    };
    
</script>
