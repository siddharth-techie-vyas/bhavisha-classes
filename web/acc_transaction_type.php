<div class='card-header'>
    <h4>Add/Update Transaction Type</h4>
</div>

<div class="content">
<div class="row">
<div class="col-sm-12">
                <div class="card-body">
                  <div id="msgmaster_transaction_type"></div>

  <form action="<?php echo $base_url.'index.php?action=master&query=add_transaction_type';?>" method="post" name="master_transaction_type" id="master_transaction_type" class="form-sample">

    <div class="row">
      <div class="col-md-3">
          <label>Type Name</label>
          <input type="text" name="type_name" class="form-control" placeholder="eg: - Fee, salary, assets" required>
      </div>

      <div class="col-md-3">
          <label>Transaction Type</label><br>
          <select name="tid" class="form-control">
            <option selected='' value="0">-- Select --</option>
            <?php 
              $t_type=$accounts->get_all_transaction_type_main();
               foreach ($t_type as $key => $value) 
              {
				        $mainid=$t_type[$key]['id'];
                echo "<option value='".$mainid."'>".$t_type[$key]['type_name']."</option>";
                
			          $accounts->get_all_transaction_type_loop($mainid);
                   
              }
            ?>
          </select>
      </div>

      <div class="col-md-3">
          <label>Transaction Type</label><br>
          <select name="type_transaction" class="form-control">
            <option disabled='' selected=''>-- Select --</option>
            <option value="1">Credit Only</option>
            <option value="2">Debit Only</option>
            <option value="0">Both</option>
          </select>
      </div>

      
      <div class="col-md-3">
          <div class="col-sm-6"><input type="button" onclick="form_submit('master_transaction_type')" class="btn btn-success btn-lg" value="Save"></div>
          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-lg" value="Reset"></div> 
        </div>

      </div>



    </div>

  </form>

               

            
                  <table class="table">

                    <thead>

                      <tr>
                        <th>S.No.</th>
                         <th>Transaction Type</th>
                        <th>Main Category</th>
                        <th>Sub Categories</th>
                        <th>Action</th>
                      </tr>

                    </thead>

                    <tbody>
                      <?php
                      $counter=1;
                      $t_type1=$accounts->get_all_transaction_type_main();
                      foreach ($t_type1 as $row => $value) 
                        {?>
                     <tr>
                         <th><?php echo $counter++;?></th>
                         <td><?php $t_type=$t_type1[$row]['type_transaction']; 
                                if($t_type=='1'){ echo "Credit";}
                                else if($t_type=='2'){ echo "Debit";}
                                else{ echo "Both";}
                         ?></td>
                         <td>
                          <?php if($t_type1[$row]['status']==1){echo '<span class".text-decoration-line-through">'.$t_type1[$row]['type_name'].'</span>';}else{echo $t_type1[$row]['type_name'];}?></td>
                         <td><?php $subcat = $accounts->get_all_transaction_type_subcat($t_type1[$row]['id']);
                                if($subcat)
                                {echo "<ul>";
                                    foreach($subcat as $k => $value)
                                    {
                                        
                                        echo $subcat[$k]['type_name'];
                                        ?> 
                                        <li>

                                        <i data-toggle="modal" data-target="#myModal" onclick="show_page_model('index.php?action=nocss_pages&page=acc_transaction_type_edit&id=<?php echo $t_type1[$row]['id'];?>')"  class="fa fa-pencil"></i>

                                        <i class="fa fa-xmark" onclick="deleteme('accounts','delete_transaction_type','<?php echo $subcat[$k]['id'];?>')"></i>
                                        
                                        </li>
                                    <?php }  ?>
                                  </ul>
                                  <?php }?>    
                              </td>
                         
                         <td>
                             <button type='button' class='btn btn-sm btn-warning'data-toggle="modal" data-target="#myModal" onclick="show_page_model('index.php?action=nocss_pages&page=acc_transaction_type_edit&id=<?php echo $t_type1[$row]['id'];?>')"><i class="fa fa-pencil"></i></button> 
                                  
                            <i class='fa fa-xmark btn btn-danger btn-sm' onclick="deleteme('accounts','delete_transaction_type','<?php echo $classes[$k]['id'];?>')"></i>
                         </td>
                     </tr>
                        
                        <?php }?>

                    </tbody>

                  </table>

                </div>

</div>
</div>
        
