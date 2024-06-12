<?php 
include('class_calls.php');

if($_REQUEST['page']=='all_batch')

{?>


<table class="table" id="data-table">

				<thead>

					<tr>

						<th>S.No.</th>

						<th>Branch</th>

						<th>Course</th>

						<th>Batch Name</th>

						<th>Starts From</th>
						<th># As Batch 1</th>
						<th># As Batch 2</th>
						<th>Utility</th>

					</tr>

				</thead>

				<tbody>

					<?php

					$counter=1; 

						$classes = $teacher->get_all_batches($_SESSION['syear'], $_SESSION['branch']);

						foreach ($classes as $k => $value) {

							?>

							<tr id="<?php echo $classes[$k]['id'];?>">

								<td><?php echo $counter++;?></td>

								<td><?php $branch=$admin->get_branch_one($classes[$k]['branch']); echo $branch[0]['branch_name'] ?></td>

								<td><?php $course0=$course->get_one($classes[$k]['course'],'id'); echo $course0[0]['course_name']; ?></td>

								<td><?php echo $classes[$k]['batch_name'];?></td>

								<td><?php echo date("d-m-Y", strtotime($classes[$k]['start_date']));?></td>

								<td>
									<?php $stu_count1 = $teacher->get_student_count_in_batch($classes[$k]['id']); ;
										echo $stu_count1[0]['stu_count'];
									?>
								
								</td>

								<td>
									<?php $stu_count2 = $teacher->get_student_count_in_batch2($classes[$k]['id']); ;
										echo $stu_count2[0]['stu_count'];
									?>
								
								</td>

								<td>
									<a class='btn btn-sm btn-success' href="<?php echo $base_url.'index.php?action=dashboard&page=teacher_createbatch2&id='.$classes[$k]['id'];?>"><i class="fa fa-user-plus fa-2x"></i>  </a>

									<span class='btn btn-xs btn-danger' onclick="deleteme('teacher','delete_batch','<?php echo $classes[$k]['id'];?>')"><i class="fa fa-trash" ></i></span> 
									
									<span class='btn btn-xs btn-warning' onclick="show_page_model('index.php?action=nocss_pages&page=teacher_batch_edit&id=<?php echo $classes[$k]['id'];?>')" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil" ></i></span> 
								</td>	
								

							</tr>

					<?php }?>		

				</tbody>

			</table>

<?php }



if($_REQUEST['page']=='all_classes')

