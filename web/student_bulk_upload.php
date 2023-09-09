<div class='card-header'>
<h4>Student Bulk Upload</h4>
</div>

<div class="content">

  <div class="row">

<div class="col-sm-12">
 <form action="<?php echo $base_url.'submission/student.php?page=student_bulk';?>" method="post" name="studnet_bulk" id="student_bulk" class="form-sample" enctype="multipart/form-data">

    <div class="card-body">
      <div id="msgstudent_bulk"></div>
         
        <div class="col-md-3">
        <label>Session</label>
        <select class="form-control" name="syear" required>
        <option value="">--Select--</option>
                        <?php $session_y = $admin->get_session_year();
                        foreach ($session_y as $key => $value) {
                            echo "<option value='".$session_y[$key]['id']."'>".$session_y[$key]['syear']."</option>";
                        }
                        ?>
            
        </select>
        </div>

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
              <select name="batch" id="batchid" class="form-control" required>
                 <option disabled="disabled" selected="selected" style="font-weight: bold;">-- Batch --</option>
              </select>
      </div>

      <div class="col-md-3">
        <div class="form-group row">
          <label>File (CSV)</label>
            <input type='file' name='file' class='form-control' required>
          </div>
      </div>

      <div class="col-sm-6">
        <a href='<?php echo $base_url.'theme/images/Student_bulk.csv';?>' class='btn btn-warning btn-md'>Download Sample File</a>&nbsp;
        <input type="button" name="bulkupload" value="Upload" class="btn btn-success btn-md" onclick="form_result('student_bulk')">

      </div>


</div>                      

</form>
</div>





</div>


<div id="msgstudent_bulk" class="row"></div>


</div>

</div>



