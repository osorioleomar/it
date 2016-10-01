
<link href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>" rel="stylesheet" />
<div style="margin:120px">
	
	<div style="background-color:rgb(251, 246, 147);padding:8px;border-radius:4px">	
		<div class="row">
			<div class="col-md-3">
				<input type="text" placeholder="username" id="username" class="form-control" />
			</div>
			<div class="col-md-3">
				<input type="text" placeholder="password" id="password" class="form-control" />
			</div>
			<div class="col-md-4">
				<input type="text" placeholder="full name" id="fullname" class="form-control" />
			</div>
			<div class="col-md-2">
				<select id="usertype" class="form-control">
					<option value="admin">Admin</option>
					<option value="user">User</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<a href="#" class="btn btn-raised btn-warning" id="newuser">CREATE</a>
				<a href="#" class="btn btn-raised btn-danger" id="clearUserForm">CLEAR</a>
			</div>
		</div>
	</div>

	<br><br>
	<div style="background-color:rgb(225, 225, 219);padding:8px;border-radius:4px">
		<h3>Active Users</h3>
		 <table class="table table-striped">
		 	<thead style="font-weight:bold">
		 		<td>USERNAME</td>
		 		<td>FULL NAME</td>
		 		<td>USER TYPE</td>
		 		<td>actions</td>
		 	</thead>
		 	<tbody>
		<?php foreach ($users as $row) { ?>
			<tr>
				<td><?php echo $row->username ?></td>
				<td><?php echo $row->name ?></td>
				<td><?php echo $row->usertype ?></td>
				<td><a href="#" id="deleteUser" data-target="<?php echo $row->userid; ?>"><i class="fa fa-trash text-danger"></i></a> | <a href="#" target="<?php echo $row->userid; ?>" id="changePasswordTrigger" data-toggle="modal" data-target="#changePassword">change password</a></td>
			</tr>	
		<?php } ?>	 
			</tbody>	
		 </table>
	</div>
</div>

