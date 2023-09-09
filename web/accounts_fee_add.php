<div class="card-header"><h4>Student Fee(s)</h4></div>

<?php
$stu = $student->get_one_student($_GET['stu_id']);?>

<div class="card-body">
   
	<div class="row">
		<table class="table" style="max-width:98%;">
			<tr>
				<th>Student Name</th>
				<td><?php echo $stu[0]['uname'];?></td>
			</tr>
			<tr>
				<th>Course</th>
				<td><?php $cname  = $course->get_one($stu[0]['course'],'id'); 
                          echo $cname[0]['course_name'];?></td>
			</tr>
			<tr>
				<th>Fee</th>
				<td><?php echo $cname[0]['fee'];?></td>
			</tr>
			<tr>
				<th>Mode Of Payment</th>
			</tr>
			<tr>	
				<td colspan='2'>
					

		<div class="panel with-nav-tabs panel-success">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">Cash</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">Bank Acc</a></li>
                            <li><a href="#tab3primary" data-toggle="tab">UPI</a></li>
                        </ul>
               </div>
		   <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                             <div id="msgcashform"></div>
<form name="cashform" id="cashform" action="<?php echo $base_url.'index.php?action=student&query=add_fee_cash'?>" method="post">
		
					<table class='table'>
<tr>
<th>Amount</th>
<td>
<input type="hidden" name="account_type" class="form-control" value="1">
<input type="hidden" name="debit_credit" class="form-control" value="1">
<input type="hidden" name="transaction_type" class="form-control" value="1">
<input type="hidden" name="branchid" class="form-control" value="<?php echo $stu[0]['branch'];?>">
<input type="hidden" name="syear" class="form-control" value="<?php echo $stu[0]['syear'];?>">
<input type="hidden" name="stu_id" class="form-control" value="<?php echo $stu[0]['id'];?>">
<input type="text" name="amt" class="form-control" value="">
</td>
</tr>
<tr>
				<th>Payment Status</th>
				<td>
					<select class="form-control" name="status" required>
						<option disabled="disabled" selected="selected">-- Select --</option>
					<?php $payment_status = $admin->getonetype_meta_data('payment_status'); 
					foreach($payment_status as $k =>$value){?>
						<option value="<?php echo $payment_status[$k]['meta_value2'];?>"><?php echo strtoupper($payment_status[$k]['meta_value1']);?></option>
					<?php } ?>	
					</select>
				</td>
			</tr>
<tr>
				<td></td>
				<td>
					<input type="button" name="save" class="btn btn-success form-control" value="Save" onclick="form_submit('cashform')">
				</td>
			</tr>