{

?>

<div class='row'>
	<form name="filer_class" id="filter_class" action="">
	<div class="col-sm-3">
		<label>Course</label>
		<select name="course_name" class="form-control">
			<option>-- Select --</select>
		</select>
	</div>
	<div class="col-sm-3">
		<label>Faculty</label>
		<select name="teacherid" class="form-control">
			<option>-- Select --</select>
		</select>

	</div>
	<div class="col-sm-3">
		<label>Duration</label>
		<select name="duration" class="form-control">
			<option>-- Select --</select>
		</select>

	</div>
	<div class="col-sm-3"><br>
		<input type="button" onclick="form_result('filter_class')" name="submit" value="Search" class="btn btn-sm btn-primary"/>
	</div>
	</form>
</div>
<div id="msgfilter_class">
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>S.No.</th>

						<th>Branch</th>

						<th>Batch</th>

						<th>Course</th>
						
						<th>Subject</th>

						<th>Teacher</th>

						<th>Days</th>

						<th>Starts From</th>

						<th>Timing</th>

						<th>Duration</th>

						<th>Utility</th>

					</tr>

				</thead>

				<tbody>

					<?php

					$counter=1; 

						$classes = $teacher->get_all_classes($_SESSION['syear'],$_SESSION['branch']);

						foreach ($classes as $k => $value) {

							?>

							<tr id="<?php echo $classes[$k]['id'];?>">

								<td><?php echo $counter++;?></td>

								<td><?php $branch=$admin->get_branch_one($classes[$k]['branchid']); echo $branch[0]['branch_name'] ?></td>

								<td><?php $batch=$teacher->get_one_batch($classes[$k]['batchid']); echo $batch[0]['batch_name'] ?></td>

								<td><?php $course0=$course->get_one($classes[$k]['courseid'],'id'); echo $course0[0]['course_name'];  ?></td>
								
								<td><?php $subject0=$course->get_one($classes[$k]['subjectid'],'id'); echo $subject0[0]['subject'];?></td>

								<td><?php $teacher_name  = $admin->getone_user($classes[$k]['teacherid']); echo $teacher_name[0]['uname'];?></td>

								<td><?php $days = explode(',',$classes[$k]['day']);

													echo "<ul class='list-inline'>";

													foreach($days as $o => $value)

													{

														$day_name = $admin->getone_meta_data('weekdays',$days[$o]);

														echo "<li class='list-inline-item'>".$day_name[0]['meta_value1']."</li>";

													}

													echo "</ul>";

								?></td>

								<td><?php echo date("d-m-Y", strtotime($classes[$k]['start_date']));?></td>

								<td><?php echo $classes[$k]['timing'];?></td>

								<td><?php echo $classes[$k]['duration'].' Minutes';?></td>

					

								<td><i class="fa fa-trash" onclick="deleteme('teacher','delete_class','<?php echo $classes[$k]['id'];?>')"></i> 
								
								
								<!--<i class="fa fa-pencil" onclick="show_page_model('index.php?action=nocss_pages&page=teacher_class_edit&id=<?php echo $classes[$k]['id'];?>')" data-toggle="modal" data-target="#myModal"></i> -->
								
								<i class="fa fa-pencil" onclick="javascript:window.open('<?php echo $base_url;?>index.php?action=nocss_pages&page=teacher_class_edit&id=<?php echo $classes[$k]['id'];?>','Edit Class','width=500,height=700')"></i>
								
								
								
								</td>

							</tr>

					<?php }?>		

				</tbody>

			</table>
	</div>




<?php

}



if($_REQUEST['page']=='class_list')

