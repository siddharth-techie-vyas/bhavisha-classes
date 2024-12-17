<div class="card-header"><h4>Holidays and Leaves</h4></div>


<div class="card-body">
<?php
if(isset($_GET['status']))
{
    if($_GET['status']=='1'){echo "<div class='alert alert-success'>Holiday Added !!!</div>";}
    if($_GET['status']=='2'){echo "<div class='alert alert-danger'>Something went wrong !!!</div>";}
}
?>
<form name="holidays" action="<?php echo $base_url.'index.php?action=admin&query=add-holiday';?>" method="post">
	    <div class="row">
            <div class="col-sm-4">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-sm-4">
                <label>Holiday Name</label>
                <input type="text" name="holiday" class="form-control" required>
            </div>
            <div class="col-sm-2"><br><input type="reset" name="reset" value="Reset" class="btn btn-warning"></div>
            <div class="col-sm-2"><br><input type="submit" name="submit" value="Submit" class="btn btn-success"></div>
        </div>
</form>        
    
</div>



<div class="card-body">
    
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
					<tr id="<?php echo $holiday[$k]['id'];?>">
						<td><?php echo $counter++;?></td>
						<td><?php echo $date = date("d-m-Y", strtotime($holiday[$k]['holiday_date'])); ?></td>
						<td><?php echo $holiday[$k]['holiday'];?></td>
						<td><i class='btn-xs fa fa-trash' onclick="deleteme('admin','delete_holiday','<?php echo $holiday[$k]['id'];?>')"></td>
					</tr>	
					<?php }?>
				</tbody>
			</table>
		</div>
</div>

</div>				
					
	