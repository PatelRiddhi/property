<style type="text/css">
    .anchor{
        color: black;
    }
</style>
<div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <h2 class="center">My Agents</h2>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Profile</th>
                                        <th>Properties</th>
                                        <th>Email</th>
                                        <th>Contact No.</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$i=0;
foreach($agents as $agent)
{
    $i++;
?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <h4 class="property-box-title">
                                            <img src="<?php echo base_url();?><?php echo $agent['profile']; ?>" alt="" width="100">
                                            <a class="anchor" href="<?php echo base_url('agents/').$agent['id']; ?>"><?php echo ucfirst($agent['first_name'])." ".ucfirst($agent['last_name']); ?></a></img></h4>
                                        </td>
                                        <td><?php echo $agent['properties']; ?></td>
                                        <td><a class="anchor" href="<?php echo $agent['email']; ?>" target="blank"><?php echo $agent['email']; ?></a></td>
                                        <td><?php echo $agent['contact_no']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
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
