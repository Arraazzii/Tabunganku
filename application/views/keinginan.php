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
            <h5 class="card-title text-white"><?= $q->keinginan; ?></h5>
            <!-- <p class="card-text text-white">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little   bit   longer.</p> -->
            <p class="card-text text-white"><?= $q->deadline; ?> (<?= $q->jumlah_uang; ?>)</p>
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
            Tambah
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>