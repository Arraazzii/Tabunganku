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
            <h5 class="card-title text-white">
              <span>
                <?= $q->nama_celengan; ?> (<?= number_format($q->jumlah_uang, 0, ".", "."); ?>)
              </span>
              <a href="<?php echo base_url();?>Home/hapus_celengan/<?= $q->id; ?>" class="btn-link pull-right"><i class="tim-icons icon-simple-remove"></i></a>
              <a href=""  data-toggle="modal" data-target="#modalEditCelengan<?= $q->id; ?>" class="btn-link pull-right"><i class="tim-icons icon-pencil"></i></a>
            </h5>
            <p class="card-text text-white"><?= $q->deskripsi; ?></p>
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
            Tambah
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>