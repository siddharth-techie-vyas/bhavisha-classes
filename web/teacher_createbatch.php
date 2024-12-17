<div class="card-header"><h4>Create / Edit A Batch</h4></div>


<div class="card-body">

	<div class="row">
<div id="msgbatch"></div>
		
		<form name="batch" id="batch" action="<?php echo $base_url.'index.php?action=teacher&query=create_batch';?>" method="post">
		<div class="col-sm-12">
			
				<div class="col-sm-3">
				<label>Branch</label>
				<select name="branch" class="form-control" >
					<?php $branch = $admin->get_branch_one($_SESSION['branch']); 

						//	$user = array_unique($user0);
							foreach($branch as $k=>$value)
							{
								echo "<option value='".$branch[$k]['id']."'>".$branch[$k]['branch_name']."</option>";
							}
					?>
				</select>		
			</div>


					<div class="col-md-3">
                          <label>Course</label>
                           <select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>">
                                <?php echo $allcourses[$key]['course_name'];?>
                              </option>  
                            <?php }?>
                            </select>
                          
                        </div>

         <div class="col-md-2">
         	<label>Batch Name</label>
         	<input type="text" class="form-control" name="batch_name">
         </div>

         <div class="col-md-2">
         	<label>Start Date</label>
         	<input type="date" class="form-control" name="start_date">
         </div>               
                      	
			<div class="col-sm-2"><br>
				<input onclick="form_submit('batch')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
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
		<div class="col-sm-12" id='data_batch'>
		</div>
	</div>
</div>

</div>
<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
      	load_page('submission/teacher.php?page=all_batch','data_batch');
    });
</script>
</div>
<?php include('footer.php');?>