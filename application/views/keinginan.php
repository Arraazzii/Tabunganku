<div class="content">
  <?php echo $this->session->flashdata('notif') ?>
  <div class="row">
    <div class="col-sm-12">
      <a style="width: 100%" class="btn btn-info animation-on-hover" href="" data-toggle="modal" data-target="#modalKeinginan">Tambah</a>
    </div>
  </div>
  <div class="row" style="margin-top: 20px">
    <?php $no = 1; foreach ($wish as $q) { ?>
    <div class="col-sm-4">
      <div class="card text-white">
        <img class="card-img" src="../assets/img/1280x720.jpg" alt="Card image">
          <div class="card-img-overlay">
            <h5 class="card-title text-white">
              <span>
                <?= $q->keinginan; ?>
              </span>
              <a href="" data-toggle="modal" data-target="#modalHapusKeinginan<?= $q->id; ?>" class="btn-link pull-right"><i class="tim-icons icon-simple-remove"></i></a>
              <a href="" data-toggle="modal" data-target="#modalEditKeinginan<?= $q->id; ?>" class="btn-link pull-right"><i class="tim-icons icon-pencil"></i></a>
            </h5>
            <p class="card-text text-white"><?= $q->deadline; ?> (<?= number_format($q->jumlah_uang, 0, ".", "."); ?>)</p>
          </div>
      </div>
    </div>
    <?php } ?>
  </div> 
</div>

<div class="modal fade" id="modalKeinginan" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true" style="position: absolute;top:100px">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url();?>Home/tambahKeinginan" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label style="color: black;">Keinginan</label><br>
            <input type="text" name="keinginan" class="form-control" placeholder="Keinginan" autocomplete="off">
            <?php if ($this->session->userdata('type') == 'google') { ?>
              <input type="hidden" name="username" value="<?= $profile['email'];?>" class="form-control" placeholder="Keinginan" autocomplete="off">
            <?php } else if ($this->session->userdata('type') == 'local') { ?>
              <input type="hidden" name="username" value="<?= $user->username;?>" class="form-control" placeholder="Keinginan" autocomplete="off">
            <?php } ?>
          </div>
          <div class="form-group">
            <label style="color: black;">Batas Waktu</label><br>
            <input type="date" name="batas_waktu" class="form-control" placeholder="Keinginan" autocomplete="off">
          </div>
          <div class="form-group">
            <label style="color: black;">Jumlah Uang</label><br>
            <input type="number" name="jumlah_uang" class="form-control" placeholder="Jumlah Uang" autocomplete="off">
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
foreach ($wish as $row) {
?>

<div class="modal fade" id="modalEditKeinginan<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true" style="position: absolute;top:100px">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url();?>Home/updateKeinginan" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label style="color: black;">Keinginan</label><br>
            <input type="text" name="keinginan" value="<?= $row->keinginan; ?>" class="form-control" placeholder="Keinginan" autocomplete="off">
            <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control" placeholder="Keinginan" autocomplete="off">
            <?php if ($this->session->userdata('type') == 'google') { ?>
              <input type="hidden" name="username" value="<?= $profile['email'];?>" class="form-control" placeholder="Keinginan" autocomplete="off">
            <?php } else if ($this->session->userdata('type') == 'local') { ?>
              <input type="hidden" name="username" value="<?= $user->username;?>" class="form-control" placeholder="Keinginan" autocomplete="off">
            <?php } ?>
          </div>
          <div class="form-group">
            <label style="color: black;">Batas Waktu</label><br>
            <input type="date" name="batas_waktu" value="<?= $row->deadline; ?>" class="form-control" placeholder="Keinginan" autocomplete="off">
          </div>
          <div class="form-group">
            <label style="color: black;">Jumlah Uang</label><br>
            <input type="number" name="jumlah_uang" value="<?= $row->jumlah_uang; ?>" class="form-control" placeholder="Keinginan" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-info animation-on-hover" type="submit">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>

<?php 
foreach ($wish as $row) {
?>

<div class="modal fade" id="modalHapusKeinginan<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true" style="position: absolute;top:100px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url();?>Home/hapus_Keinginan" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $row->id; ?>" class="form-control" placeholder="Keinginan" autocomplete="off">
          <h4>Hapus Keinginan ?</h4>
        </div>
        <div class="modal-footer">
          <button class="btn btn-info animation-on-hover" type="submit">
            Ya
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"> Tidak</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>