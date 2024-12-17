
<div class='card-header'>
    <h4>Student Attendence</h4>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
        <form name="filer_class" id="filter_class" method="" action="<?php echo $base_url.'submission/teacher.php?page=get_student_attendence_filter';?>">

        <div class="col-sm-3">
		<label>Course</label>
		 <select class="form-control" id="courseid" name="course_name" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>">
                                <?php echo $allcourses[$key]['course_name'];?>
                              </option>  
                            <?php }?>
                            </select>
	</div>
	<div class="col-sm-3">
		<label>Faculty</label>
		<select name="teacher"  class="form-control" >
					<option>-- Select --</option>
					<?php $faculty = $admin->getonetype_user('2');  

						//	$user = array_unique($user0);
							foreach($faculty as $k=>$value)
							{
								echo "<option value='".$faculty[$k]['id']."'>".$faculty[$k]['uname']."</option>";
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
								echo "<option value='".$duration[$k]['meta_value2']."'>".$duration[$k]['meta_value1']." Minutes </option>";
							}
					?>
				</select>

	</div>
	<div class="col-sm-3"><br>
		<input type="button" onclick="form_result('filter_class')" name="submit" value="Search" class="btn btn-sm btn-primary"/>
        <input type="reset" name="reset" value="Reset" class="btn btn-sm btn-warning"/>
	</div>
	</form>


        </div>
    </div>
</div>



<div class="card-body">
<div>
<div class="row">
                    <div class="col-sm-12" id='msgfilter_class'>
                    <?php $counter=1; $result = $teacher->get_list_by_teacher_id($_SESSION['branch'], $_SESSION['uid']); 

                        if(empty($result))
                        {
                            echo "<div class='alert alert-info'><h4>No class has been alloted to you. !!!</h4></div>";
                        }
                                
                     foreach($result as $k => $value)
                            {
                            $randcolor = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
                            $time = date("d-m-Y H:i:s", strtotime($result[$k]['timing']));
                            $cname=$course->get_one($result[$k]['courseid'],'id'); 
                            $cname = $cname[0]['course_name'];
                            
                            $batch = $teacher->get_batch_details($result[$k]['batchid']);
                            $batch = $batch[0]['batch_name'];
                            
                            $sname=$course->get_one($result[$k]['subjectid'],'id'); 
                            $sname=$sname[0]['subject'];
                            
                            $minutes=$result[$k]['duration'].' Minutes';
                            
                            $teachername = $admin->getone_user($result[$k]['teacherid']);
                            ?>
                            <div class="col-sm-3" style="  padding:10px;">
                                <div style="text-align:left; padding-left:10px; border:2px solid #d8d8d8; border-radius:2px;">
                                    <a href="<?php echo $base_url.'index.php?action=dashboard&page=student_attendence2&id='.$result[$k]['id']; ?>" style="text-decoration:none; color:#000;">
                                    <h4><?php echo 'Lecture '.$counter++;?></h4>
                                    <?php echo '<b>Batch</b> : '.$batch;?><br>
                                    <?php echo '<b>Course</b> : '.$cname;?><br>
                                    <?php echo '<b>Subject</b> : '.$sname;?><br>
                                    <?php echo '<b>Time</b> : '.$result[$k]['timing'];?> To <?php $time2 = strtotime(''.$time.' + '.$result[$k]['duration'].' minute'); echo date("H:i:s", $time2);?><br>
                                    <?php echo '<b>Duration</b> : '.$minutes.' Minutes';?><br>
                                    <?php echo '<b>Teacher</b> : '.$teachername[0]['uname'];?>
                                    </a>
                                 </div>   
                            </div>    
                            
                            
                            <?php }
                            ?>
                        
                </div>
                
                
</div>
</div>
</div>



                                          