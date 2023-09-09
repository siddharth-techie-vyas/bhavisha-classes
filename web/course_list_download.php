
<div class="card-header"><h4>Subject & Topic List</h4></div>
<div class="card-body">

	<div class="row">

		
			
<div class="col-sm-12">
    	<form name="class" id="class_result" action="<?php echo $base_url.'submission/teacher.php?page=course_list';?>" method="get">
	                  <div class="col-md-3">
                          <label>Class</label>
                           <select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>">
                                <?php echo $allcourses[$key]['course_name'];?>
                              </option>  
                            <?php }?>
                            </select>
                      </div>

                      <div class="col-md-3">
                          <label>Subject</label>
                            <select class="form-control" name="subject" id="subject" onchange="get_details('subject','subject','chapter')">
                                
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allsubject = $course->viewall_subject();  foreach ($allsubject as $key => $value) {?>
                              <option value="<?php echo $allsubject[$key]['id'];?>">
                                <?php echo $allsubject[$key]['subject'];?>
                              </option> 
                              <?php }?>
                            </select>
                      </div>

                      <div class="col-md-3">
                          <label>Chapter Name</label>
                            <select class="form-control js-example-basic-multiple w-100" name="chapter" id="chapter">
                            
                             <option disabled="" selected="">-- Select Course --</option>
                              <?php $allchapter = $course->viewall_chapter();  foreach ($allchapter as $key => $value) {?>
                              <option value="<?php echo $allchapter[$key]['id'];?>">
                                <?php echo $allchapter[$key]['chapter'];?>
                              </option> 
                              <?php }?>
                            </select>
                      </div>


                      <div class="col-md-1">
                          <br><input type='button' class="btn btn-success btn-sm" value="Search" onclick="form_result('class_result')">
                      </div>

                      <div class="col-md-1">
                          <br><input type='rest' class="btn btn-info btn-sm" value="Reset" >
                      </div>
</form>
</div>
                 
		
<hr>
	<div id="msgclass_result" class='col-sm-12'>
			

	</div>
</div>
