
<script type="text/javascript">
        $(document).ready(function() {

            // Search
            $("#search").click(function(){
                var m_name = $("#search_box").val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('admin/agencies/search'); ?>',
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
            <h2>MANAGE AGENCIES</h2>
          <div class="row">
            <div class="col-lg-6">
              <p>
                <form id="checkboxdata" method="post" >
            </div>
            <div class="col-lg-12 pull-right">
                <input type="text" name="table_search" id="search_box" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                <button type="button" name="search" class="btn btn-sm btn-default pull-right" id="search" ><i class="fa fa-search"></i></button>
              </form>    
              </p>
            </div>
          </div>
            <div class="table-responsive">
             <form method="post" action="<?php echo base_url('admin/agencies/delete/');?>">
               <button type="submit" class="btn btn-danger" name="delete_all" id="delete_all" onclick="return confirm('Are you sure you want to delete these data?');">Delete All</button>
              <table class="table table-hover tablesorter" id="example">
                  <tr>
                   <th><input type="checkbox" id="ckbCheckAll" ></th> 
                    <th>Sr. No. <i class="fa fa-sort"></i></th>
                    <th>Title <i class="fa fa-sort"></i></th>
                    <th>Website</th>
                    <th>Email</th>
                    <th>Profile </th>
                    <th>Approval</th>
                    <th>Action</th> 
                  </tr>
                <tbody>
<?php
foreach ($agencies as $row) 
{
?>   
                <tr>
                    <td><input type="checkbox" class="checkbBoxClass" id="select" name="select[]" value="<?php echo $row['id'] ?>"></td>
                    <td><?php echo $start+1;  $start++; ?></td>
                    <td><?php echo ucfirst($row['title']); ?></td>
                   	<td><a href="<?php echo $row['website']; ?>" target='blank'><?php echo $row['website']; ?></a></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['mobile_no']; ?></td>
                    <td></td>
                    <td><img src="<?php echo base_url($row['profile']); ?>" height="80" width="80"></img></td>
                    <td><a href= "<?php echo base_url('admin/agencies/edit/').$row['id'];?>" > Edit </a> |
                    <a href= "<?php echo base_url('admin/agencies/delete/').$row['id'];?>" onclick="return confirm('Are you sure you want to delete this data?');">  Delete </a> |
                    <a href= "<?php echo base_url('admin/agencies/more/').$row['id'];?>"  > More </a></td> 
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
