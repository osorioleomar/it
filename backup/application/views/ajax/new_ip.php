<div class="form-group input-group">
	<span class="input-group-addon">IP Address</span>
	<select class="form-control" id="ip">
		<?php 
			foreach($available_ip as $ip){
				echo "<option id=" . $ip->id . " >" . $ip->ip . "</option>";
			}
		 ?>
	</select>
</div>
<div class="form-group input-group">
	<span class="input-group-addon">Computer Name</span>
	<input class="form-control" type="text" id="computername" placeholder="<Department><DeviceType><Order><IP>" />
</div>
<div class="form-group input-group">
	<span class="input-group-addon">Username</span>
	<input class="form-control" type="text" id="username" placeholder="e.g. l.osorio" />
</div>
<div class="form-group input-group">
	<span class="input-group-addon">Department</span>
	<select class="form-control" id="department">
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
	<input class="form-control" type="text" id="device" placeholder="e.g. Asus p42f" />
</div>
<div class="form-group input-group">
	<span class="input-group-addon">Mac Address</span>
	<input class="form-control" type="text" id="macaddress" placeholder="xx:xx:xx:xx:xx:xx" />
</div>
<button class="btn btn-sm btn-primary" id="registernewip"><span><i class="glyphicon glyphicon-save"></i></span> Register</button>