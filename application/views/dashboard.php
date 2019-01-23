<?php if ($this->session->userdata('type') != 'google' && $user->status == '0') { ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#myModal").modal('show');
		});
	</script>
<?php } ?>
<div class="content">
	<?php echo $this->session->flashdata('notif') ?>
	<div id="myModal" class="modal fade" style="margin-top: 150px ">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Change Password </h4>
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	            </div>
	            <div class="modal-body">
	                <form action="<?php echo base_url();?>Home/change_pass" method="POST">
	                    <div class="form-group">
	                        <input type="password" name="pass1" class="form-control" placeholder="New Password" required>
	                    </div>
	                    <div class="form-group">
	                        <input type="password" name="pass2" class="form-control" placeholder="Confirm New Password" required>
	                    </div>
	                    <button type="submit" class="btn btn-info" style="float: right;">Submit</button>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>