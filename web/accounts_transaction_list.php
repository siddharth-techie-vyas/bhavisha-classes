<?php 

if(isset($_GET['date']))
{
$date = $_GET['date'];
$newDate = date("Y-m-d", strtotime($date));  
$tra = $accounts->get_transaction_details($newDate);
}

if(isset($_GET['from']))
{
$from = $_GET['from'];
$to = $_GET['to'];
$tra = $accounts->get_transaction_details_custom_date($from,$to);
}

if(isset($_GET['top_50']))
{
$tra = $accounts->get_transaction_details_50();
}




$counter=1;
if(count($tra)>1)
{
    echo "<table class='table'>";
    ?>
    <style type="text/css">
  .btn-label{border: 1px solid; padding:5px; border-radius:5px; margin:2px; width:40%; text-align: center;}
  .btn-label input[type=radio]{display: none;}
                </style>
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Type</th>
            <th>Date & Time</th>
            <th>Dr. / Cr.</th>
            <th>Amount</th>
            <th>Account Type</th>
            <th>Mode Of Payment</th>
            <th>Payment Status</th>
            <th>Approval</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tra as $row => $value){ $rand=rand(10,9999); ?>
        <tr>
            <td><?php echo $counter++;?></td>
            <td><?php $t_type=$accounts->get_transaction_type_one($tra[$row]['transaction_type']); echo $t_type[0]['type_name'];?></td>
            <td><?php echo date("d-m-Y h:i A", strtotime($tra[$row]['date_time']));?></td>
            <td><?php if($tra[$row]['debit_credit']==1){echo "Cr.";}else{echo "Dr.";}?></td>
            <td><span class='btn btn-success btn-sm'><?php echo $tra[$row]['amt'];?></span></td>
            <td><em class='btn btn-xs btn-warning'><?php $bank_acc = $accounts->get_one_account($tra[$row]['account_type']); echo $bank_acc[0]['acc_name'];
                        if($bank_acc[0]['bank_name']!=''){echo '<br><small>'.$bank_acc[0]['bank_name'].'</small>';}
            ?></em></td>
            <td>
                <?php if($tra[$row]['upi'] != '0'){echo "UPI";} 
                        elseif($tra[$row]['chaque_nu'] != ''){echo "Chaque";} 
                        elseif($tra[$row]['tra_id'] != '0'){echo "Bank Transfer";} 
                        else{}
                        ?>
            </td>
            <td><?php $payment_status = $admin->getone_meta_data('payment_status',$tra[$row]['status']); 
                    echo $payment_status[0]['meta_value1'];?>
            </td>
            <td >
                <?php if($tra[$row]['approval']=='0'){?>
                <div id="msg<?php echo $rand;?>"></div>
                <form name="<?php echo $rand;?>" id="<?php echo $rand;?>" action="<?php echo $base_url.'index.php?action=master&query=approved_transaction';?>" method='post'>
                    <input type='hidden' name='amount' value='<?php echo $tra[$row]['amt'];?>' />
                    <input type='hidden' name='tra_id' value='<?php echo $tra[$row]['id'];?>' />
                    <input type='hidden' name='acc_id' value='<?php echo $tra[$row]['account_type'];?>' />
                    <input type='hidden' name='tra_type' value='<?php echo $tra[$row]['debit_credit'];?>' />
                
               
                    <label class='btn btn-primary'>    
                    <input onclick="form_submit2('<?php echo $rand;?>')" type='radio'  name='submit' value='1' style='border:2px solid; margin'> <i class='fa fa-check'></i> Accept 
                    </label>

                    <label class='btn btn-danger'>
                    <input onclick="form_submit2('<?php echo $rand;?>')" type='radio' name='submit' value='2' style='border:2px solid; margin'> <i class='fa fa-xmark'></i> Reject
                    </label>
                    
                </form>
            <?php }elseif($tra[$row]['approval']=='2')
                        {echo "<b class='text-danger'>Rejected</b>";}
                  else {echo "<b class='text-success'>Approved</b>";} ?>     
            </td>
        </tr>
        <?php }?>
    </tbody>
    
    <?php
    echo "</table>";
}
else
{
    echo "<div class='alert alert-warning'>No Transaction Found </div>";
}
?>