<div class="card-body" style="padding:25px; border:1px solid #CCC;">   
 <div class="row">
		<?php 
			//-- get receipt details
			$rec=$accounts->get_receipt_stu($_GET['stu_id'],$_GET['id']);
			$branch = $admin->get_branch_one($rec[0]['branchid']);
			$stu=$student->get_one_student($_GET['stu_id']);
		?>
        <div class="receipt-main">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="logo" src="<?php echo $base_url.'theme/images/logo.png';?>" style="width: 200px; border-radius: 43px;">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-left">
						<div class="receipt-left">
							<p><i class="fa fa-phone"></i> <?php echo $branch[0]['contact'];?> </p>
							<p><i class="fa fa-envelope"></i> bhavisha.co.in@gmail.com</p>
							<p><i class="fa fa-location-arrow"></i> <?php echo $branch[0]['address'];?> </p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h4><b><?php echo $stu[0]['uname'];?></b> </h4>
							<p><b>Mobile :</b> <?php echo $stu[0]['contact'];?></p>
							<p><b>Email :</b> <?php echo $stu[0]['email'];?></p>
							<p><b>Address :</b> <?php echo $stu[0]['address'];?></p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left" style="color:red">
							<h4><b>RECEIPT # 00<?php echo $rec[0]['id'];?></b></h4>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">Payment for <?php $t_type=$accounts->get_transaction_type_one($rec[0]['transaction_type']); echo $t_type[0]['type_name'];?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $rec[0]['amt'];?>/-</td>
                        </tr>
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total Amount: </strong>
                            </p>
                            <p>
                                <strong>Total Paid: </strong>
                            </p>
							<p>
                                <strong>Balance Due: </strong>
                            </p>
							</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i><?php echo $rec[0]['amt'];?>
                                 <?php $cname  = $course->get_one($stu[0]['course'],'id'); $fee = $cname[0]['fee'];?>/-</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?php $total_fee_paid = $accounts->get_total_paid_stu($stu[0]['id']); echo $total_fee_paid[0]['sum_amt']?>/-</strong>
                            </p>
							<p>
                                <strong><i class="fa fa-inr"></i> <?php echo $pending = $fee - $total_fee_paid[0]['sum_amt'];?>/-</strong>
                            </p>
							
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h3><strong>Total: </strong></h3></td>
                            <td class="text-left text-danger"><h3><strong><i class="fa fa-inr"></i> <?php echo $rec[0]['amt'];?>/-</strong></h3></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> <?php echo date('Y-m-d');?></p>
							<h5 style="color: rgb(140, 140, 140);">For any information about fee and course, Please call or email us !!!</h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h4>For Bhavisha Institute</h4>
						</div>
					</div>
				</div>
            </div>
			
        </div>    
	</div>
</div>