<div class="card-header"><h4>Student Fee(s)</h4></div>

<div class="card-body">

	<div class="row">
		<form name="class" id="class_result" action="<?php echo $base_url.'submission/student.php?page=student_fee_list';?>" method="post">
			<div class="col-sm-12">
					<div class="col-md-3">

                          <label>Branch</label>

                           <select name="branchid" class="form-control" id="branchid" onchange="get_related_data('teacher','get_all_branch_batches','branchid','batchid')">

                              <option disabled='disabled' selected='selected'>-- Select --</option>

                              <?php $branch = $admin->get_allbranch(); 

                                  foreach($branch as $k=>$value)

                                  {

                                    echo "<option value='".$branch[$k]['id']."'>".$branch[$k]['branch_name']."</option>";

                                  }

                              ?>

                            </select> 

                          

                        </div>



                      	<div class="col-md-3">

                          <label>Batch</label>

                            <select name="batchid" id="batchid" class="form-control" required>
                              
                            </select>

                        </div>



			<div class="col-sm-3">

				<label>Student Name</label>

				<input type="text" value="" class="form-control" name="student_name">

			</div>

			<div class="col-sm-3">

				<label>Student Reg. #</label>

				<input type="text" value="" placeholder="Type number after Bha00 eg:- 89, 59" class="form-control" name="id">

			</div>







			<div class="col-sm-3"><br>

				<input onclick="form_result('class_result')" type="button" name="submit" value="Search" class="btn btn-success btn-md">

				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">

			</div>

				<div class="col-sm-12"><br>
					<span style="color:red">Note : Choose any one or all for an accurate result</span>
				</div>


		</div>

		</form>
	</div>

<hr>

<div id="msgclass_result"></div>

</div>

