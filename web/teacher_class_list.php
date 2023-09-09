
<div class="card-header"><h4>Class List</h4></div>
<div class="card-body">

	<div class="row">

		
		<form name="class" id="class_result" action="<?php echo $base_url.'submission/teacher.php?page=class_list';?>" method="get">
			<input type="hidden" name="syear" value="<?php echo $_SESSION['syear']; ?>">
			
			<div class="col-sm-12">
			

					<div class="col-md-3">
                          <label>Branch</label>
                           <select name="branchid" class="form-control" id="branch" >
                              <option disabled='disabled' selected='selected'>-- Select --</option>
                              <?php $branch = $admin->get_allbranch(); 

                                //  $user = array_unique($user0);
                                  foreach($branch as $k=>$value)
                                  {
                                    echo "<option value='".$branch[$k]['id']."'>".$branch[$k]['branch_name']."</option>";
                                  }
                              ?>
                            </select> 
                          
                        </div>

                      	<div class="col-md-3">
                          <label>Teacher</label>
                            <select name="teacher" class="form-control" required>
                               <option disabled="disabled" selected="selected" style="font-weight: bold;">-- Faculties --</option>
                              <?php $reference1 = $admin->getonetype_user('2');
                                    foreach($reference1 as $k => $value)
                                    {
                                      echo "<option value='".$reference1[$k]['id']."'>".$reference1[$k]['uname']."</option>";
                                    }
                               ?>
                            </select>
                        </div>

			<div class="col-sm-3">
				<label>Duration</label>
				<select class="form-control" name="duration">
					<option disabled="disabled" selected="selected">--Select--</option>
					<?php $duration = $admin->getonetype_meta_data('class_duration');  

						//	$user = array_unique($user0);
							foreach($duration as $k=>$value)
							{
								echo "<option value='".$duration[$k]['meta_value2']."' " ;
								if($class0[0]['duration']==$duration[$k]['meta_value2']){ echo "selected='selected'"; }
								echo ">".$duration[$k]['meta_value1']." Minutes </option>";
							}
					?>
				</select>

			</div>



			<div class="col-sm-3"><br>
				<input onclick="form_result('class_result')" type="button" name="submit" value="Search" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>

	<span style="color:red; display:block; left:20%;">Note : Select Any One For Any Result</span>
	</div>
<hr>
	<div id="msgclass_result" class="row">
			

	</div>
</div>
