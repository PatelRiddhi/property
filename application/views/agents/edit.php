<script src="<?php echo base_url('assets/js/ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.wallform.js"></script>
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
            profile:{
                required: true
            },
            post: {
                required: true
            },
            current_status: {
                required: true
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
            email:{
                required:true,
                email: true
            },
            contact_no: {
                required:true,
                minlength:10,
                maxlength:10,
                digits: true
            },
        },
    
        messages: {
            first_name: {
                required: "Please Enter First Name"
            },
            last_name: {
                required: "Please Enter Last Name"
            },
            profile: {
                required: "Please Choose Profile"
            },
            post: {
                required: "Please Enter Post"
            },
            current_status: {
                required: "Please Enter current status"
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
            email: {
                required: "Please Enter email",
                email: "Please Enter valid email"
            },
            contact_no: {
                required: "Please Enter mobile number",
                minlength:"Please Enter 10 digit mobile number",
                maxlength:"Please Enter 10 digit mobile number",
                number: "Please Enter number"
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
                            <h2 class="center">Add New Agent</h2>

                            <form method="post" name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url('agents/manage'); ?>">
                                <div class="box">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control">
                                        </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control">
                                    </div><!-- /.form-group -->
                                </div><!-- /.box -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>Contact</h3>
                                        <div class="box">
                                            <div class="form-group">
                                                <label>Post</label>
                                                    <input type="text" name="post" id="post" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Current Status</label>
                                                <div class="select-wrapper">
                                                   <select id="current_status" name="current_status" class="form-control" required>
                                                        <option value="">--Select Status--</option>
                                                        <option value="retire">Retire</option>
                                                        <option value="elite">Elite</option>                      
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" id="email" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Contact No</label>
                                                <input type="text" name="contact_no" id="contact_no" class="form-control">
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <h3>Social Networks</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Facebook URL*</label>
                                                <input type="text" name="facebook_url" id="facebook_url" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Twitter URL*</label>
                                                <input type="text" name="twitter_url" id="twitter_url" class="form-control">
                                            </div><!-- /.form-group -->

                                           <div class="form-group">
                                                <label>Linkedin URL*</label>
                                                <input type="text" name="linkedin_url" id="linkedin_url" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Vimeo-Square URL*</label>
                                                <input type="text" name="vimeo_square_url" id="vimeo_square_url" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>YouTube URL*</label>
                                                <input type="text" name="youtube_url" id="youtube_url" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Google+ URL*</label>
                                                <input type="text" name="google_plus_url" id="google_plus_url" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Skype ID*</label>
                                                <input type="text" name="skype_id" id="skype_id" class="form-control">
                                            </div><!-- /.form-group -->
                                        </div><!-- /.box -->
                                    </div><!-- /.col-sm-4 -->

                                    <div class="col-sm-4">
                                        <h3>Passwords</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Profile</label>                        
                                                    
                                                <input type="file" name="profile" id="profile" onchange="loadFile(event)" class="form-control">
                                                <img id="preview" height="100" width="100" />
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <label>password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                            </div><!-- /.form-group -->


                                        </div><!-- /.box -->
                                   </div><!-- /.col-sm-4 -->                              
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

<script type="text/javascript">
    var loadFile = function(event) 
    {
        var preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
    };
    
</script>




