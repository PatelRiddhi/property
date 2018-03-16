<style type="text/css">
    a{
        color: black;
    }
</style>
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
                                        <th>Sr. No.</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <?php
                                        if($this->session->userdata('user')['role']== 1)
                                        {
                                        ?>
                                        <th>Actions</th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=0;
                                foreach ($properties as $row) 
                                {
                                ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td>
                                            <h4 class="property-box-title">
                                            <img src="<?php echo base_url();?><?php echo $row['thumbnail']; ?>" alt="" width="100" height="100">
                                            <a href="<?php echo base_url('properties/').$row['id']; ?>"><?php echo ucfirst($row['title']); ?></a></img></h4>
                                        </td>
                                        <td><?php echo ucfirst($row['status']); ?></td>
                                        <td>$<?php echo $row['prize'];if($row['status'] == 'rent'){echo "/month";} ?></td>
                                        <?php
                                        if($this->session->userdata('user')['role']== 1)
                                        {
                                        ?>
                                        <td>
                                            <a href="<?php echo base_url('properties/manage/').$row['id']; ?>" class="btn btn-primary btn-inversed btn-small"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="<?php echo base_url('properties/delete/').$row['id']; ?>" class="btn btn-primary btn-inversed btn-small" onclick="return confirm('Are you sure you want to delete these data?');"><i class="fa fa-ban"></i> Remove</a>
                                        </td>
                                        <?php
                                        }
                                        ?>
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
