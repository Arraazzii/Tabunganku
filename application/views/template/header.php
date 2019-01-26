<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent" data-color="blue">
        <div class="container">
                <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                                <button type="button" class="navbar-toggler">
                                        <span class="navbar-toggler-bar bar1"></span>
                                        <span class="navbar-toggler-bar bar2"></span>
                                        <span class="navbar-toggler-bar bar3"></span>
                                </button>
                        </div>
                        <a class="navbar-brand d-none d-lg-block d-xl-block" href="<?php echo site_url('Home/dashboard');?>">Dashboard</a>
                        <a class="navbar-brand float-center d-lg-none d-xl-none" href="<?php echo site_url('Home/dashboard');?>">Dashboard</a>
                </div>
                <div class="photo d-lg-none d-xl-none">
                        <img src="<?php echo base_url('assets/img/3.png')?>" data-toggle="collapse" data-target="#navigation">
                </div>
                        <div class="collapse navbar-collapse" id="navigation">
                                <ul class="navbar-nav ml-auto ">
                                        <ul class="navbar-nav">
                                                <li class="nav-item active">
                                                        <a class="nav-link" href="<?php echo site_url('Home/profile');?>">Profile<span class="sr-only">(current)</span></a>
                                                </li>
                                                <div class="dropdown-divider"></div>
                                                <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('Login/logout');?>">Logout</a>
                                                </li>
                                        </ul>
                                        <li class="separator d-lg-none"></li>
                                </ul>
                        </div>
                </div>
</nav>
<!-- End Navbar -->