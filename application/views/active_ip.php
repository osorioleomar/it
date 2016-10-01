<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/jquery.dataTables.min.css">
<div class="table-responsive" style="margin-top:120px">
	<table class="table table-bordered table-hover table-striped" id="table_active_ip">
		<thead>
			<tr>
				<th>IP Address</th>
				<th>Username</th>
				<th>Department</th>
				<th>Device Type</th>
				<th>Computer Name(if applicable)</th>
				<th>MAC Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php

			$color = array(
				"Technical Solutions"=>"background-color:rgba(251, 192, 45, 0.28)",
				"Corporate Sales"=>"background-color:rgba(187, 30, 75, 0.42)",
				"Marketing"=>"background-color:rgba(113, 13, 140, 0.42)",
				"Accounting"=>"background-color:rgba(6, 5, 202, 0.42)",
				"Training Center"=>"background-color:rgba(3, 160, 183, 0.42)",
				"Admin"=>"background-color:rgba(1, 107, 8, 0.82)",
				"Information Technology"=>"background-color:rgba(61, 187, 30, 0.42)",
				"Human Resource"=>"background-color:rgba(111, 21, 3, 0.71)",
				"Service Bureau"=>"background-color:rgba(132, 111, 16, 0.71)",
				"ProjectPro"=>"background-color:#03a9f4",
				"N/A"=>"background-color:rgba(51, 51, 51, 0.62)",
				);

			foreach($details as $row){
				echo "<tr>";
				echo "<td style='" . $color[$row->department] . "'><strong>" . $row->ip . "</strong></td>";
				echo "<td>" . $row->username . "</td>";
				echo "<td>" . $row->department . "</td>";
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