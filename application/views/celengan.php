<div class="content">
  <?php echo $this->session->flashdata('notif') ?>
  <div class="row">
    <div class="col-sm-12">
      <a style="width: 100%" class="btn btn-info animation-on-hover" href="" data-toggle="modal" data-target="#modalCelengan">Tambah</a>
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
              <a href=""  data-toggle="modal" data-target="#modalHapusCelengan<?= $q->id; ?>" class="btn-link pull-right"><i class="tim-icons icon-trash-simple" title="Delete MoneyBox"></i></a>
              <a href=""  data-toggle="modal" data-target="#modalTebokCelengan<?= $q->id; ?>" class="btn-link pull-right"><i class="tim-icons icon-refresh-01" title="Tebok MoneyBox"></i></a>
              <a href=""  data-toggle="modal" data-target="#modalEditCelengan<?= $q->id; ?>" class="btn-link pull-right"><i class="tim-icons icon-pencil" title="Edit MoneyBox"></i></a>
            <?php } else { ?>
              <p class="card-text text-white pull-right">Sudah Ditebok</p>
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
            <label style="color: black;">Nama Celengan</label><br>
            <input type="text" name="namacelengan" class="form-control" placeholder="Celengan" autocomplete="off">
            <?php if ($this->session->userdata('type') == 'google') { ?>
              <input type="hidden" name="username" value="<?= $profile['email'];?>" class="form-control" autocomplete="off">
            <?php } else if ($this->session->userdata('type') == 'local') { ?>
              <input type="hidden" name="username" value="<?= $user->username;?>" class="form-control" autocomplete="off">
            <?php } ?>
          </div>
          <div class="form-group">
            <label style="color: black;">Deskripsi</label><br>
            <textarea name="deskripsi" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button style="width: 100%" class="btn btn-info animation-on-hover" type="submit">
            Tambah
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
            <label style="color: black;">Nama Celengan</label><br>
            <input type="text" name="namacelengan" value="<?= $row->nama_celengan; ?>" class="form-control" placeholder="Celengan" autocomplete="off">
            <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control" autocomplete="off">
            <?php if ($this->session->userdata('type') == 'google') { ?>
              <input type="hidden" name="username" value="<?= $profile['email'];?>" class="form-control" autocomplete="off">
            <?php } else if ($this->session->userdata('type') == 'local') { ?>
              <input type="hidden" name="username" value="<?= $user->username;?>" class="form-control" autocomplete="off">
            <?php } ?>
          </div>
          <div class="form-group">
            <label style="color: black;">Deskripsi</label><br>
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
                    <h4>Hapus Celengan</h4>
                  </div>
                  <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
                </div>
                <form class="form-horizontal" action="<?php echo base_url();?>Home/hapus_celengan" method="post" enctype="multipart/form-data" role="form"> 
                    <div class="modal-body">
                        <div class="form-group">
                          <label style="color: black;">Nama Celengan</label><br>
                          <input type="text" name="jumlah" class="form-control" value="<?= $row->nama_celengan ?>" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Jumlah Uang</label><br>
                          <input type="text" name="tanggal" class="form-control" value="Rp. <?= number_format($row->jumlah_uang, 0, ".", "."); ?>,00" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Deskripsi</label><br>
                          <input type="text" name="catatan" class="form-control" value="<?= $row->deskripsi ?>" readonly="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Ya&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
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
                    <h4>Tebok Celengan</h4>
                  </div>
                  <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
                </div>
                <form class="form-horizontal" action="<?php echo base_url();?>Home/tebok_celengan" method="post" enctype="multipart/form-data" role="form"> 
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control" autocomplete="off">
                        <div class="form-group">
                          <label style="color: black;">Nama Celengan</label><br>
                          <input type="text" name="nama" class="form-control" value="<?= $row->nama_celengan ?>" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Jumlah Uang</label><br>
                          <input type="text" name="jumlah_uang" class="form-control" value="Rp. <?= number_format($row->jumlah_uang, 0, ".", "."); ?>,00" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Deskripsi</label><br>
                          <input type="text" name="deskripsi" class="form-control" value="<?= $row->deskripsi ?>" readonly="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Ya&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>