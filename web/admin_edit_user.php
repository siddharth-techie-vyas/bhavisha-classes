<div class="card-header"><h4>Edit User</h4></div>

<?php
$user2=$admin->getone_user($_GET['id']);
?>

<div class="card-body">

	<div class="row">
        <div id="msguser0"></div>
		
		<form name="user" id="user0" action="<?php echo $base_url.'index.php?action=admin&utility=edit_user';?>" method="post">
		<div class="col-sm-12">
			<div class="col-sm-4">
				<label>User Name</label>
				<input type="hidden" class="form-control" name="id" value="<?php echo $user2[0]['id']; ?>">
				<input type="text" class="form-control" name="uname" value="<?php echo $user2[0]['uname']; ?>">
			</div>
			<div class="col-sm-4">
				<label>Password</label>
				<input type="text" class="form-control" name="upass" value="<?php echo $user2[0]['upass']; ?>">
			</div>	
			<div class="col-sm-4">
				<label>User Type</label>
				<select name="utype" class="form-control">
					<option>-- Select --</option>
					<?php $user = $admin->getonetype_meta_data('user_type'); 

						//	$user = array_unique($user0);
							foreach($user as $k=>$value)
							{
							    if($user[$k]['meta_value2']=='3'){continue;}
							    
								echo "<option value='".$user[$k]['meta_value2']."' ";
								if($user[$k]['meta_value2']==$user2[0]['utype']){echo "selected='selected'";}
								echo ">".$user[$k]['meta_value1']."</option>";
							}
					?>
				</select>	
			</div>
			<div class="col-sm-4">
				<label>Email</label>
				<input type="text" class="form-control" name="email" value="<?php echo $user2[0]['email']; ?>">	
			</div>
			<div class="col-sm-4">
				<label>Contact</label>
				<input type="text" class="form-control" name="contact" value="<?php echo $user2[0]['phone']; ?>">	
			</div>
			<div class="col-sm-4">
				<label>Branch</label>
				<select name="branch" class="form-control">
					<option>-- Select --</option>
					<?php $branch = $admin->get_allbranch(); 

						//	$user = array_unique($user0);
							foreach($branch as $k=>$value)
							{
								echo "<option value='".$branch[$k]['id']."' ";
								if($branch[$k]['id']=$user2[0]['branchid']){echo "selected='selected'";}
								echo ">".$branch[$k]['branch_name']."</option>";
							}
					?>
				</select>		
			</div>
			<div class="col-sm-12"><br>
				<input onclick="form_submit('user0')" type="button" name="submit" value="Edit" class="btn btn-info btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>

	</div>
	
</div>	