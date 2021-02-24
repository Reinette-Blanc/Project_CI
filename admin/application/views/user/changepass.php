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
                               <?php
                                $attr = array(
                                    'name' =>'formpass',
                                    'id' =>'formpass'
                                );
                                $action = "User/changePassword";
                                echo form_open($action,$attr);
                                ?>
                                  <div class="form-group row">
                            <label for="old_password" class="col-sm-2 col-form-label">Old password : </label>
                    <div class="col-sm-6">
                       <?php
                               
                                $attr = array(
                                    'id' =>'old_password',
                                    'name' =>'old_password',
                                    'value'=>'',
                                    'class'=>'form-control',
                                    'style'=>'',
                                    'placeholder'=>'Old password'
                                    
                                );
                               echo form_password($attr);
                                ?>
                    </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password" class="col-sm-2 col-form-label">new password : </label>
                    <div class="col-sm-6">
                       <?php
                               
                                $attr = array(
                                    'id' =>'new_password',
                                    'name' =>'new_password',
                                    'value'=>'',
                                    'class'=>'form-control',
                                    'style'=>'',
                                    'placeholder'=>'new password'
                                    
                                );
                               echo form_password($attr);
                                ?>
                    </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-2 col-form-label">Confirm password : </label>
                    <div class="col-sm-6">
                       <?php
                               
                                $attr = array(
                                    'id' =>'confirm_password',
                                    'name' =>'confirm_password',
                                    'value'=>'',
                                    'class'=>'form-control',
                                    'style'=>'',
                                    'placeholder'=>'Confirm password'
                                    
                                );
                               echo form_password($attr);
                                ?>
                    </div>
                        </div>
                        <?php
                                
                                $attr = array(
                                    'id'=>'btn-submit',
                                    'name'=>'btn-submit',
                                   'value'=>'Save',
                                     'class'=>'btn btn-success btn lg',
                                    
                                );
                               echo form_submit($attr);
                                ?>
                    </div>
                        </div>

                        <? echo form_close(); ?>
                        <?php if($this->session->flashdata('flash_error')){
                                ?>
                                <div class="col-12 col-sm-6">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?=$this->session->flashdata('flash_error')?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                </div>
                              <?} ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->