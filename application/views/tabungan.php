<?php if ($checkcelengan < '1') { ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#myModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
  </script>
<?php } ?>
<div class="content">
  <div class="row">
    <div class="col-sm-12">
      <a style="width: 100%" class="btn btn-info animation-on-hover" href="" data-toggle="modal" data-target="#modalTabung">Create New</a>
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
              <table id="table-1" class="table display" cellspacing="0" width="100%">
                <thead class="">
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
                    <th>
                      Status
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
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
            <label style="color: black;">Amount of Money</label><br>
            <input type="text" name="jumlah_uang" class="form-control" placeholder="Amount of Money" autocomplete="off">
          </div>
          <div class="form-group">
            <label style="color: black;">MoneyBox</label><br>
            <select name="celengan"  class="form-control">
              <option value="" hidden>-Choose MoneyBox-</option>
              <?php
              foreach ($celeng as $a) { ?>
                <option value="<?= $a->id?>"><?= $a->nama_celengan?></option>
              <?php } ?>
            </select>
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

<!-- Modal Hapus -->
<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <div class="panel-title">
                    <h4>Delete Saving History ?</h4>
                  </div>
                  <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
                </div>
                <form class="form-horizontal" action="<?php echo base_url();?>Home/hapus_Tabungan" method="post" enctype="multipart/form-data" role="form"> 
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                          <label style="color: black;">Date Saving</label><br>
                          <input type="text" name="jumlah" class="form-control" autocomplete="off" id="tanggal" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Amount Of Money</label><br>
                          <input type="text" name="tanggal" class="form-control" plautocomplete="off" id="jumlah" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Saving Note</label><br>
                          <input type="text" name="catatan" class="form-control" autocomplete="off" id="catatan" readonly="">
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

<!-- Modal Edit -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <div class="panel-title">
                    <h4>Edit Saving History</h4>
                  </div>
                  <button aria-hidden="true" data-dismiss="modal" class="close right" type="button">×</button>
                </div>
                <form class="form-horizontal" action="<?php echo base_url();?>Home/edit_Tabungan" method="post" enctype="multipart/form-data" role="form"> 
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                          <label style="color: black;">Date Saving</label><br>
                          <input type="text" name="tanggal" class="form-control" autocomplete="off" id="tanggal" readonly="">
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Amount Of Money</label><br>
                          <input type="text" name="jumlah" class="form-control" plautocomplete="off" id="jumlah" >
                        </div>
                        <div class="form-group">
                          <label style="color: black;">Saving Note</label><br>
                          <input type="text" name="catatan" class="form-control" autocomplete="off" id="catatan" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Update&nbsp;</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" style="margin-top: 150px ">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Ooopss..</h4>
                  <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
              </div>
              <div class="modal-body">
                  <h4>You dont have any available moneybox,<br>create a new one by clicking button below</h4>
              </div>
              <div class="modal-footer">
                <a class="btn btn-info" href="<?= base_url('Home/celengan'); ?>">Create</a>
              </div>
          </div>
      </div>
  </div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    var table = $('#table-1').DataTable({ 

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
        { 
            "targets": [ 4 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],


"language": {                
            "infoFiltered": ""
        }
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
 <script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#tanggal').attr("value", div.data('tanggal'));
            modal.find('#jumlah').attr("value", div.data('jumlah'));
            modal.find('#catatan').attr("value", div.data('catatan'));
        });

        $('#table-1').on('click','.hapus-menabung', function () {
            var id =  $(this).data('id');
            var celengan =  $(this).data('celengan');
            var jumlah =  $(this).data('jumlah');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this savings!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((result) => {
                if (result) {
                  window.location.href = "<?php echo base_url();?>Home/hapus_Tabungan/" + id + "/" + celengan + "/" + jumlah;
                } else {
                  swal({
                    title: "Saved savings!",
                    icon: "info",
                    timer: 10000
                  });
                }
              })
            });
    
    });
    </script>
