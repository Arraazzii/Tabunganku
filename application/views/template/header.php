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
                        <a class="navbar-brand d-none d-lg-block d-xl-block" href="#pablo">Dashboard</a>
                        <a class="navbar-brand float-center d-lg-none d-xl-none" href="#pablo">Dashboard</a>
                </div>
                <div class="photo d-lg-none d-xl-none">
                        <img src="<?php echo base_url('assets/img/anime3.png')?>" data-toggle="collapse" data-target="#navigation">
                </div>
                        <div class="collapse navbar-collapse" id="navigation">
                                <ul class="navbar-nav ml-auto ">
                                        <ul class="navbar-nav">
                                                <li class="nav-item active">
                                                        <a class="nav-link" href="#">Profile<span class="sr-only">(current)</span></a>
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
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="tim-icons icon-simple-remove"></i>
                                </button>
                        </div>
                </div>
        </div>
</div>