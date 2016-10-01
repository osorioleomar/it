<?php
	foreach($details as $row){ ?>
		<div class="form-group input-group">
			<span class="input-group-addon">IP Address</span>
			<input type="text" disabled id="edit_ip" placeholder="192.168.8.x" value="<?php echo $row->ip ?>" />
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon">Computer Name</span>
			<input class="form-control" type="text" id="edit_computername" placeholder="type the device name"  value="<?php echo $row->computername; ?>" />
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon">Username</span>
			<input class="form-control" type="text" id="edit_username" placeholder="e.g l.osorio" value="<?php echo $row->username ?>" />
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon">Department</span>
			<select class="form-control" id="edit_department" value="<?php echo $row->department ?>" >
				<option>N/A</option>
				<option>Corporate Sales</option>
				<option>Technical Solutions</option>
				<option>Accounting</option>
				<option>Marketing</option>
				<option>Information Technology</option>
				<option>Human Resource</option>
				<option>Admin</option>
				<option>Service Bureau</option>
				<option>ProjectPro</option>
				<option>Training Center</option>
			</select>
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon">Device</span>
			<input class="form-control" type="text" id="edit_device" placeholder="e.g iPhone 6s" value="<?php echo $row->device ?>" />
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon">Mac Address</span>
			<input class="form-control" type="text" id="edit_macaddress" placeholder="e.g. 1a:2b:3c:4d:5e:6f" value="<?php echo $row->macaddress ?>" />
		</div>
		<button class="btn btn-raised btn-primary" id="submitedit"><span><i class="glyphicon glyphicon-save"></i></span> Update</button>
<?php	};
?>