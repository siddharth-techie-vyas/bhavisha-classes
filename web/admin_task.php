<div class='card-header'>

                        <h4>Add/Update Task </h4>

                    </div>

<div class="content">

<div class="row">

<div class="col-sm-12">

                <div class="card-body">

                  <div id="msg">
                      <?php if($_GET['status']=='success'){echo "<div class='alert alert-success'>Task added successfully</div>";}
                      else if($_GET['status']=='error') {echo "<div class='alert alert-danger'>Task added failed. Please again later !!!</div>";}
                      
                      ?>
                  </div>

  <form action="<?php echo $base_url.'index.php?action=admin&query=task';?>" method="post" name="task" id="task" class="form-sample">

    <div class="row">

      <div class='col-sm-6'>

      <div class="col-md-6">
          <label>Team Member Name</label>
          <select class="form-control" name="uid">
          <option disabled='' selected=''>--Select--</option>
            <?php $faculty = $admin->getonetype_user('2');  
                foreach($faculty as $k=>$value)
                {
                echo "<option value='".$faculty[$k]['id']."'>".$faculty[$k]['uname']."</option>";
                }
              
               $faculty1 = $admin->getonetype_user('5');  
                foreach($faculty1 as $k=>$value)
                {
                echo "<option value='".$faculty1[$k]['id']."'>".$faculty1[$k]['uname']."</option>";
                }
              ?>
          </select>
      </div>

      <div class="col-md-6">
          <label>Task Subject</label>
          <input type="text" name="task_name" class="form-control" required>
      </div>

            <div class="col-md-6">
          <label>Priority</label>
          <select name="priority" class="form-control">
            <?php $priority = $admin->getonetype_meta_data('task_priority');
            foreach($priority as $k => $value)
              { ?>
                <option value="<?php echo $priority[$k]['meta_value2'] ?>"><?php echo strtoupper($priority[$k]['meta_value1']); ?></option>
              <?php }?>
          </select>
      </div>

      
      <div class="col-md-6"><br>
          <input type="submit"  class="btn btn-success btn-bg" value="Save">
          <input type="reset" class="btn btn-info btn-bg" value="Reset"> 
        </div>

      </div>  


      
      <div class="col-md-6">
          <label>Description</label>
          <textarea name="bank_name" class="form-control" ></textarea>
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
        
