<div class="card-header"><h4>Create / Edit A Class</h4></div>


<div class="card-body">

	<div class="row">
<div id="msgclass"></div>
		
		<form name="class" id="class" action="<?php echo $base_url.'index.php?action=teacher&query=create_class';?>" method="post">
		<div class="col-sm-12">

					<div class="col-md-4">
                          <label>Batch Name</label>
                  				<input type="hidden" value="<?php echo $_SESSION['syear']; ?>" name="syear">
                  				<input type="hidden" value="<?php echo $_SESSION['branch']; ?>" name="branch">

                           <select class="form-control" id="batchid" name="batch" onchange="get_batch_details('course','batchid','courseid')">
                              <option disabled="" selected="">-- Select Batch --</option>
                              <?php $batch = $teacher->get_all_batches($_SESSION['syear'],$_SESSION['branch']);  foreach ($batch as $key => $value) {?>
                              <option value="<?php echo $batch[$key]['id'];?>">
                                <?php echo $batch[$key]['batch_name'];?>
                              </option>  
                            <?php }?>
                            </select>
                          
                        </div>


                        <div class="col-md-4">
                          <label>Course Name</label>
                           <select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              
                            </select>
                          
                        </div>

                      	<div class="col-md-4">
                          <label>Subject</label>
                            <select class="form-control" name="subject" id="subject" style="width:90%; display:inline;">
                             <option disabled="" selected="">-- Select ---</option>
                            </select>

                        </div>

                        <!--<div class="col-md-4">
                          <label>Demo Class</label><br>
                            <input type="radio" value="1" name="demo" > Yes
                            <input type="radio" value="0" name="demo" checked="checked" > No
												</div>-->


                     
			<div class="col-sm-2">
				<label>Day</label><br>
				<select name="days[]" id="days" class="form-control" multiple="multiple">
					<option>-- Select --</option>
					<?php $day = $admin->getonetype_meta_data('weekdays');  

						//	$user = array_unique($user0);
							foreach($day as $k=>$value)
							{
								echo "<option value='".$day[$k]['meta_value2']."'>".$day[$k]['meta_value1']."</option>";
							}
					?>
				</select>		
			</div>

			<div class="col-sm-2">
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

			
			<div class="col-sm-2">
				<label>Start Date</label>
				<input type="date" class="form-control" name="start_date">
			</div>


			<div class="col-sm-2">
				<label>Time</label>
				<input type="time" class="form-control" name="timing">
			</div>	

			<div class="col-sm-2">
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
			<div class="col-sm-2"><br>
				<input onclick="form_submit('class')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>

	</div>
<hr>
	
</div>

<div class="card">

<div class="card-body">
	<div class="row">
		<div class="col-sm-12" id="data_batch">

			
		</div>
	</div>
</div>
						</div>	


<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#days').multiselect();
      	load_page('submission/teacher.php?page=all_classes','data_batch');
    });
</script>
<?php include('footer.php');?>