
<div class="card-header"><h4>Edit Attendence</h4></div>
<?php 
if($_SESSION['uid']!='1')
{
    echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=dashboard';</script>";
}
?>

<div class="card-body">
    <form name="edit_attendece" action="<?php echo $base_url.'index.php?action=dashboard&page=student_edit_attendence';?>" method="post">
    <div class="row">
        
        <div class="col-sm-2">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="col-sm-2">
            <label>Batch</label>
            <select class="form-control" id="batchid" name="batch" onchange="get_batch_details('course','batchid','courseid')">
                      <option disabled="" selected="">-- Select Batch --</option>
                      <?php $batch = $teacher->get_all_batches($_SESSION['syear'],$_SESSION['branch']);  foreach ($batch as $key => $value) {?>
                      <option value="<?php echo $batch[$key]['id'];?>">
                        <?php echo $batch[$key]['batch_name'];?>
                      </option>  
                    <?php }?>
                    </select>
                  
                </div>


                <div class="col-md-2">
                  <label>Course Name</label>
                   <select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')">
                      <option disabled="" selected="">-- Select Course --</option>
                      
                    </select>
                  
                </div>

              	<div class="col-md-2">
                  <label>Subject</label>
                    <select class="form-control" name="subject" id="subject" style="width:90%; display:inline;">
                     <option disabled="" selected="">-- Select ---</option>
                    </select>

                </div>
                
                <div class="col-md-2">
                  <label>Teacher</label>
                    	<select name="teacher"  class="form-control" >
        					<option>-- Select --</option>
        					<?php $faculty = $admin->getonetype_user('2');  
        
        						//	$user = array_unique($user0);
        							foreach($faculty as $k=>$value)
        							{
        								echo "<option value='".$faculty[$k]['id']."'>".$faculty[$k]['uname']."</option>";
        							}
        					?>
        				</select>

                </div>
                <div class="col-md-1">
                 <br> <input type="reset" name="reset" value="Reset" class="btn btn-warning">
                </div>  
                <div class="col-md-1">
                 <br> <input type="submit" name="submit" value="Submit" class="btn btn-success">
                </div>  
    </div>
    </form>
</div>

<?php
if(isset($_GET['status']))
{
    if($_GET['status']=='2'){echo "<div class='alert alert-success'>Attendence Updated !!!</div>";}
    if($_GET['status']=='1'){echo "<div class='alert alert-danger'>Something went wrong !!!</div>";}
}


if(isset($_POST['submit']))
{?>
<div class="card-body">
    <?php 
    $result=$teacher->get_attendece_details_one($_POST['date'],$_POST['batch'],$_POST['subject'],$_POST['teacher']);
    
echo '<form name="edit_attendence" method="post" action="'.$base_url.'index.php?action=teacher&query=student_edit_attendence">';    
echo "<table class='table table-bordered'>";    
?>
<tr>
    <th>Batch & Date</th>
    <th>Subject</th>    
    <th>Course</th>
    <th>Teacher</th>
</tr>
<tr>
    <td><?php $batchname=$teacher->get_one_batch($result[0]['batch']); echo $batchname[0]['batch_name'];?></td>
    <td><?php $sub_name1=$course->viewone_course($result[0]['subjectid']); echo $sub_name1[0]['subject'];?></td>
    <td><?php $course_name1=$course->viewone_course($sub_name1[0]['course_name']); echo $course_name1[0]['course_name'];?></td>
    <td><?php $teacherid=$admin->getone_user($result[0]['teacherid']); echo $teacherid[0]['uname'];?></td>
</tr>
<tr>
    <td colspan="4"> 
        <!--- hidden inputs-->
        <input type="hidden" name="attid" value="<?php echo $result[0]['id'];?>">
    </td>
</tr>
        
        
<?php


echo "<tr>";
echo "<th>S.No.</th>";
echo "<th>Not Available / Available</th>";
echo "<th>Student Name</th>";
echo "<th>Registration #</th>";
echo "</tr>";

$sno=1;
	

$sids= $teacher->get_class_student_forattendence($result[0]['classid'],$result[0]['subjectid']);
foreach($sids as $s=>$v){
    

echo "<tr>";
echo "<td>".$sno++."</td>";
	echo "<td>";

	?>
                        <label class="switch">
                        <?php 
                        //-- check from attendence checked or not
                        
                        $checked = $teacher->check_attendence_foredit($result[0]['batch'],$result[0]['subjectid'],$result[0]['teacherid'],$sids[$s]['id'],$result[0]['classid'],$_POST['date']);
                        if(count($checked)>0)
                        {$check='checked';}
                        else
                        {$check='';}
                        
                        
                        ?>    
                          <input type="checkbox" name='student_id[]' value='<?php echo $sids[$s]['id']; ?>' <?php echo $check; ?>>
                          <span class="slider"></span>
                        </label>
	<?php
	
	//echo "<td><input class='form-check-input' type='checkbox' role='switch' id='flexSwitchCheckDefault' value='".$result[$k]['id']."' name='student_id[]' id='r$counter'></td>";
	echo "</td>";
	echo "<td>".$sids[$s]['uname'].'</td>';
	echo "<td>#BHA00".$sids[$s]['id'].'</td>';
	


	echo "</tr>";
	$counter++;
}
echo "<tr><td colspan='4'>";
    echo "<input type='submit' name='submit' value='Update Attendence' class='btn btn-mg btn-info'>";
echo "</td></tr>";
echo "</table>";
echo "</div>";
echo "</form>";
    ?>
</div>
<?php }?>
    
    