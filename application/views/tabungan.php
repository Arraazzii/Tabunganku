
<div class="content">
  <?php echo $this->session->flashdata('notif') ?>
  <div class="row">
    <div class="col-sm-12">
      <a style="width: 100%" class="btn btn-info animation-on-hover" href="" data-toggle="modal" data-target="#modalTabung">Tambah</a>
    </div>
  </div><br>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Saving History</h4>
        </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table-1" class="table tablesorter" cellspacing="0" width="100%">
                <thead class=" text-primary">
                  <tr>
                    <th>
                      No
                    </th>
                    <th>
                      Time
                    </th>
                    <th>
                      Amount
                    </th>
                    <th>
                      Note
                    </th>
                  </tr>
                </thead>
                <tbody>
                
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tabung -->
<div class="modal fade" id="modalTabung" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true" style="position: absolute;top:100px">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url();?>Home/menabung" method="POST">
        <div class="modal-body">
          <?php if ($this->session->userdata('type') == 'google') { ?>
              <input type="hidden" name="username" value="<?= $profile['email'];?>" class="form-control" placeholder="Keinginan" autocomplete="off">
            <?php } else if ($this->session->userdata('type') == 'local') { ?>
              <input type="hidden" name="username" value="<?= $user->username;?>" class="form-control" placeholder="Keinginan" autocomplete="off">
            <?php } ?>
          <div class="form-group">
            <label style="color: black;">Jumlah Uang</label><br>
            <input type="text" name="jumlah_uang" class="form-control" placeholder="Jumlah Uang" autocomplete="off">
          </div>
          <div class="form-group">
            <label style="color: black;">Celengan</label><br>
            <select name="celengan"  class="form-control">
              <option value="" hidden>-Pilih Celengan-</option>
              <?php
              foreach ($celeng as $a) { ?>
                <option value="<?= $a->id?>"><?= $a->nama_celengan?></option>
              <?php } ?>
            </select>
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


<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#table-1').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Home/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        { 
            "targets": [ 3 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });

});

</script>