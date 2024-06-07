<div class="card-header"><h4>Create / Edit User</h4></div>


<div class="card-body">

	<div class="row">
<div id="msguser"></div>
		
		<form name="user" id="user" action="<?php echo $base_url.'index.php?action=admin&utility=create_user';?>" method="post">
		<div class="col-sm-12">
			<div class="col-sm-2">
				<label>User Name</label>
				<input type="text" class="form-control" name="uname" value="">
			</div>
			<div class="col-sm-2">
				<label>Password</label>
				<input type="text" class="form-control" name="upass" value="">
			</div>	
			<div class="col-sm-2">
				<label>User Type</label>
				<select name="utype" class="form-control">
					<option>-- Select --</option>
					<?php $user = $admin->getonetype_meta_data('user_type'); 

						//	$user = array_unique($user0);
							foreach($user as $k=>$value)
							{
							    if($user[$k]['meta_value2']=='3'){continue;}
								echo "<option value='".$user[$k]['meta_value2']."'>".$user[$k]['meta_value1']."</option>";
							}
					?>
				</select>	
			</div>
			<div class="col-sm-2">
				<label>Email</label>
				<input type="text" class="form-control" name="email" value="">	
			</div>
			<div class="col-sm-2">
				<label>Contact</label>
				<input type="text" class="form-control" name="contact" value="">	
			</div>
			<div class="col-sm-2">
				<label>Branch</label>
				<select name="branch" class="form-control">
					<option>-- Select --</option>
					<?php $branch = $admin->get_allbranch(); 

						//	$user = array_unique($user0);
							foreach($branch as $k=>$value)
							{
								echo "<option value='".$branch[$k]['id']."'>".$branch[$k]['branch_name']."</option>";
							}
					?>
				</select>		
			</div>
			<div class="col-sm-2"><br>
				<input onclick="form_submit('user')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>

	</div>
<hr>
	<div class="row">
		<div class="col-sm-12">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Employee Code</th>
						<th>Password</th>
						<th>Type</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Branch</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php $allbranch = $admin->get_alluser_ofc(); 
					$counter =1;
					foreach ($allbranch as $k => $value) {
					    
					                if($allbranch[$k]['utype']=='1'){$utype="Admin"; $emp='BIA';} 
						            if($allbranch[$k]['utype']=='2'){$utype="Teacher"; $emp='BIT';} 
            						if($allbranch[$k]['utype']=='1'){$utype="Accounts"; $emp='BIAC';}
            						if($allbranch[$k]['utype']=='1'){$utype="Back Office"; $emp='BIB';}
            			
						?>
						
					<tr id="<?php echo $allbranch[$k]['id'];?>">
						<td><?php echo $counter++;?></td>
						<td><?php echo $allbranch[$k]['uname'];?></td>
						<td><?php echo $emp.'/'.$allbranch[$k]['id'];?></td>
						<td><?php echo $allbranch[$k]['upass'];?></td>
						<td><?php echo $utype;?></td>
						<td><?php echo $allbranch[$k]['phone'];?></td>
						<td><?php echo $allbranch[$k]['email'];?></td>
						<th>
							<input type="button" name="room" onclick="show_page_model('index.php?action=nocss_pages&page=admin_edit_user&id=<?php echo $allbranch[$k]['id'].'&type=admin';?>')" data-toggle="modal" data-target="#myModal"  class="btn btn-xs btn-warning" value="Edit">
						</th>
						<td><input type="button" onclick="deleteme('admin','delete_user','<?php echo $allbranch[$k]['id'];?>')" class="btn btn-xs btn-danger" value="Delete"></td>

					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php include('footer2.php');?>