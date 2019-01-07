<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tabunganku | <?php echo $title;?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Nucleo Icons -->
  	<link href="<?php echo base_url('assets/css/nucleo-icons.css')?>" rel="stylesheet" />
    <link rel="icon" href="<?php echo base_url('assets/img/3.png')?>">
      <!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Black Dashboard CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/black-dashboard.css?v=1.0.0');?>" rel="stylesheet" />

    <style type="text/css">
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .btn {
        	width: 100%;
        }

        @media only screen and (max-width: 950px) {
        	.card {
	        	max-width: 95%;
	        	margin-right: auto;
	        	margin-left: auto;
	        	margin-top: 15%;
        	}
        }
    </style>
 </head>
<body>
<div class="card">
  <div class="card-body">
    <form>
      <div class="form-group">
        <a href="<?php echo $login_url;?>">
      		<img src="<?php echo base_url('assets/img/g.png')?>">
      	</a>
      	<br><br>
      	<center>
      	<h4>or</h4>
      	</center>
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <!-- <div class="form-check">
          <label class="form-check-label">
              <input class="form-check-input" type="checkbox" value="">
              Option one is this
              <span class="form-check-sign">
                  <span class="check"></span>
              </span>
          </label>
      </div> -->
      <button type="submit" class="btn btn-info animation-on-hover">Log In</button>
    </form>
  </div>
</div>
</body>
</html>