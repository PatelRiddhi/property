<div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <h2 class="center">My Properties</h2>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($properties as $row) 
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td>
                                            <h4 class="property-box-title">
                                            <img src="<?php echo base_url();?><?php echo $row['thumbnail']; ?>" alt="" width="100">
                                            <a href="<?php echo base_url('properties/').$row['id']; ?>"><?php echo $row['title']; ?></a></img></h4>
                                        </td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>$<?php echo $row['prize'];if($row['status'] == 'rent'){echo "/month";} ?></td>
                                        <td>
                                            <a href="<?php echo base_url('properties/manage/').$row['id']; ?>" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="<?php echo base_url('properties/delete/').$row['id']; ?>" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                    
                                </tbody>
                            </table>

                            <div class="center">
                                <ul class="pagination">
                                    <li><?php echo $links; ?></li>
                                </ul>
                            </div>
                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->
