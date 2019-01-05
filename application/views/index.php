<div class="content">
    <div class="container-fluid">
       <h1>CodeIgniter Sign In With Google+</h1>

	<div id="body">
		<p>My Profile</p>
		<table>
			<tr>
				<td>ID</td>
				<td>:</td>
				<td><?php echo @$user_profile['id'];?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><?php echo @$user_profile['name'];?></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td>:</td>
				<td><?php echo @$user_profile['given_name'];?></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td>:</td>
				<td><?php echo @$user_profile['family_name'];?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo @$user_profile['email'];?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><?php echo @$user_profile['gender'];?></td>
			</tr>
			<tr>
				<td>Photo</td>
				<td>:</td>
				<td><img src="<?php echo $user_profile['picture'];?>" width="200"></td>
			</tr>
		</table>
		
		<p><a href="<?php echo site_url('Home/logout');?>">Sign Out</a></p>
	
	</div>
    </div>
</div>