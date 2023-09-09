<div class='card-header'>
    <h4>Add/Update Beneficiery</h4>
</div>

<div class="content">
<div class="row">
<div class="col-sm-12">
                <div class="card-body">
                  <div id="msgcreate_course"></div>

  <form action="<?php echo $base_url.'index.php?action=accounts&query=add_bankk';?>" method="post" name="acc_bank" id="acc_bank" class="form-sample">

    <div class="row">
      <div class="col-md-3">
          <label>Beneficiery Name</label>
          <input type="text" name="course_name" class="form-control" required>
      </div>

      <div class="col-md-2">
          <label>Beneficiery Type</label><br>
          Debitor <input type="radio" name="course_name"  required>
          Creditor <input type="radio" name="course_name"  required>
      </div>

      <div class="col-md-2">
          <label>Bank name</label>
          <input type="text" name="course_name" class="form-control" required>
      </div>

      <div class="col-md-2">
          <label>A/c No</label>
          <input type="text" name="course_name" class="form-control" required>
      </div>

      <div class="col-md-3">
          <label>Opening Balance</label>
          <input type="text" name="course_name" class="form-control" required>
      </div>

      <div class="col-md-2">
          <div class="col-sm-6"><input type="button" onclick="form_submit('create_course')" class="btn btn-success btn-md" value="Save"></div>
          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div> 
        </div>

      </div>



    </div>

  </form>

               

            
                  <table class="table">

                    <thead>

                      <tr>
                        <th>S.No.</th>
                        <th>Bank Name</th>
                        <th>IFSC</th>
                        <th>A/c No.</th>
                        <th>Opening Balance</th>
                      </tr>

                    </thead>

                    <tbody>

                     

                    </tbody>

                  </table>

                </div>

</div>
</div>
        
