<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabunganku - Login</title>
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
  <div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo base_url('assets/login/images/img-01.jpg')?>');">
      <div class="wrap-login100 p-t-100">
        <form class="login100-form validate-form" action="<?php echo base_url();?>Login/auth_login" method="POST">
          <div class="login100-form-avatar">
            <img src="<?php echo base_url('assets/img/3.png')?>" alt="AVATAR">
          </div>

          <span class="login100-form-title p-t-10 p-b-45">
            TABUNGANKU
          </span>

          <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
            <input class="input100" type="text" name="user" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock"></i>
            </span>
          </div>

          <div class="container-login100-form-btn p-t-10">
            <button class="login100-form-btn" type="submit">
              Login
            </button>
          </div>

          <div class="text-center w-full p-t-25 p-b-120">
            <a class="txt1" href="<?php echo base_url();?>Login/login_guest" data-toggle="modal" data-target="#searchModal">
              <i class="fa fa-user-secret"></i>&nbspLogin as Guest          
            </a>
            &nbsp&nbspOr&nbsp&nbsp
            <a href="<?= $login_url; ?>" class="txt1">
              <i class="fa fa-google"></i>&nbspLogin With Google
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true" style="position: absolute;top:100px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url();?>Login/login_guest" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Username</label><br>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off"  onkeyup='cek_username()'>
            <small id="pesan_username" class=""></small>
            <small class='text-danger' id="username-used" style='display:none'>* Username already used!</small>
            <small class='text-success' id="username-available" style='display:none'>* Username available!</small>
          </div>
        </div>
        <div class="modal-footer">
          <button class="login100-form-btn" id="button-signup" type="submit">
            Sign Up
          </button>
        </div>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
  function disableBtn() {
    document.getElementById("button-signup").disabled = true;
  }

  function enableBtn() {
      document.getElementById("button-signup").disabled = false;
  }
  function cek_username(){
    $("#pesan_username").hide();
 
    var username = $("#username").val();
 
    if(username != ""){
      $.ajax({
        url: "<?php echo site_url('Login/usernameList')?>",
        data: 'username='+username,
        type: "POST",
        success: function(msg){
          if(msg==1){
            $("#username").css({ 'border-color': '#a94442'});
            $("#username-available").hide();
            $("#username-used").show();
            disableBtn();
            error = 1;
          }else{
            $("#username").css({ 'border-color': '#3c763d'});
            $("#username-used").hide();
            $("#username-available").show();
            enableBtn();
            error = 0;
          }
        }
      });
    }        
         
  }
</script>

  <?php if ($this->session->flashdata('globalmsg')): ?>
    <script type="text/javascript">
      $(document).ready(function() {
        swal({
          title: "Login Failed !",
          text: "<?php echo $this->session->flashdata('globalmsg'); ?>",
          icon: "error",
          timer: 10000
        });
      });
    </script>
  <?php endif; ?>

</body>
</html>