<div class='card-header'>

                        <h4>Add/Update Bank </h4>

                    </div>

<div class="content">

<div class="row">

<div class="col-sm-12">

                <div class="card-body">

                  <div id="msg">
                      <?php if($_GET['status']=='success'){echo "<div class='alert alert-success'>Account added successfully</div>";}
                      else if($_GET['status']=='error') {echo "<div class='alert alert-danger'>Account added failed. Please again later !!!</div>";}
                      
                      ?>
                  </div>

  <form action="<?php echo $base_url.'index.php?action=master&query=add_bank';?>" method="post" name="acc_bank" id="acc_bank" class="form-sample">

    

    <div class="row">

        <div class="col-md-3">
          <label>A/c Name</label>
          <input type="text" name="acc_name" class="form-control" required>
      </div>
      
      <div class="col-md-3">
          <label>Bank Name</label>
          <input type="text" name="bank_name" class="form-control" >
      </div>

      <div class="col-md-3">
          <label>IFSC</label>
          <input type="text" name="ifsc" class="form-control" >
      </div>

      <div class="col-md-3">
          <label>A/c No</label>
          <input type="text" name="acc_nu" class="form-control" >
      </div>

      <div class="col-md-3">
          <label>Opening Balance</label>
          <input type="text" name="opening_balance" class="form-control" required>
      </div>
      
       <div class="col-md-3">
          <label>Acc Type</label>
          <select name="acc_type" class='form-control' required>
              <option disabled='' selected='selected'>--Select--</option>
              <option value='current'>Current</option>
              <option value='saving'>Saving</option>
              <option value='saving'>Cash</option>
          </select>
      </div>
      
       <div class="col-md-3">
          <label>UPI ID</label>
          <input type="text" name="upi" class="form-control">
      </div>

      <div class="col-md-2"><br>
          <div class="col-sm-6"><input type="submit"  class="btn btn-success btn-md" value="Save"></div>
          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div> 
        </div>

      </div>



    </div>

  </form>

               

            
                  <table class="table">

                    <thead>

                      <tr>
                        <th>S.No.</th>
                        <th>A/c Name</th>
                        <th>A/c Type</th>
                        <th>A/c No.</th>
                        <th>IFSC</th>
                        <td>Opening Balance</td>
                        <th>Opening Balance Added On</th>
                        <th>Current Balance</th>
                        <th>UPI</th>
                        <th>Utility</th>
                        <th>Status</th></th>
                      </tr>

                    </thead>

                    <tbody>
                    <?php $counter=1;
                        $acc=$accounts->get_all_account();
                        foreach($acc as $key=>$value)
                        {
                            ?>
                            
                            <tr>
                                <td><?php echo $counter++;?></td>
                                <td><?php echo $acc[$key]['acc_name'];?></td>
                                <td><?php echo $acc[$key]['acc_type'];?></td>
                                <td><?php echo $acc[$key]['acc_nu'];?></td>
                                <td><?php echo $acc[$key]['ifsc'];?></td>
                                <td><?php echo $acc[$key]['opening_balance'];?></td>
                                <td><?php echo $acc[$key]['opening_balance_datetime'];?></td>
                                <td><?php 
                                  $acc_balance = $accounts->get_acc_balance($acc[$key]['id'],$_SESSION['syear']);
                                  echo $acc_balance;
                                ?></td>
                                <td><?php echo $acc[$key]['upi'];?></td>
                                <td><?php echo strtoupper($acc[$key]['status']);?></td>
                                <td>
                                    <button type='button' class='btn btn-sm btn-warning'data-toggle="modal" data-target="#myModal" onclick="show_page_model('index.php?action=nocss_pages&page=acc_bank_edit&id=<?php echo $acc[$key]['id'];?>')"><i class="fa fa-pencil"></i></button> 
                                    
                               
                                    
                                  
                                    
                                </td>
                            </tr>
                            
                            
                            <?php
                        }
                    ?>
                     

                    </tbody>

                  </table>

                </div>

</div>
</div>
        
