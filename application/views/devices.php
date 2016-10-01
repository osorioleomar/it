<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/jquery.dataTables.min.css">
<div class="table-responsive" style="margin-top:120px">
	<div class="row text-center">
		<button class="btn btn-success btn-raised" data-toggle="modal" data-target="#adddevice" id="btn_adddevice">register a new device</button>
	</div>
	<br>
	<table class="table table-bordered table-hover table-striped" id="table_devices">
		<thead>
			<tr>
				<th>Device Name</th>
				<th>Processor</th>
				<th>Memory</th>
				<th>Hard Drive</th>
				<th>Network Interfaces</th>
				<th>Video Card</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($devices as $device){
				echo "<tr>";
				echo "<td><strong>" . $device->devicename . "</strong></td>";
				echo "<td>" . $device->processor . "</td>";
				echo "<td>" . $device->memory . "</td>";
				echo "<td>" . $device->harddrive . "</td>";
				echo "<td>" . $device->nic . "</td>";
				echo "<td>" . $device->vga . "</td>";
				echo "<td><a href='#' class='btn btn-sm del_device' data='" . $device->id . "'><i class='fa fa-trash'></i></a><a href='#' class='btn btn-sm edit_device' data-toggle='modal' data-target='#edit_device' data='" . $device->id . "'><i class='fa fa-edit'></i></a></td>";
				echo "</tr>";
			}
		 ?>
		 </tbody>
	</table>
</div>


<!-- Modal for adding new device -->
<div class="modal fade" id="adddevice" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add New Device</h4>
            </div>
            <div class="modal-body">
		        <div class="form-group input-group">
					<span class="input-group-addon">Device Name:</span>
					<input required class="form-control" id="devicename" placeholder="e.g. losorio-pc">
				</div>
		        <div class="form-group input-group">
					<span class="input-group-addon">Serial #:</span>
					<input required class="form-control" id="serial" placeholder="e.g. 53R1AL-NUM3ER">
				</div>
		        <div class="form-group input-group">
					<span class="input-group-addon">Processor:</span>
					<input required class="form-control" id="processor" placeholder="e.g. Intel(R) Core(TM) i3 CPU M 380 @ 2.53Ghz">
				</div>
		        <div class="form-group input-group">
					<span class="input-group-addon">Memory:</span>
					<input required class="form-control" id="memory" placeholder="e.g. 6GB DDR3 SDRAM">
				</div>
		        <div class="form-group input-group">
					<span class="input-group-addon">Hard Drive:</span>
					<input required class="form-control" id="harddrive" placeholder="e.g. 500GB Western Digital HD">
				</div>
		        <div class="form-group input-group">
					<span class="input-group-addon">Network Interfaces:</span>
					<input required class="form-control" id="nic" placeholder="e.g. Intel(R) Centrino(R) Wireless-N 1000">
				</div>
		        <div class="form-group input-group">
					<span class="input-group-addon">Video Card:</span>
					<input required class="form-control" id="vga" placeholder="e.g. Intel HD Graphics">
				</div>
				<br>
				<button class="btn btn-raised btn-primary" id="btn_newdevice">Add</button>
            </div>
        </div>
    </div>
</div>

    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js" type="text/javascript"></script>
   	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
   	<script type="text/javascript">

   		$(document).ready(function(){
 	  		$("#table_devices").DataTable();
   		});

   	</script>