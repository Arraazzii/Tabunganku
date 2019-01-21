<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftar</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/3.png')?>"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/animate/animate.css')?>">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/util.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/main.css')?>">
<!--===============================================================================================-->
</head>
<body>
  <div class="limiter" style="margin-top: -50px">
    <div class="container-login100" style="background-image: url('<?php echo base_url('assets/login/images/img-01.jpg')?>');">
      <div class="wrap-login100 p-t-150 p-b-30">
          <?=$this->session->flashdata('notif')?>
        <form class="login100-form validate-form" action="<?php echo base_url();?>Login/daftar" method="POST">
          
        </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="<?php echo base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('assets/login/vendor/bootstrap/js/popper.js')?>"></script>
  <script src="<?php echo base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('assets/login/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
  <script src="<?php echo base_url('assets/login/js/main.js')?>"></script>

</body>
</html>