{?>

<input type='button' name='class_list_btn' class="btn btn-primary btn-xs" value='Download List' onclick="fnExcelReport('class_list')"/>

<table class='table table-bordered' id='class_list'>

	<thead>

		<tr>

			<th>#</th>

			<th>Batch</th>

			<th>Course</th>

			<th>Subject</th>

			<th>Teacher</th>

			<th>Time</th>

			<th>Duration</th>

		</tr>

	</thead>

	<?php $result = $teacher->get_list_class($_REQUEST['branchid'],$_REQUEST['teacher'],$_REQUEST['duration']);

	$counter=1;

	if(count($result)==0)

	{

		echo "<tr><td colspan='7'>No result found</td></tr>";

	}

	else

	{	

			foreach($result as $k=>$value){

				$time = date("Y-m-d H:i:s", strtotime($result[$k]['timing']));
			?>



			<tbody>

				<tr>

					<td><?php echo $counter++;?></td>

					<td><?php $batch_name = $teacher->get_one_batch($result[$k]['batchid']); echo $batch_name[0]['batch_name'];?></td>

					<td><?php $cname=$course->get_one($result[$k]['courseid'],'id'); echo $cname[0]['course_name'];?></td>

					<td><?php $sname=$course->get_one($result[$k]['subjectid'],'id'); echo $sname[0]['subject'];?></td>

					<td><?php $user=$admin->getone_user($result[$k]['teacherid']); echo $user[0]['uname'];?></td>

					<td><?php echo $result[$k]['timing'];?> To <?php $time2 = strtotime(''.$time.' + '.$result[$k]['duration'].' minute'); echo date("H:i:s", $time2);?></td>

					<td><?php echo $result[$k]['duration'].' Minutes';?></td>

				</tr>

			</tbody>



			<?php } }?>

</table>	



<?php } if($_REQUEST['page']=='student_attendence'){
                    $class_id=$_REQUEST['id'];
                    $result=$teacher->get_class_student($class_id);
                    $counter=1;
                    
//-- get class details from class_schedule
$class_details = $teacher->get_one_class($class_id);


echo "<div id='student_data'>";
echo "<div id='msgstudent_attendence'></div>";
echo "<form name='student_attendence' id='student_attendence' action='".$base_url."index.php?action=teacher&query=student_attendence' method='post'>";
echo "<input type='hidden' name='batch' value='".$result[0]['batchid']."'/>";
echo "<input type='hidden' name='subjectid' value='".$class_details[0]['subjectid']."'/>";
echo "<input type='hidden' name='teacherid' value='".$class_details[0]['teacherid']."'/>";
echo "<input type='hidden' name='classid' value='".$class_id."'/>";

$att_details = $teacher->get_attendence_details($class_id,$class_details[0]['subjectid'],$class_details[0]['teacherid']);
echo "<table class='table'>";
?>
<tr>
    <td>                    
        <label>Chapter Name</label>
        <?php echo $class_details[0]['chapterid'];?>
                            <select class="form-control js-example-basic-multiple w-100"  name="chapterid" id="chapter" onchange="get_details('chapter','chapter','topic')">
                                <option value='0'>-- Select ---</option>
                            <?php $allchapter=$course->viewall_chapter_single_subject($class_details[0]['subjectid']); foreach($allchapter as $k => $value){?>
                            <option value='<?php echo $allchapter[$k]['id'];?>' <?php if($att_details[0]['chapterid']==$allchapter[$k]['id']){echo "selected='selected'";}?>><?php echo $allchapter[$k]['chapter'];?></option>
                            <?php } ?> 
                            </select>
    </td>
    <td>
                          <label>Topic Name</label>
                            <select class="form-control" name="topicid" id="topic">
                             <option disabled="">-- Select ---</option>
                             <?php if($att_details[0]['topicid']!='')
                             {$topic=$course->get_one($att_details[0]['topicid'],'id');
                                 echo "<option value='".$topic[0]['id']."'>".$topic[0]['topic']."</option>";
                             }
                             ?>
                            </select>
                          

    </td>
    <td>
        <label>Remark</label>
        <input type='text' name='remark' class='form-control' value='<?php echo $att_details[0]['remark']; ?>'/>
    </td>
<?php
if(count($att_details)<1){
?>

    <td><br><input type='button' name='submit' class='btn btn-md btn-primary' onclick="form_submit2('student_attendence')" value="Save Student Attendence for <?php echo date('d-m-Y');?>" /></td></tr>
<?php
}
else
{?>
<td><br><input type='button' name='submit' class='btn btn-md btn-success' onclick="form_submit2('student_attendence')" value="Update Student Attendence for <?php echo date('d-m-Y');?>" /></td>
<?php 
}?>
</tr>
<?php
echo "<tr>";
echo "<th>Not Available / Available</th>";
echo "<th>Student Name</th>";
echo "<th>Registration #</th>";
echo "</tr>";
foreach($result as $k => $value)
{	
	echo "<tr><td>";?>
                        <label class="switch">
                        <?php 
                        //-- check from attendence checked or not
                        if(count($att_details)>0)
                        {
                        $checked = $teacher->check_attendence($result[0]['batchid'],$class_details[0]['subjectid'],$class_details[0]['teacherid'],$result[$k]['id'],$class_id);
                        if(count($checked)>0)
                        {$check='checked';}
                        else
                        {$check='';}
                        }
                        else
                        {$check='checked';}
                        ?>    
                          <input type="checkbox" name='student_id[]' value='<?php echo $result[$k]['id']; ?>' <?php echo $check; ?>>
                          <span class="slider"></span>
                        </label>
	<?php
	//echo "<td><input class='form-check-input' type='checkbox' role='switch' id='flexSwitchCheckDefault' value='".$result[$k]['id']."' name='student_id[]' id='r$counter'></td>";
	echo "</td>";
	echo "<td>".$result[$k]['uname'].'</td>';
	echo "<td>#BHA00".$result[$k]['id'].'</td>';
	echo "</tr>";
	$counter++;
}
echo "</table>";
echo "</form>";

echo "</div>";

echo "</div>";
}?>

