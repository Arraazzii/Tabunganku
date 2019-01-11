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
                      <img class="avatar" src="<?php echo $profile['picture'];?>" alt="...">
                      <h5 class="title"><?php echo $profile['name'];?></h5>
                    </a>
                                                                <p class="description">
                                                                        ID Kamu :
                                                                        <?php echo $profile['id'];?>
                                                                </p>
                                                        </div>
                                                </p>
                                        </div>
                                        <div class="card-footer">
                                                <form>
                                                        <div class="row">
                                                                <div class="col-md-6 pr-md-1">
                                                                        <div class="form-group">
                                                                                <label>Name</label>
                                                                                <input type="text" class="form-control" placeholder="Name" value="<?php echo $profile['name'];?>">
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6 pl-md-1">
                                                                        <div class="form-group">
                                                                                <label for="exampleInputEmail1">Email address</label>
                                                                                <input type="email" class="form-control" placeholder="Email" value="<?php echo $profile['email'];?>">
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-6 pr-md-1">
                                                                        <div class="form-group">
                                                                                <label>First Name</label>
                                                                                <input type="text" class="form-control" placeholder="Company" value="<?php echo $profile['given_name'];?>">
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-6 pl-md-1">
                                                                        <div class="form-group">
                                                                                <label>Last Name</label>
                                                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $profile['family_name'];?>">
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