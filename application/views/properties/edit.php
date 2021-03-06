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
            title: {
                required: true
            },
            description: {
                required: true
            },
            area:{
                required: true,
                digits:true
            },
            address: {
                required: true
            },
            prize: {
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
            }
        },
    
        messages: {
            title: {
                required: "Please Enter title"
            },
            description: {
                required: "Please Enter Description"
            },
            area:{
                required: "Please Enter Area",
                digits:"Please enter digits"
            },
            address: {
                required: "Please Enter Address"
            },
            prize: {
                required: "Please Enter Price"
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
                            <h2 class="center">Update Property</h2>

                            <form method="post" name="form" id="form" enctype="multipart/form-data" action="<?php echo base_url('properties/manage/').$property['id']; ?>">
                                <div class="box">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" id="title" value="<?php echo $property['title']; ?>"class="form-control">
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" id="description" name="description" value="<?php echo $property['description']; ?>" rows="4"><?php echo $property['description']; ?></textarea>
<script>
      CKEDITOR.plugins.addExternal( 'timestamp', 'https://sdk.ckeditor.com/samples/assets/plugins/timestamp/', 'plugin.js' );
      CKEDITOR.replace( 'description', {
      extraPlugins: 'timestamp'
    } );
    </script>
                                    </div><!-- /.form-group -->
                                </div><!-- /.box -->
                                <h3>Amenities</h3>

                                <div class="box clearfix">
                                    <ul class="submit-property-list list-unstyled">
<?php
    foreach ($aminities as $row) 
    {
?>
                                        <li class="checkbox col-sm-3"><label><input type="checkbox" name="aminities[]" value="<?php echo $row['id'];?>" <?php if(in_array($row['id'], $property['aminities'])){ echo "checked"; } ?> ><?php echo $row['name']; ?></label></li>
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
                                                    <input type="hidden" name="old_profile" value="<?php echo $property['thumbnail']; ?>">
                                                    <img id="preview" src="<?php echo base_url().$property['thumbnail']; ?>" height="100" width="100" />
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="box">
                                            <div class="form-group">
                                                <label>Gallery</label>
                                                <div id='galleries'>
                                                    
                                                    <?php
                                                    foreach ($property['images'] as $key=>$value) 
                                                    {
                                                    ?>
                                                    <img src="<?php echo base_url().$value; ?>" height="100" width="100" data-id="<?php echo $key; ?>" id="remove_image"></img>
                                                    <?php
                                                    }
                                                    ?>
                                                
                                                </div>
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
                                                <textarea class="form-control" id="address" value="" name="address" rows="3"><?php echo $property['address']; ?></textarea>
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
                                                        <option value="<?php echo $country['name']; ?>" <?php if($country['name']== $property['country']){echo "selected";}?>><?php echo ucfirst($country['name']); ?></option>
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
                                                    <option value="<?php echo $property['state']; ?>" selected><?php echo ucfirst($property['state']); ?></option>     
                                                    </select>
                                                </div><!-- /.select-wrapper -->
                                            </div>

                                            <div class="form-group">
                                                <label>City</label>
                                                 <div class="select-wrapper">
                                                    <select id="city" name="city" class="form-control" required>
                                                        <option value="<?php echo $property['city']; ?>" selected><?php echo ucfirst($property['city']); ?></option>     
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
                                                        <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$property['pro_type_id']){ echo "selected"; } ?>><?php echo $row['name']; ?></option>
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
                                                        <option value="sale" <?php if($property['status'] == 'sale'){ echo "selected"; }?>>Sale</option>
                                                        <option value="rent" <?php if($property['status'] == 'rent'){ echo "selected"; }?>>Rent</option>
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
                                                <input type="text" name="facebook_url" id="facebook_url" value="<?php echo $property['facebook_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Twitter URL*</label>
                                                <input type="text" name="twitter_url" id="twitter_url" value="<?php echo $property['twitter_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                           <div class="form-group">
                                                <label>Linkedin URL*</label>
                                                <input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo $property['linked_in_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Vimeo-Square URL*</label>
                                                <input type="text" name="vimeo_square_url" id="vimeo_square_url" value="<?php echo $property['vimeo-square_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>YouTube URL*</label>
                                                <input type="text" name="youtube_url" id="youtube_url" value="<?php echo $property['you_tube_url']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                        </div><!-- /.box -->
                                    </div><!-- /.col-sm-4 -->

                                    <div class="col-sm-4">
                                        <h3>Details</h3>

                                        <div class="box">
                                            <div class="form-group">
                                                <label>Beds*</label>
                                                <input type="number" name="beds" id="beds" value="<?php echo $property['beds']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Bath*</label>
                                                <input type="number" name="bath" id="bath" value="<?php echo $property['bath']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Garages*</label>
                                                <input type="number" name="garages" id="garages" value="<?php echo $property['garages']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Area</label>
                                                <input type="text" name="area" id="area" value="<?php echo $property['area']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" name="prize" id="prize" value="<?php echo $property['prize']; ?>" class="form-control">
                                            </div><!-- /.form-group -->

                                        </div><!-- /.box -->
                                   </div><!-- /.col-sm-4 -->                              
                                </div><!-- /.row -->
                                
                                <div class="form-group center">
                                    <input type="submit" value="Update" id="submit" class="btn btn-inversed btn-primary">
                                    <a class="btn btn-inversed btn-primary" href="<?php echo base_url('properties/cancel');?>">Cancel</a>
                                </div><!-- /.form-group -->
                            </form>
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->

<script type="text/javascript">

    $(document).ready(function(){ 
        $('#photoimg').die('click').live('change', function() { 
        var ins = document.getElementById('photoimg').files.length;
        for (var x = 0; x < ins; x++)
        {
            var tmp=URL.createObjectURL(this.files[x]);
            $("#galleries").append("<img src="+tmp+" height=100 width=100>&nbsp;");
            //alert(URL.createObjectURL(this.files[x]));
        }
                  //$("#preview").html(''); 
        $("#form").ajaxForm({
                            target: '#galleries', 
                            beforeSubmit:function()
                            { 
                                console.log('v');
                                $("#imageloadstatus").show();
                                $("#imageloadbutton").hide();
                            }, 
                            success:function()
                            { 
                                console.log('z');
                                $("#imageloadstatus").hide();
                                $("#imageloadbutton").show();
                            }, 
                            error:function()
                            { 
                                console.log('d');
                                $("#imageloadstatus").hide();
                                $("#imageloadbutton").show();
                            } 
                        });
        });
    }); 

    $(document).ready(function(){
        $("#select-country").change(function(){
            var name=$("#select-country").val();
            $.ajax({
                url: '<?php echo base_url('home/get_state');?>',
                type: 'POST',
                data: {"name":name},
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
            var name=$("#state").val();
            $.ajax({
                url: '<?php echo base_url('home/get_city');?>',
                type: 'POST',
                data: {"name":name},
                success: function(data){
                    $("#city").html(data);
                },
                error: function(errorThrown ){
                    console.log( errorThrown );
                }
            });
        });

    });

    $(document).ready(function(){
        $('img[data-id]').each(function(index,ele){
            $(ele).click(function(){
               var id = $(this).attr('data-id');
               if(confirm('Are you sure you want to delete these image?'))
               {
                    $.ajax({
                    url: '<?php echo base_url('properties/delete_image');?>',
                    type: 'POST',
                    data: {"id":id},
                    success: function(data){
                        $('img[data-id=]'+id).remove();
                    },
                    error: function(errorThrown ){
                        console.log( errorThrown );
                    }
                    });
                }
            });
        });
        });
        

    
</script>




