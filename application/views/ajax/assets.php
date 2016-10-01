<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/jquery.dataTables.min.css">
<div class="table-responsive" style="margin-top:120px">
	<table class="table table-bordered table-hover table-striped" id="table_active_ip">
		<thead>
			<tr>
				<th>IP Address</th>
				<th>Username</th>
				<th>Device Type</th>
				<th>Computer Name(if applicable)</th>
				<th>MAC Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($details as $row){
				echo "<tr>";
				echo "<td><strong>" . $row->ip . "</strong></td>";
				echo "<td>" . $row->username . "</td>";
				echo "<td>" . $row->device . "</td>";
				echo "<td>" . $row->computername . "</td>";
				echo "<td>" . $row->macaddress . "</td>";
				echo "<td><a href='#' class='btn btn-sm delete' data='" . $row->ip . "'><i class='fa fa-trash'></i></a><a href='#' class='btn btn-sm edit' data-toggle='modal' data-target='#editip' data='" . $row->ip . "'><i class='fa fa-edit'></i></a></td>";
				echo "</tr>";
			}
		 ?>
		 </tbody>
	</table>
</div>

    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js" type="text/javascript"></script>
   	<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
   	<script type="text/javascript">
   		$(document).ready(function(){
 	  		$("#table_active_ip").DataTable();
   		})
   	</script>