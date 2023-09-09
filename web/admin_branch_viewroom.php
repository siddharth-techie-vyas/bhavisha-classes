<?php $branch_details = $admin->get_branch_one($_GET['id']); 

?>
<div class="card-header"><h4>View Rooms</h4></div>
<h4>Branch : <?php echo $branch_details[0]['branch_name']; ?></h4>

<div class="row">
	<div class="col-sm-12">
		<table class="table">
			<tr>
				<th>Nu of room</th>
				<th>Seating Capacity</th>
			</tr>
			<?php $room=$admin->branch_getrooms($_GET['id']); 
				foreach ($room as $k => $value) {
					
			?>
			<tr>
				<th><?php echo $room[$k]['room']; ?></th>
				<td><?php echo $room[$k]['nu_seats']; ?></td>
			</tr>
			<?php // code...
				}?>
		</table>
	</div>
</div>