<?php 
//--- course_topic
if($_REQUEST['page']=='course_topic')
{
  $classid=$_REQUEST['id'];  
  $att_details = $teacher->get_attendence_class_byid($classid);
  if(empty($att_details))
  {echo "<div class='alert alert-danger'>No Class Has Been Yet Taken</div>";}
  else
  {
      //--- get course details
      $topic=$course->get_one($att_details[0]['subjectid'],'id');
      $allchapter=$course->viewall_chapter_single_subject($att_details[0]['subjectid']);
      
      echo "<table class='table'>";
      echo "<tr>";
      echo "<th>Subject</th>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>".$topic[0]['subject']."</td>";
          echo "<td>";
          
          if(!empty($allchapter))
          {
            echo "<table class='table'>";    
              foreach($allchapter as $row=>$value)
              {
                  $sname = $course->get_one($allchapter[$row]['id'],'id');
                  echo "<tr><th>".$sname[0]['chapter']."</th>";
                  //-- get topics
                 $alltopic=$course->viewall_topic_single_chapter($allchapter[$row]['id']);
                  if(!empty($alltopic))
                  {            
                    echo "<td><table class='table'>";
                    echo "<tr><th>Chapters & Topic</th><th>Classes Held On</th><th>Completed On</th>";
                   foreach($alltopic as $row=>$value)
                       {
                           $cname = $course->get_one($alltopic[$row]['id'],'id');
                           echo "<tr><td>".$cname[0]['topic']."</td>";   
                           $classes_held=$teacher->get_classes_held_on($alltopic[$row]['id'],$att_details[0]['teacherid']);
                           if(!empty($classes_held))
                           {
                               echo "<td><ol>";
                               foreach($classes_held as $row => $value)
                               {
                                   
                                   echo "<li>".date("d-m-Y g:i a", strtotime($classes_held[$row]['date_time']))."</li>";
                               }
                               echo "</ol></td>";
                               echo "<td><input type='button' value='Set Status To Completed' class='btn btn-xs btn-info'/>";
                           }   
                           echo "</tr>";
                       }
                   echo "</table></td>";
                  }
                  echo "</tr>";
                 
              }
             echo "</table>"; 
          }
          else
          {echo "No Topics Found";}
          
          echo "</td>";
      echo "<td></td>";
      echo "</tr>";
      echo "</table>";
  }
}
?>


<?php 
//--- total attendence
if($_REQUEST['page']=='total_attendence')
{
     $total_student=$teacher->get_class_student($_REQUEST['id']);
     $att_details = $teacher->get_attendence_class_byteacher_batchid($_REQUEST['id'],$_REQUEST['teacherid']);
     echo "<h3>Lecture & Strength Detail(s)</h3>>";
     echo "<table class='table'>";
     echo "<tr>";
     echo "<th>Date & Time</th><th>Total Student Present</th><th>Subject</th><th>Chapter</th><th>Topic</th>";
     echo "</tr>";
     if(!empty($att_details))
     {
         foreach($att_details as $k => $value)
         {
             $all_stu = explode(",",$att_details[$k]['stu_ids']);
             $sname = $course->get_one($att_details[$k]['subjectid'],'id');
             $cname = $course->get_one($att_details[$k]['chapterid'],'id');
             $tname = $course->get_one($att_details[$k]['topicid'],'id');
             
             echo "<tr>";
             echo "<td>".date("d-m-Y g:i a", strtotime($att_details[$k]['date_time']))."</td>";
             echo "<td>".count($all_stu)." Out Of ".count($total_student)."</td>";
             echo "<td>".$sname[0]['subject']."</td>";
             echo "<td>".$cname[0]['chapter']."</td>";
             echo "<td>".$tname[0]['topic']."</td>";
             echo "<tr>";
         }
     }
     else
     {
         echo "<tr>";
         echo "<td colspan='5'>No Data Found</td>";
         echo "<tr>";
     }
     echo "</table>";
}
?>


