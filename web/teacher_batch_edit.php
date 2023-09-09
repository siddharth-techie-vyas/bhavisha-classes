<?php 
	$batch0=$teacher->get_one_batch($_GET['id']);
?>

<h3>Edit Branch Details</h3>
<hr>
	<div id="msgbatchedit"></div>
		<form name="batchedit" id="batchedit" action="<?php echo $base_url.'index.php?action=teacher&query=edit_batch';?>" method="post">
			<input type="hidden" value="<?php echo $batch0[0]['id'];?>" name="id">
			<input type="hidden" value="<?php echo $batch0[0]['session'];?>" name="session">
		<div class="col-sm-12">
			
				<div class="col-sm-5">
				<label>Branch</label>
				<select name="branch" class="form-control" >
					<?php $branch = $admin->get_branch_all(); 
						foreach($branch as $k=>$value)
							{
								echo "<option value='".$branch[$k]['id']."'";
					
								if($batch0[0]['branch']==$branch[$k]['id'])
									{echo "selected='selected'";}

								echo ">".$branch[$k]['branch_name']."</option>";
							}
					?>
				</select>		
			</div>


					<div class="col-md-5">
                          <label>Course</label>
                           <select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>" <?php if($batch0[0]['course']==$allcourses[$key]['id']){echo "selected='selected'";}?>>
                                <?php echo $allcourses[$key]['course_name'];?>
                              </option>  
                            <?php }?>
                            </select>
                          
                        </div>

         <div class="col-md-5">
         	<label>Batch Name</label>
         	<input type="text" class="form-control" name="batch_name" value="<?php echo $batch0[0]['batch_name'];?>">
         </div>

         <div class="col-md-5">
         	<label>Start Date</label>
         	<input type="date" class="form-control" name="start_date" value="<?php echo $batch0[0]['start_date'];?>">
         </div>               
                      	
			<div class="col-sm-5"><br>
				<input onclick="form_submit('batchedit')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>