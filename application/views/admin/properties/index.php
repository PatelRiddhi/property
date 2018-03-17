
<script type="text/javascript">
        $(document).ready(function() {

            // Search
            $("#search").click(function(){
                var m_name = $("#search_box").val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('admin/properties/search'); ?>',
                    data: {member_name:m_name},
                    cache: true,
                    datatype: 'html',
                    success: function(result)
                    {
                        $("#search_box").val(m_name);
                        $('.data').html(result);  
                     //   alert(result);                          
                    }
                });
            });

        } );
       
</script>
<div class="row">
          <div class="col-lg-12">
            <h2>MANAGE PROPERTIES</h2>
          <div class="row">
            <div class="col-lg-6">
              <p>
                <a href="<?php echo base_url('admin/properties/add/'); ?>" class="btn btn-primary">Add New</a>
                <form id="checkboxdata" method="post" >
            </div>
            <div class="col-lg-12 pull-right">
                <button type="button" name="search" class="btn btn-sm btn-default pull-right" id="search" ><i class="fa fa-search"></i></button>
                <input type="text" name="table_search" id="search_box" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                
              </form>    
              </p>
            </div>
          </div>
            <div class="table-responsive">
             <form method="post" action="<?php echo base_url('admin/properties/delete/');?>">
               <button type="submit" class="btn btn-danger" name="delete_all" id="delete_all" onclick="return confirm('Are you sure you want to delete these data?');">Delete All</button>
              <table class="table table-hover tablesorter" id="example">
                  <tr>
                   <th><input type="checkbox" id="ckbCheckAll" ></th> 
                    <th>Sr. No. <i class="fa fa-sort"></i></th>
                    <th>Title <i class="fa fa-sort"></i></th>
                    <th>Price <i class="fa fa-sort"></i></th>
                    <th>Area</th>
                    <th>City </th>
                    <th>State </th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Thumbnail </th>
                    <th>Action</th> 
                  </tr>
                <tbody>
<?php
foreach ($properties as $row) 
{
?>   
                <tr>
                    <td><input type="checkbox" class="checkbBoxClass" id="select" name="select[]" value="<?php echo $row['id'] ?>"></td>
                    <td><?php echo $start+1;  $start++; ?></td>
                    <td><?php echo ucfirst($row['title']); ?></td>
                   	<td>$ <?php if($row['status'] == 'rent')
                            { echo $row['prize']."/month"; } 
                            else 
                            {
                                echo $row['prize'];
                            }?>
                    </td>
                    <td><?php echo ($row['area']); ?></td>
                    <td><?php echo ucfirst($row['city']); ?></td>
                    <td><?php echo ucfirst($row['state']); ?></td>
                    <td><?php echo ucfirst($row['country']); ?></td>
                    <td><?php if($row['status'] == 'rent')
                              { 
                                  echo ucfirst($row['status']);; 
                              } 
                              else 
                              {
                                  echo $row['prize'];
                              }?>

                     ?></td>
                    <td><img src="<?php echo base_url($row['thumbnail']); ?>" height="80" width="80"></img></td>
                    <td><a href= "<?php echo base_url('admin/properties/edit/').$row['id'];?>" > Edit </a> |
                    <a href= "<?php echo base_url('admin/properties/delete/').$row['id'];?>" onclick="return confirm('Are you sure you want to delete this data?');">  Delete </a> |
                    <a href= "<?php echo base_url('admin/properties/more/').$row['id'];?>"  > More </a></td> 
                  </tr>
<?php
			
        }
?>
                </tbody>
              </table>
            </form>
              <ul class="pagination pagination-sm m-b-10 m-t-10 pull-right">
                  <li><?php echo $links; ?></li>
              </ul>
            </div>
          </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#delete_all').hide();
    $('input[type=checkbox]').change(function(){
      var total=$('input[name="select[]"]:checked').length;
      if(total>0)
      {
          $('#delete_all').show();
      }
      else
      {
           $('#delete_all').hide();
      }
    });
    
  });
</script>