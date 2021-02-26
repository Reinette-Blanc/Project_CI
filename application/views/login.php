<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view('rooming/inc/title') ?>
</head>
<?php $this->load->view('rooming/inc/script') ?>
<?php $this->load->view('rooming/inc/css') ?>

<body>
    <?php   $attr = array('class'=>'user','id'=>'frmlogin','name'=>'frmlogin');
            echo form_open("User/login",$attr); ?>

    <div class="form-group">
        <?php
        $attr = array(
            'class' => 'form-control form-control-user',
            'autocomplete' => 'off',
            'placeholder' => 'username',
            'name' => 'username',
            'id' => 'username',
            'value' => set_value("username") ? set_value("username") : ''
        );
        echo form_input($attr);
        ?>
    </div>
    <div class="form-group">
        <?php
        $attr = array(
            'class' => 'form-control form-control-user',
            'placeholder' => 'password',
            'name' => 'pwd',
            'id' => 'pwd'
        );
        echo form_password($attr);
        ?>
    </div>

    <?php
    $attr = array(
        'class' => "btn btn-primary btn-user btn-block",
        'name' => "btn-login",
        'id' => "btn-login",
        'value' => "Login"
    );
    echo form_submit($attr);
    ?>

    <?php echo form_close() ?>
    <?php if ($this->session->flashdata('flash_error')) {
    ?>
        <div class="col-12 col-sm-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('flash_error') ?>
            </div>
        </div>
    <?php } ?>

</body>

</html>