</table>
</form>
				</div>
                        <div class="tab-pane fade" id="tab2primary">
                             <div id="msgchaqueform"></div>
                            <!--- bank account --->
                            <form name="chaqueform" id="chaqueform" action="<?php echo $base_url.'index.php?action=student&query=add_fee_chaque'?>" method="post">
		
            					<table class='table'>
                                <tr>
                                <th>Amount</th>
                                <td>
                                <input type="hidden" name="debit_credit" class="form-control" value="1">
                                <input type="hidden" name="transaction_type" class="form-control" value="1">
                                <input type="hidden" name="branchid" class="form-control" value="<?php echo $stu[0]['branch'];?>">
                                <input type="hidden" name="syear" class="form-control" value="<?php echo $stu[0]['syear'];?>">
                                <input type="hidden" name="stu_id" class="form-control" value="<?php echo $stu[0]['id'];?>">
                                <input type="text" name="amt" class="form-control" value="">
                                </td>
                                </tr>
                                <tr>
                                <th>Deposite In</th>
                                <td>
                                    <select name='account_type' class='form-control'>
                                        <option disbaled='' enabled=''>-- Select --</option>
                                        <?php
                                            $bank_acc=$accounts->get_bank_acc();
                                            foreach($bank_acc as $key => $value)
                                            {
                                            echo "<option value=".$bank_acc[$key]['id'].">".$bank_acc[$key]['acc_name']." (".$bank_acc[$key]['bank_name'].")</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                                </tr>
                                <tr>
                                <th>Chaque #</th>
                                <td>
                                <input type="text" class='form-control' name="chaque_nu" class="form-control" value="">
                                </td>
                                </th>
                                <tr>
                                <th>Signing Autority Name</th>
                                <td>
                                <input type="text" class='form-control' name="sign_auth" class="form-control" value="">
                                </td>
                                </th>
                                <tr>
                                <th>Chaque Date</th>
                                <td>
                                <input type="date" class='form-control' name="chaque_date" class="form-control" value="">
                                </td>
                                </th>
                                
                                <tr>
                                				<th>Payment Status</th>
                                				<td>
                                					<select class="form-control" name="status" required>
                                						<option disabled="disabled" selected="selected">-- Select --</option>
                                					<?php $payment_status = $admin->getonetype_meta_data('payment_status'); 
                                					foreach($payment_status as $k =>$value){?>
                                						<option value="<?php echo $payment_status[$k]['meta_value2'];?>"><?php echo strtoupper($payment_status[$k]['meta_value1']);?></option>
                                					<?php } ?>	
                                					</select>
                                				</td>
                                			</tr>
                                <tr>
                                				<td></td>
                                				<td>
                                					<input type="button" name="save" class="btn btn-success form-control" value="Save" onclick="form_submit('chaqueform')">
                                				</td>
                                			</tr>
                                </table>
                            </form>
                            
                        </div>
                        <div class="tab-pane fade" id="tab3primary">
                             <div id="msgupiform"></div>
                            <!--- UPI --->
                            <form name="upiform" id="upiform" action="<?php echo $base_url.'index.php?action=student&query=add_fee_upi'?>" method="post">
		
            					<table class='table'>
                                <tr>
                                <th>Amount</th>
                                <td>
                                <input type="hidden" name="debit_credit" class="form-control" value="1">
                                <input type="hidden" name="transaction_type" class="form-control" value="1">
                                <input type="hidden" name="branchid" class="form-control" value="<?php echo $stu[0]['branch'];?>">
                                <input type="hidden" name="syear" class="form-control" value="<?php echo $stu[0]['syear'];?>">
                                <input type="hidden" name="stu_id" class="form-control" value="<?php echo $stu[0]['id'];?>">
                                <input type="text" name="amt" class="form-control" value="">
                                </td>
                                </tr>
                                <tr>
                                <th>Deposite In</th>
                                <td>
                                    <select name='account_type' class='form-control'>
                                        <option disbaled='' enabled=''>-- Select --</option>
                                        <?php
                                            $bank_acc=$accounts->get_bank_upi();
                                            foreach($bank_acc as $key => $value)
                                            {
                                            echo "<option value=".$bank_acc[$key]['id'].">".$bank_acc[$key]['acc_name']." (".$bank_acc[$key]['upi'].")</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                                </tr>
                                <tr>
                                <th>Transaction ID</th>
                                <td>
                                <input type="text" class='form-control' name="tra_id" class="form-control" value="">
                                </td>
                                </th>
                                
                                <tr>
                                				<th>Payment Status</th>
                                				<td>
                                					<select class="form-control" name="status" required>
                                						<option disabled="disabled" selected="selected">-- Select --</option>
                                					<?php $payment_status = $admin->getonetype_meta_data('payment_status'); 
                                					foreach($payment_status as $k =>$value){?>
                                						<option value="<?php echo $payment_status[$k]['meta_value2'];?>"><?php echo strtoupper($payment_status[$k]['meta_value1']);?></option>
                                					<?php } ?>	
                                					</select>
                                				</td>
                                			</tr>
                                <tr>
                                				<td></td>
                                				<td>
                                					<input type="button" name="save" class="btn btn-success form-control" value="Save" onclick="form_submit('upiform')">
                                				</td>
                                			</tr>
                                </table>
                            </form>

                            
                        </div>
                    </div>
                </div>
		</div>


				</td>
			</tr>
			
			
			
		</table>
	</div>

<div class="row">
        <div class="col-sm-5">
            <h5>Default Fee(s)</h5>
            <div id="msgdefault_fee_form"></div>
                
            <ul>
            <?php $counter0=1; 
            $default_fee = $admin->getonetype_meta_data('default_fee'); foreach($default_fee as $k =>$value){?>
            <li>
            	<span id="msgform<?php echo $counter0++;?>"></span>
            	<form name="form<?php echo $default_fee[$k]['id']?>" action="<?php echo $base_url.'index.php?action=student&query=add_fee'?>" method="post" id="form<?php echo $counter0;?>">
				<input type="hidden" name="stu_id" class="form-control" value="<?php echo $stu[0]['id'];?>">
                
                <input type="checkbox" value="<?php echo $default_fee[$k]['meta_value1']?>" name="submit" onclick="form_submit('form<?php echo $counter0;?>')" > <?php echo $default_fee[$k]['meta_value1']?> (<?php echo $default_fee[$k]['meta_value2']?>)
                
                <input type="hidden" value="<?php echo $default_fee[$k]['meta_value2']?>" name="amt"  class="form-control">
                </form>

            </li>

            <?php }?>
            </ul>
            
                    </div>
        
        
        
        <div class="col-sm-5">
        	<h5>Total Fee :   <b><?php echo $fee = $cname[0]['fee'];?></b></h5>
            <h5>Total Fee Received : <b><?php $total_fee_paid = $accounts->get_total_paid_stu($_GET['stu_id']); echo $total_fee_paid[0]['sum_amt']?></b></h5>
            <h5>Total Fee Pending : <b><?php echo $pending = $fee - $total_fee_paid[0]['sum_amt'];?></b></h5>
            
        </div>
</div>


</div>


