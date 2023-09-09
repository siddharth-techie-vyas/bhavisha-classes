<?php $edit=$accounts->get_one_account($_GET['id']);?>
<div class='card-header'>

                        <h4>Update Bank Details</h4>

                    </div>

<div class="content">

<div class="row">

<div class="col-sm-12">

                <div class="card-body">

                  <div id="msgedit_bank">
                     
                  </div>

  <form action="<?php echo $base_url.'index.php?action=master&query=edit_bank';?>" method="post" name="edit_bank" id="edit_bank" class="form-sample">

    <input type="hidden" value="<?php echo $edit[0]['id'];?>" name='id'/>

    <div class="row">

        <div class="col-md-3">
          <label>A/c Name</label>
          <input type="text" name="acc_name" class="form-control" value="<?php echo $edit[0]['acc_name'];?>" required>
      </div>
      
      <div class="col-md-3">
          <label>Bank Name</label>
          <input type="text" name="bank_name" class="form-control" value="<?php echo $edit[0]['bank_name'];?>">
      </div>

      <div class="col-md-3">
          <label>IFSC</label>
          <input type="text" name="ifsc" class="form-control" value="<?php echo $edit[0]['ifsc'];?>">
      </div>

      <div class="col-md-3">
          <label>A/c No</label>
          <input type="text" name="acc_nu" class="form-control" value="<?php echo $edit[0]['acc_nu'];?>">
      </div>

      <div class="col-md-4">
          <label>Opening Balance</label>
          <input type="text" name="opening_balance" class="form-control" value="<?php echo $edit[0]['opening_balance'];?>" required>
      </div>
      
       <div class="col-md-3">
          <label>Acc Type</label>
          <select name="acc_type" class='form-control' required>
              <option disabled='' selected='selected'>--Select--</option>
              <option value='current' <?php if($edit[0]['acc_type']=='current'){?>selected='selected'<?php }?>>Current</option>
              <option value='saving' <?php if($edit[0]['acc_type']=='saving'){?>selected='selected'<?php }?>>Saving</option>
              <option value='cash' <?php if($edit[0]['acc_type']=='cash'){?>selected='selected'<?php }?>>Cash</option>
          </select>
      </div>
      
       <div class="col-md-5">
          <label>UPI ID</label>
          <input type="text" name="upi" value="<?php echo $edit[0]['upi'];?>" class="form-control">
      </div>
    
    <div class="col-md-3">
          <label>Status</label>
        <select name="status" class='form-control' required>
              <option disabled='' selected='selected'>--Select--</option>
              <option value='disabled' <?php if($edit[0]['status']=='disabled'){?>selected='selected'<?php }?>>Disabled</option>
              <option value='enabled' <?php if($edit[0]['status']=='enabled'){?>selected='selected'<?php }?>>Enabled</option>
        </select>
      </div>
    
      <div class="col-md-4"><br>
          <div class="col-sm-6"><input type="button" onclick="form_submit('edit_bank')"  class="btn btn-success btn-md" value="Edit"></div>
          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div> 
        </div>

      </div>



    </div>

  </form>

               


                </div>

</div>
</div>
        