<?php 
//--- daily dose
if($_REQUEST['page']=='daily_dose')
{
    echo "<div class='alert alert-info'>Feature(s) will yet to come</div>";
}
?>


<?php 
//--- student report
if($_REQUEST['page']=='student_report')
{
	$counter =1; 
	
	$monthNum  = date('m');
	$dateObj   = DateTime::createFromFormat('!m', $monthNum);
	$monthName = $dateObj->format('F'); // March
	//-- get month days
	$d=cal_days_in_month(CAL_GREGORIAN,$monthNum,date('Y'));
	$colspan = $d+2;
	//-- get month
    echo "<table class='table table-bordered'>";
    echo "<tr><th colspan='".$colspan."' style='text-align:center; font-size:16px;'>'".$monthName." ".date('Y')." Attendence'</th></tr>";
    echo "<tr>";
    	echo "<th>S.No.</th>";
    	echo "<th>Name</th>";
    	for($i=1; $i<=$d; $i++)
    	{
    		echo "<th>".$i."</th>";
    	}
    echo "</tr>";
    //-- student and attendence details
    $result=$teacher->get_class_student($_REQUEST['id']);
    foreach($result as $row => $value)
    {
    	echo "<tr>";
    		echo "<th>".$counter++."</th>";
    		echo "<th>".$result[$row]['uname'].'</th>';
    	echo "</tr>";
    }
    echo "</table>";
}
?>


<?php if($_REQUEST['page']=='course_list') {?>
<hr>
<button type='button' name='class_list_btn' class="btn btn-primary btn-xs"  onclick="fnExcelReport('class_list')"><i class='fa fa-file-excel'></i> Download Excel</button>

<button type='button' name='class_list_btn' class="btn btn-default btn-xs"  onclick="generate_pdf('class_list')"><i class='fa fa-file-pdf'></i> Download Pdf</button>

<hr>

<table class='table' id='class_list'>

	<thead>

		<tr>

			<th>#</th>
            <th>Course</th>
            <th>Subject</th>
            <th>Chapter(s) & Topic(s)</th>
            <th>Assessment</th>
		</tr>

	</thead>
	<tbody>
	<?php $result = $course->get_list_course($_REQUEST['course'],$_REQUEST['subject'],$_REQUEST['chapter']);

	$counter=1;

	if(count($result)==0)

	{

		echo "<tr><td colspan='6'>No result found</td></tr>";

	}

	else

	{	

			foreach($result as $k=>$value){
			    
			    if(is_numeric($result[$k]['course_name']))
			    {$cname=$course->get_one($result[$k]['course_name'],'id');}
			    else
			    {$cname=$result[$k]['course_name'];}
			    
			  
			?>



			

				<tr>
                    <td><?php echo $counter++;?></td>
    				<td><?php echo $cname[0]['course_name'];?></td>
    				<td><?php if(is_numeric($result[$k]['subject']))
					{$sname=$course->get_one($result[$k]['subject'],'id');
						echo $sname[0]['subject'];}
					else
					{echo $result[$k]['subject'];}
					?></td>
					<td colspan="2">
						<?php
						// -- get all chapters
						$chapters = $course->viewall_chapter_single_subject($result[$k]['subject']);
						if(count($chapters)>0)
						{
							echo "<ul>";
							foreach($chapters as $row => $value)
							{
								echo "<li>".$chapters[$row]['chapter'];
								//-- check chapter has topics or not
								$topics = $course->viewall_topic_single_chapter($chapters[$row]['id']);
								if(count($topics)>0)
								{
									echo "<ul>";
									foreach($topics as $row => $value)
									{
									echo "<li>".$topics[$row]['topic']."</li>";
									}
									echo "</ul>";
								}
								echo "</li>";
						
							}
							echo "</ul>";
						}
						?>
					</td>
					

					

    		</tr>

			



			<?php } }?>
			</tbody>
</table>	



<?php }?>

<?php include('../web/footer.php');

?>

