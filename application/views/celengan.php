<div class="content">
  <?php if ($this->session->flashdata('globalmsg')): ?>
    <script type="text/javascript">
      $(document).ready(function() {
        swal({
          title: "<?php echo $this->session->flashdata('globalmsg'); ?>",
          icon: "success",
          timer: 10000
        });
      });
    </script>
  <?php endif; ?>
  <div class="row">
    <div class="col-sm-12">
      <a style="width: 100%" class="btn btn-info animation-on-hover" href="" data-toggle="modal" data-target="#modalCelengan">Create New</a>
    </div>
  </div>
  <div class="row" style="margin-top: 20px">
    <?php $no = 1; foreach ($celeng as $q) { ?>
    <div class="col-sm-4">
      <div class="card text-white">
        <img class="card-img" src="../assets/img/1280x720.jpg" alt="Card image">
          <div class="card-img-overlay">
            <div class="card-body">
            <h5 class="card-title text-white">
              <span>
                <?= $q->nama_celengan; ?> &nbsp; (Rp. <?= number_format($q->jumlah_uang, 0, ".", "."); ?>,00)
              </span>
            </h5>
            <p class="card-text text-white"><?= $q->deskripsi; ?></p>
          </div>
          <div class="card-footer">
            <?php if ($q->status == '0') { ?>
              <a href="<?php echo base_url();?>Home/hapus_celengan/<?= $q->id; ?>" id="hapus<?= $q->id; ?>" class="btn-link pull-right"><i class="tim-icons icon-trash-simple" title="Delete MoneyBox"></i></a>
              <a href="" id="tebok<?= $q->id; ?>" class="btn-link pull-right "><i class="tim-icons icon-refresh-01" title="Tebok MoneyBox"></i></a>
              <a href=""  data-toggle="modal" data-target="#modalEditCelengan<?= $q->id; ?>" class="btn-link pull-right"><i class="tim-icons icon-pencil" title="Edit MoneyBox"></i></a>
            <?php } else { ?>
              <p class="card-text text-white pull-right">Already Broke</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div> 
</div>

<div class="modal fade" id="modalCelengan" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true" style="position: absolute;top:100px">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url();?>Home/tambahcelengan" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label style="color: black;">MoneyBox Name</label><br>
            <input type="text" name="namacelengan" class="form-control" placeholder="Celengan" autocomplete="off" required="">
            <?php if ($this->session->userdata('type') == 'google') { ?>
              <input type="hidden" name="username" value="<?= $profile['email'];?>" class="form-control" autocomplete="off">
            <?php } else if ($this->session->userdata('type') == 'local') { ?>
              <input type="hidden" name="username" value="<?= $user->username;?>" class="form-control" autocomplete="off">
            <?php } ?>
          </div>
          <div class="form-group">
            <label style="color: black;">Description</label><br>
            <textarea name="deskripsi" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button style="width: 100%" class="btn btn-info animation-on-hover" type="submit">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php 
foreach ($celeng as $row) {
?>

<div class="modal fade" id="modalEditCelengan<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true" style="position: absolute;top:100px">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url();?>Home/updatecelengan" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label style="color: black;">MoneyBox Name</label><br>
            <input type="text" name="namacelengan" value="<?= $row->nama_celengan; ?>" class="form-control" placeholder="Celengan" autocomplete="off">
            <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control" autocomplete="off">
            <?php if ($this->session->userdata('type') == 'google') { ?>
              <input type="hidden" name="username" value="<?= $profile['email'];?>" class="form-control" autocomplete="off">
            <?php } else if ($this->session->userdata('type') == 'local') { ?>
              <input type="hidden" name="username" value="<?= $user->username;?>" class="form-control" autocomplete="off">
            <?php } ?>
          </div>
          <div class="form-group">
            <label style="color: black;">Description</label><br>
            <textarea name="deskripsi" class="form-control"><?= $row->deskripsi; ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-info animation-on-hover" type="submit">
            Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>

<?php 
foreach ($celeng as $row) {
?>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalHapusCelengan<?= $row->id; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <div class="panel-title">
                    <h4>Delete MoneyBox</h4>
                  </div>
                  <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
                </div>
                <form class="form-horizontal" action="<?php echo base_url();?>Home/hapus_celengan" method="post" enctype="multipart/form-data" role="form"> 
                    <div class="modal-body">
                        <div class="form-group">
                          <label style="color: black;">MoneyBox Name</label><br>
                          <input type="text" name="jumlah" class="form-control" value="<?= $row->nama_celengan ?>" readonly="">
                          <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Amount Of Money</label><br>
                          <input type="text" name="tanggal" class="form-control" value="Rp. <?= number_format($row->jumlah_uang, 0, ".", "."); ?>,00" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Description</label><br>
                          <input type="text" name="catatan" class="form-control" value="<?= $row->deskripsi ?>" readonly="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Go on&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<?php 
foreach ($celeng as $row) {
?>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalTebokCelengan<?= $row->id; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <div class="panel-title">
                    <h4>Broke MoneyBox</h4>
                  </div>
                  <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
                </div>
                <form class="form-horizontal" action="<?php echo base_url();?>Home/tebok_celengan" method="post" enctype="multipart/form-data" role="form"> 
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control" autocomplete="off">
                        <div class="form-group">
                          <label style="color: black;">MoneyBox Name</label><br>
                          <input type="text" name="nama" class="form-control" value="<?= $row->nama_celengan ?>" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Amount Of Money</label><br>
                          <input type="text" name="jumlah_uang" class="form-control" value="Rp. <?= number_format($row->jumlah_uang, 0, ".", "."); ?>,00" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Description</label><br>
                          <input type="text" name="deskripsi" class="form-control" value="<?= $row->deskripsi ?>" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Note</label><br>
                          <textarea  name="catatan" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Go on&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
foreach ($celeng as $row) {
?>
<script type="text/javascript">
            $('#hapus<?= $row->id; ?>').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this money box!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location.href = getLink;
                  } else {
                    swal({
                      title: "MoneyBox Is Save!",
                      icon: "info",
                      timer: 10000
                    });
                  }
                });
                return false;
            });

            $('#tebok<?= $row->id; ?>').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                  title: "Are You Sure To Emtied This Money Box?", 
                  text: "Enter Note",
                  content: "input",
                  inputPlaceholder: "Enter Note",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location.href = "<?php echo base_url();?>Home/tebok_celengan/<?= $row->id; ?>/" + `${willDelete}`;
                  } else {
                    swal({
                      title: "Money Box Is Save!",
                      icon: "info",
                      timer: 10000
                    });
                  }
                });
                return false;
            });
</script>
<?php } ?>