<?php $edit=$accounts->get_transaction_type_one($_GET['id']); ?>
<div class='card-header'>
    <h4>Add/Update Transaction Type</h4>
</div>

<div class="content">
<div class="row">
<div class="col-sm-12">
                <div class="card-body">
                    
                  <div id="msgedit_transaction_type"></div>

  <form action="<?php echo $base_url.'index.php?action=master&query=edit_transaction_type';?>" method="post" name="edit_transaction_type" id="edit_transaction_type" class="form-sample">
<input type="hidden" name="id" class="form-control" value="<?php echo $edit[0]['id'] ?>" required>

    <div class="row">
        
      <div class="col-md-3">
          <label>Type Name</label>
          <input type="text" name="type_name" class="form-control" value="<?php echo $edit[0]['type_name'] ?>" required>
      </div>
    
    <?php if($edit[0]['tid'] != '0'){?>    
      <div class="col-md-4">
          <label>Transaction Type</label><br>
          <select name="tid" class="form-control">
            <option selected='' value="0">-- Select --</option>
            <?php 
              $t_type=$accounts->get_all_transaction_type_main();
              foreach ($t_type as $key => $value) 
              {
				$mainid=$t_type[$key]['id'];
                echo "<option value='".$mainid."'";
                    if($edit[0]['tid']==$t_type[$key]['id'])
                    {echo "selected='selected'";}
                echo ">".$t_type[$key]['type_name']."</option>";
                
		    	$accounts->get_all_transaction_type_loop($mainid);
                   
              }
            ?>
          </select>
      </div>
        <?php } else { ?>
        <input type='hidden' name='tid' value="<?php echo $edit[0]['tid']; ?>"/>
        <?php }?>
        
        
      <div class="col-md-4">
          <label>Transaction Type</label><br>
          <select name="type_transaction" class="form-control">
            <option disabled='' selected=''>-- Select --</option>
            <option value="1" <?php if($edit[0]['type_transaction']=='1') {echo "selected='selected'";} ?> >Credit Only</option>
            <option value="2" <?php if($edit[0]['type_transaction']=='2') {echo "selected='selected'";} ?>>Debit Only</option>
            <option value="0" <?php if($edit[0]['type_transaction']=='0') {echo "selected='selected'";} ?>>Both</option>
          </select>
      </div>

      
      <div class="col-md-6">
          <div class="col-sm-6"><input type="button" onclick="form_submit('edit_transaction_type')" class="btn btn-success btn-lg" value="Save"></div>
          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-lg" value="Reset"></div> 
        </div>

      </div>



    </div>

  </form>
  
  </div>
  </div>
  </div>
  </div>
