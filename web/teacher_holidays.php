<div class="card-header"><h4>Holidays and Leaves</h4></div>


<div class="card-body">

	<div class="row">
<div id="msgholiday"></div>

<div class="row">
		<div class="col-sm-12">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Date</th>
						<th>Holiday</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$counter =1;
						$holiday = $teacher->get_holidays();
						foreach ($holiday as $k => $value) {?>
					<tr>
						<td><?php echo $counter++;?></td>
						<td><?php echo $date = date("d-m-Y", strtotime($holiday[$k]['holiday_date'])); ?></td>
						<td><?php echo $holiday[$k]['holiday'];?></td>
						<td><i class="fa fa-trash"></i> <i class="fa fa-pencil"></i> </td>
					</tr>	
					<?php }?>
				</tbody>
			</table>
		</div>
</div>

</div>				
					
	