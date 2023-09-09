<?php 
	$class0=$teacher->get_one_class($_GET['id']);
?>
<div class="card-header"><h4>Edit A Class</h4></div>
<div class="card-body">

	<div class="row">
<div id="msgclass_edit"></div>
		
		<form name="class" id="class_edit" action="<?php echo $base_url.'index.php?action=teacher&query=edit_class';?>" method="post">
			<input type="hidden" name="id" value="<?php echo $class0[0]['id'] ?>">
		<div class="col-sm-12">
			

					<div class="col-md-6">
                          <label>Branch</label>
                           <select name="branchid" class="form-control" id="branch" >
                              <option>-- Select --</option>
                              <?php $branch = $admin->get_allbranch(); 

                                //  $user = array_unique($user0);
                                  foreach($branch as $k=>$value)
                                  {
                                    echo "<option value='".$branch[$k]['id']."' " ;
                                    if($branch[$k]['id']==$class0[0]['branchid'])
                                    	{echo "selected='selected'";}
                                    echo ">".$branch[$k]['branch_name']."</option>";
                                  }
                              ?>
                            </select> 
                          
                        </div>



					<div class="col-md-6">
                          <label>Course</label>
                           <select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>" <?php if($class0[0]['courseid']==$allcourses[$key]['id']){?>selected="selected"<?php }?> >
                                <?php echo $allcourses[$key]['course_name'];?>
                              </option>  
                            <?php }?>
                            </select>
                          
                        </div>

                      	<div class="col-md-6">
                          <label>Subject</label>
                            <select class="form-control" name="subject" id="subject">
                             <option value="<?php echo $class0[0]['subjectid'];?>"><?php $sname=$course->get_one($class0[0]['subjectid'],'id'); echo $sname[0]['subject'];?></option>
                            </select>
                        </div>

                     
			<div class="col-sm-6">
				<label>Day</label><br>
					<?php $day = $admin->getonetype_meta_data('weekdays');  

						$days = $class0[0]['day']; 
						foreach($day as $k=>$value)
							{
							?>
							<input type='checkbox' name='days[]' value="<?php echo $day[$k]['meta_value2'];?>" <?php if(strpos($days,$day[$k]['meta_value2']) !== false){?>checked="checked"<?php }?>/><?php echo $day[$k]['meta_value1'];?><br>

					<?php	}?>
				

			</div>

			<div class="col-sm-6">
				<label>Faculty</label>
				<select name="teacher"  class="form-control" >
					<option>-- Select --</option>
					<?php $faculty = $admin->getonetype_user('2');  

						//	$user = array_unique($user0);
							foreach($faculty as $k=>$value)
							{
					?>
					<option value='<?php echo $faculty[$k]['id'];?>' <?php if($faculty[$k]['id']==$class0[0]['teacherid']){?>selected="selected"<?php }?>><?php echo $faculty[$k]['uname'];?></option>
					<?php		}
					?>
				</select>		
			</div>

			<div class="col-sm-6">
				<label>Time</label>
				<input type="time" class="form-control" name="timing" value="<?php echo $class0[0]['timing'];?>">
			</div>	

			<div class="col-sm-6">
				<label>Duration</label>
				<select class="form-control" name="duration">
					<option disabled="disabled">--Select--</option>
					<?php $duration = $admin->getonetype_meta_data('class_duration');  

						//	$user = array_unique($user0);
							foreach($duration as $k=>$value)
							{
								echo "<option value='".$duration[$k]['meta_value2']."' " ;
								if($class0[0]['duration']==$duration[$k]['meta_value1']){ echo "selected='selected'"; }
								echo ">".$duration[$k]['meta_value1']." Minutes </option>";
							}
					?>
				</select>

			</div>



			<div class="col-sm-6"><br>
				<input onclick="form_submit('class_edit')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>

	</div>
</div>
