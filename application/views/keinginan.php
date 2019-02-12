<div class="content">
  <?php echo $this->session->flashdata('notif') ?>
	<div class="card">
    <a class="btn btn-info animation-on-hover" href="" data-toggle="modal" data-target="#modalKeinginan">Tambah</a>
  </div>
  <div class="card">
        <div class="card-header">
          <h4 class="card-title">Wishes List</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table tablesorter" id="">
              <thead class=" text-primary">
                <tr>
                  <th>
                    No.
                  </th>
                  <th>
                    Wishes
                  </th>
                  <th>
                    Amount
                  </th>
                  <th>
                    Deadline
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($wish as $q) { ?>
                  <tr>
                    <td>
                      <?= $no++; ?>
                    </td>
                    <td>
                      <?= $q->keinginan; ?>
                    </td>
                    <td>
                      <?= $q->deadline; ?>
                    </td>
                    <td>
                      <?= $q->jumlah_uang; ?>
                    </td>
                    <td>
                      <a class="btn btn-info btn-xs animation-on-hover" href="" data-toggle="modal" data-target="#modalEditKeinginan<?= $q->id; ?>"><span class="tim-icons icon-pencil"></span></a>
                      <a class="btn btn-danger btn-xs animation-on-hover" href="<?php echo base_url(); ?>Home/hapus_Keinginan/<?php echo $q->id; ?>" ><span class="tim-icons icon-trash-simple"></span></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
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
            <input type="number" name="jumlah_uang" class="form-control" placeholder="Keinginan" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button class="login100-form-btn" type="submit">
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
          <button class="login100-form-btn" type="submit">
            Tambah
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>