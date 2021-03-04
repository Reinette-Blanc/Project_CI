<!-- Main Content -->
<div id="content">

    <?php $this->load->view("layout/menu-top") ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Home</a>
        </div>
        
         <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <td colspan="5">
                                <a href="<?=base_url("Room/form")?>" class="btn btn-success">Add Room</a>
                                
                            </td>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Room Name</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($rooms as $room) { ?>
                        <tr>
                            <td><?php echo $room['room_id'];?></td>
                            <td><?php echo $room['room_name'];?></td>
                            <td>
                                <a href="<?=base_url("Room/form?id=".$room['room_id'])?>" class="btn btn-warning">edit</a>
                                <a href="<?=base_url("Room/delete?id=".$room['room_id'])?>" class="btn btn-danger"
                                onclick="return confirm('Delete ?'); ">delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                       
                    </table>
                </div>

                </div>
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->