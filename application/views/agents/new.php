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
                required: true,
                digits:true
            },
            post: {
                required: true
            },
            current_status: {
                required: true,
                digits:true
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
                required:true
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
                            <h2 class="center">Submit Agents</h2>

                            <form method="post" name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url('agencies/property'); ?>">
                                <div class="box">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <label>First Name</label>
                                        <input type="text" name="last" id="first_name" class="form-control">
                                    </div><!-- /.form-group -->
                                </div><!-- /.box -->
                                <h3>Amenities</h3>

                                <div class="box clearfix">
                                    <ul class="submit-property-list list-unstyled">
<?php
    foreach ($aminities as $row) 
    {
?>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox" name="aminities[]" value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></label></li>
<?php
    }
?>
                                    </ul>
                                </div><!-- /.box -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="box">
                                            <div class="form-group">
                                                <label>Profile</label>                        
                                                    
                                                    <input type="file" name="profile[]" id="profile" onchange="loadFile(event)" class="form-control">
                                                    <img id="preview" height="100" width="100" />
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="box">
                                            <div class="form-group">
                                                <label>Gallery</label>
                                                <div id='galleries'></div>
                                                <div id='imageloadstatus' style='display:none'><img src="<?php echo base_url();?>assets/img/loader.gif" alt="Uploading...."/></div>
                                                <div id='imageloadbutton'>
                                                <input type="file" name="photoimg[]" id="photoimg" multiple="multiple"/>
                                                </div> 
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>Location</h3>
                                        <div class="box">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" id="address" name="address"rows="3"></textarea>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Country</label>
                                                <div class="select-wrapper">
                                                   <select id="select-country" name="country" class="form-control" required>
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
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>State</label>
                                                <div class="select-wrapper">
                                                    <select id="state" name="state" class="form-control" required>       
                                                    </select>
                                                </div><!-- /.select-wrapper -->
                                            </div>

                                            <div class="form-group">
                                                <label>City</label>
                                                 <div class="select-wrapper">
                                                    <select id="city" name="city" class="form-control" required>
                                                    </select>
                                                </div><!-- /.select-wrapper -->
                                            </div>

                                            <div class="form-group">
                                                <label>Property Type</label>
                                                 <div class="select-wrapper">
                                                    <select id="property_type" name="property_type" class="form-control" required>
                                                         <option value="-1">--Select Type--</option>
<?php
    foreach($type as $row)
    {
?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
<?php
    }
?>
                                                    </select>
                                                </div><!-- /.select-wrapper -->
                                            </div>

                                            <div class="form-group">
                                                <label>Status</label>
                                                 <div class="select-wrapper">
                                                    <select id="status" name="status" class="form-control" required>
                                                        <option value="-1">--Select Status--</option>
                                                        <option value="sale">Sale</option>
                                                        <option value="rent">Rent</option>
                                                    </select>
                                                </div><!-- /.select-wrapper -->
                                            </div>
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

                                        </div><!-- /.box -->
                                    </div><!-- /.col-sm-4 -->

                                    <div class="col-sm-4">
                                        <h3>Details</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Beds*</label>
                                                <input type="number" name="beds" id="beds" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Bath*</label>
                                                <input type="number" name="bath" id="bath" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Garages*</label>
                                                <input type="number" name="garages" id="garages" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Area</label>
                                                <input type="text" name="area" id="area" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="prize" id="prize" class="form-control">
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




