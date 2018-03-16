<style type="text/css">
    .anchor{
        color: black;
    }
    .topright {
    position: absolute;
    top: 8px;
    right: 16px;
    font-size: 18px;
}

</style>
<div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <h2 class="center">Assign Property</h2>
                            <!-- <div class="topright"> -->
                            <!-- <a class ="btn btn-primary">Assign</a> </div> -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Properties</th>
                                        <th>Agents</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$i=0;
foreach($assign as $row)
{
?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('agencies/manage/');?>" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="<?php echo base_url('agents/delete/');?>" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                    </tr>
<?php
}
?>
                                </tbody>
                            </table>

                            <div class="center">
                                <ul class="pagination">
                                    <li><a href="#">&laquo;</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li class="active"><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div>
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->
