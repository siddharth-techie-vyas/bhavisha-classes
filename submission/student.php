<?php 
include('class_calls.php');
$teacher = new Teacher();
$accounts = new Accounts();

if($_REQUEST['page']=='student_fee_list') {
$student_list=$teacher->get_student_fee_list($_POST['branchid'],$_POST['batchid'],$_POST['student_name'],$_POST['id']);
	?>
	<table class='table'>
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
                <th>Reg #</th>
				<th>Course</th>
				<th>Subject</th>
				<th>Fee</th>
				<th>Pending</th>
				<th>Utility</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if(count($student_list)>0){
			$counter=1; foreach ($student_list as $key => $value) {?>
			<tr>
				<td><?php echo $counter++; ?></td>
				<td><?php echo $student_list[$key]['uname'];?></td>
                <td><?php echo 'Bha00'.$student_list[$key]['id'];?></td>
				<td><?php  $cname  = $course->get_one($student_list[$key]['course'],'id'); 
                          echo $cname[0]['course_name'];?></td>
				<td><?php $subject = preg_split ("/\,/", $student_list[$key]['subject']); 
                            foreach($subject as $k=>$value)
                            {
                            $sname=$course->get_one($subject[$k],'id'); echo '<li>'.$sname[0]['subject'].'</li>';
                            }?>
                </td>
				<td><?php echo $fee = $cname[0]['fee'];?></td>
				<td><?php $total_fee_paid = $accounts->get_total_paid_stu($student_list[$key]['id']); 
							echo $pending = $fee - $total_fee_paid[0]['sum_amt'];
						?>
				</td>
				<td>
					<label onclick="show_page_model('index.php?action=nocss_pages&page=accounts_fee_add&stu_id=<?php echo $student_list[$key]['id'];?>')" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fa fa-inr"></i></label>
					
					<label onclick="show_page_model('submission/student.php?page=student_fee_details&stu_id=<?php echo $student_list[$key]['id'];?>')" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-info"></i></label>
					
					<label class="btn btn-danger"><i class="fa fa-file-pdf"></i></label>
				</td>			
			</tr>
		<?php } } else {?>
		<tr><td colspan='7'>No Data Found</td></tr>
		<?php }?>
		</tbody>
	</table>
	
<?php } 

if($_REQUEST['page']=='student_fee_details') {
$student_fee=$accounts->get_fee_details_student($_REQUEST['stu_id']);?>
<table class="table">
    <thead>
        <tr>
            <th>Type</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Receipt</th>
        </tr>
    </thead>
    <?php foreach($student_fee as $k =>$value){?>
    <tr>
        <th><?php $t_type = $accounts->get_transaction_type_one($student_fee[$k]['transaction_type']); echo $t_type[0]['type_name'];?></th>
        <td><?php echo $student_fee[$k]['amt'];?></td>
        <td><?php echo date("d-m-Y H:i:s", strtotime($student_fee[$k]['date_time']));?></td>
        <td>
        	<label onclick="show_page_model('index.php?action=nocss_pages&page=accounts_receipt_stu&id=<?php echo $student_fee[$k]['id'];?>&stu_id=<?php echo $_REQUEST['stu_id'];?>')" data-toggle="modal2" data-target="#myModal2" data-dismiss="#myModal" class="btn btn-default"><i class="fa fa-file-invoice"></i></label>
        </td>
    </tr>
    <?php } ?>
</table>

<?php } if($_REQUEST['page']=='student_bulk') {

    //-- arrays
    $error=array();
                $success=array();
                
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
 
    // Validate whether selected file is a CSV file
    if(empty($_FILES['file']['name']) && empty($_POST['batch']) && empty($_POST['branchid']) && empty($_POST['syear']))
    {
        echo "<div class='alert alert-info'>All fields are mendetory.</div>";
    }
    else if(!in_array($_FILES['file']['type'], $fileMimes))
    {
        echo "<div class='alert alert-warning'>Please select a valid file</div>";
    }
    else 
    {
 
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Skip the first line
            fgetcsv($csvFile);
 			

            // Parse data from CSV file line by line
             // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                // Get row data
                $uname = $getData[0];
                $fname = $getData[1];
                $mname = $getData[2];
                $focc = $getData[3];
                $mocc = $getData[4];
                $address = $getData[5];
                $email = $getData[6];
                $contact = $getData[7];
                $school = $getData[8];
                $grace_period = $getData[9];
                $xper = $getData[10];
                $reference = $getData[11];
                $dob = date("Y-m-d", strtotime($getData[12]));
                $medium = $getData[13];
                $jdate = date("Y-m-d", strtotime($getData[14]));
                $xiiper = $getData[15];
                
                //-- manual fields 
                $branch = $_POST['branchid'];
                $batchid = $_POST['batch'];
                $syear = $_POST['syear'];
                $status='1';
                $democlass='0';
                
                //--- get data dynamically
                $course_id=$teacher->get_one_batch($batchid);
                $courseid=$course_id[0]['course'];
                
                $subject_ids=array();
                $subject=$course->get_nonmnumeric_only($courseid,'course_name','subject');
                foreach($subject as $k => $value)
                {
                    array_push($subject_ids,$subject[$k]['id']);
                }
                
                
                // If user already exists in the database with the same contact
                $check_avl = $student->check_availability($uname,$fname,$contact); 
                
                if ($check_avl)
                {
                    array_push($error,$contact);
                }
                else
                {
                    
                  	$student->create_student($uname,$fname,$mname,$focc,$mocc,$address,$email,$contact,$courseid,$subject_ids,$status,$school,$xper,$xiiper,$reference,$dob,$medium,$jdate,$branch,$democlass,$batchid,$syear,$grace_period);
                     array_push($success,$contact);
                     
                     //-- create user id 
                     $upass=rand(0,1000000);
                     $utype='3';
                     $admin->create_user($uname,$upass,$utype,$email,$contact,$branch);
                 	
                }
            }
 
            // Close opened CSV file
            fclose($csvFile);
 
            echo "<div class='alert alert-success'>".count($success)." Student(s) Added </div>";
            
            echo "<div class='alert alert-danger'>".count($error)." Student(s) rejected with same name and contact. Details :- ";
            echo implode(", ",$error);
            echo "</div>";
         
    }
    


}?>	