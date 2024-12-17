
<div class="card-header"><h4>Declare Result(s)</h4></div>
<div class="card-body">

	<div class="row">

		
		<form name="class" id="class_result" action="<?php echo $base_url.'submission/teacher.php?page=get_result';?>" method="get">
			<input type="hidden" name="syear" value="<?php echo $_SESSION['syear']; ?>">
			
			<div class="col-sm-12">
			

					<div class="col-md-3">
                          <label>Get Result Awaited Batch</label>
                           <select name="branchid" class="form-control" id="branch" >
                              <option disabled='disabled' selected='selected'>-- Select --</option>
                              <?php $batch_aw = $teacher->get_all_batches_awaited($_SESSION['syear'],$_SESSION['branch']); 

                                //  $user = array_unique($user0);
                                  foreach($batch_aw as $k=>$value)
                                  {
                                    echo "<option value='".$batch_aw[$k]['id']."'>".$batch_aw[$k]['batch_name']."</option>";
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

	</div>
<hr>
	<div id="msgclass_result" class="row">
			

	</div>
</div>
