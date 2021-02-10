<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TNI Login </title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>                                   
                                     <?php 
                                        $attr = array(
                                            'class'=>'user',
                                            'id'=>'frmlogin',
                                            'name'=>'frmlogin'
                                        );
                                     echo form_open("User/login",$attr); ?>                                        
                                        <div class="form-group">                                           
                                            <?php 
                                                $attr = array(
                                                    'class'=>'form-control form-control-user',
                                                    'placeholder'=>'รหัสผู้ใช้งาน',
                                                    'autocomplete'=>'off',
                                                    'name'=>'username',
                                                    'id'=>'username',
                                                    'value'=>set_value("username")?set_value("username"):''
                                                );
                                                echo form_input($attr);
                                             ?>    
                                        </div>
                                        <div class="form-group">
                                            <?php 
                                                $attr = array(
                                                    'class'=>'form-control form-control-user',
                                                    'placeholder'=>'รหัสผ่าน',
                                                    'name'=>'pwd',
                                                    'id'=>'pwd',
                                                );
                                                echo form_password($attr);
                                             ?>    
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <?php 
                                                $attr = array(
                                                    'class'=>'custom-control-input',
                                                    'placeholder'=>'รหัสผู้ใช้งาน',
                                                    'name'=>'remember',
                                                    'id'=>'remember',
                                                    'checked'=> TRUE,
                                                    'value'=>'86400'
                                                );
                                                echo form_checkbox($attr);
                                             ?>    
                                                <label class="custom-control-label" for="remember">จดจำไว้ 1 วัน</label>
                                            </div>
                                        </div>
                                        <?php 
                                        $attr = array(
                                            'class'=>"btn btn-primary btn-user btn-block",
                                            'name'=>"btn-login",
                                            'id'=>"btn-login",
                                            'value'=>"เข้าสู่ระบบ",
                                        );
                                        echo form_submit($attr);
                                        ?>
                                        
                                    <?php echo form_close() ?>
                                    <hr>

                                    <?php if($this->session->flashdata('flash_errors')){ ?>     
                                    <div class="col-12 col-sm-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                          <?= $this->session->flashdata('flash_errors')  ?>
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                    </div>                                  
                                    <?php } ?>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>