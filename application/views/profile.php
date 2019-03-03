<?php if ($this->session->userdata('type') == 'google') { ?>
<div class="content">
        <div class="">
                <div class="row">
                        <div class="col-md-12">
                                <div class="card card-user">
                                        <div class="card-body ">
                                                <p class="card-text">
                                                        <div class="author">
                                                                <div class="block block-one"></div>
                                                                <div class="block block-two"></div>
                                                                <div class="block block-three"></div>
                                                                <div class="block block-four"></div>
                                                                <a href="#">
                      <img class="avatar" src="<?= $profile['picture'];?>" alt="...">
                      <h5 class="title"><?= $profile['name'];?></h5>
                    </a>
                                                                <p class="description">
                                                                        Your ID :
                                                                        <?= $profile['id'];?>
                                                                </p>
                                                        </div>
                                                </p>
                                        </div>
                                        <div class="card-footer">
                                                <form>
                                                        <div class="row">
                                                                <div class="col-md-12 pr-md-1">
                                                                        <div class="form-group">
                                                                                <label>Username</label>
                                                                                <input type="text" class="form-control" placeholder="Name" value="<?= $profile['email'];?>" readonly>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-6 pr-md-1">
                                                                        <div class="form-group">
                                                                                <label>First Name</label>
                                                                                <input type="text" class="form-control" placeholder="Company" value="<?= $profile['given_name'];?>" readonly>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6 pl-md-1">
                                                                        <div class="form-group">
                                                                                <label>Last Name</label>
                                                                                <input type="text" class="form-control" placeholder="Last Name" value="<?= $profile['family_name'];?>" readonly>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 pr-md-1">
                                                                        <div class="form-group">
                                                                                <label>Note : You Can't Change Google Account Info Here!</label>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<?php } else if ($this->session->userdata('type') == 'local') { ?>
<div class="content">
<?php echo $this->session->flashdata('notif') ?>
        <div class="">
                <div class="row">
                        <div class="col-md-12">
                                <div class="card card-user">
                                        <div class="card-body ">
                                                <p class="card-text">
                                                        <div class="author">
                                                                <div class="block block-one"></div>
                                                                <div class="block block-two"></div>
                                                                <div class="block block-three"></div>
                                                                <div class="block block-four"></div>
                                                                <a href="#">
                      <img class="avatar" src="<?= base_url();?>assets/img/<?= $user->photo?>" alt="...">
                      <h5 class="title"><?= $user->nama_depan;?> <?= $user->nama_belakang;?></h5>
                    </a>
                                                                <p class="description">
                                                                        Your ID :
                                                                        <?= $user->id;?>
                                                                </p>
                                                        </div>
                                                </p>
                                        </div>
                                        <div class="card-footer">
                                                <form action="<?php echo base_url();?>Home/change_profile" method="POST">
                                                        <div class="row">
                                                                <div class="col-md-12 pr-md-1">
                                                                        <div class="form-group">
                                                                                <label>Username</label>
                                                                                <input type="text" name="username" class="form-control" placeholder="Name" value="<?= $user->username;?>" readonly>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-6 pr-md-1">
                                                                        <div class="form-group">
                                                                                <label>First Name</label>
                                                                                <input type="text" name="fname" class="form-control" placeholder="Company" value="<?= $user->nama_depan;?>">
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6 pl-md-1">
                                                                        <div class="form-group">
                                                                                <label>Last Name</label>
                                                                                <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?= $user->nama_belakang;?>">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-12 pl-3">
                                                                        <button type="submit" class="btn btn-fill btn-info animation-on-hover">Save</button>
                                                                </div>
                                                        </div>
                                                </form>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<?php } ?>