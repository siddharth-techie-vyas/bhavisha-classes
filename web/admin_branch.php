
<div class="card-header"><h4>Create / Edit Branch</h4></div>


<div class="card-body">

	<div class="row">
<div id="msgbranch"></div>
		
		<form name="branch" id="branch" action="<?php echo $base_url.'index.php?action=admin&utility=create_branch';?>" method="post">
		<div class="col-sm-12">
			<div class="col-sm-3">
				<label>Branch Name</label>
				<input type="text" class="form-control" name="branch_name" value="">
			</div>
			<div class="col-sm-4">
				<label>Address</label>
				<input type="text" class="form-control" name="address" value="">
			</div>	
			<div class="col-sm-3">
				<label>Contact</label>
				<input type="text" class="form-control" name="contact" value="">
			</div>
			<div class="col-sm-2"><br>
				<input onclick="form_submit('branch')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>

	</div>

	<div class="row">
		<div class="col-sm-12">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Branch Name</th>
						<th>Address</th>
						<th>Contact</th>
						<th>Room(s)</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php $allbranch = $admin->get_allbranch(); 
					$counter =1;
					foreach ($allbranch as $k => $value) {
						?>
					<tr id="row<?php echo $allbranch[$k]['id'];?>">
						<td><?php echo $counter++;?></td>
						<td><?php echo $allbranch[$k]['branch_name'];?></td>
						<td><?php echo $allbranch[$k]['address'];?></td>
						<td><?php echo $allbranch[$k]['contact'];?></td>
						<th>
							<input type="button" name="room" onclick="show_page_model('index.php?action=nocss_pages&page=admin_branch_addroom&id=<?php echo $allbranch[$k]['id'].'&type=admin';?>')" data-toggle="modal" data-target="#myModal"  class="btn btn-xs btn-info" value="Add">
							<a onclick="show_page_model('index.php?action=nocss_pages&page=admin_branch_viewroom&id=<?php echo $allbranch[$k]['id'].'&type=admin';?>')" data-toggle="modal" data-target="#myModal" href="#">(<?php $branch_total_rooms=$admin->branch_getrooms($allbranch[$k]['id']); echo count($branch_total_rooms);?>)</a>
						</th>
						<td><input type="button" onclick="deleteme('admin','delete_branch','<?php echo $allbranch[$k]['id'];?>')" class="btn btn-xs btn-danger" value="Delete"></td>

					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php include('footer2.php');?>