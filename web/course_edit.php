<?php $edit=$course->viewone_course($_GET['id']); ?>

<form name="edit_course" id="edit_course" action="<?php echo $base_url.'index.php?action=course&query=edit_course';?>" method="post">

	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

	<div id="msgedit_course"></div>

<table class="table">

	<tr>

		<th colspan="2" style="text-align: center;">Edit <?php echo strtoupper($_GET['type']); ?>

			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

		</th>

	</tr>

	<?php if($_GET['type']=='course'){ ?>

	<tr>

		<td>Course Name</td>

		<th><input type="text" name="course" value="<?php echo $edit[0]['course_name'];?>" class="form-control"></th>

	</tr>
	<tr>

		<td>Fee</td>

		<th><input type="text" name="fee" value="<?php echo $edit[0]['fee'];?>" class="form-control"></th>

	</tr>

	<?php }if($_GET['type']=='subject'){ ?>

	<tr>

		<th>Course Name</th>

		<td><select class="form-control" name="course">

                              <option disabled="" selected="">-- Select Course --</option>

                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>

                              <option <?php if($edit[0]['course_name']==$allcourses[$key]['id']){?>selected='selected'<?php }?> value="<?php echo $allcourses[$key]['id'];?>"><?php echo $allcourses[$key]['course_name'];?></option>  

                            <?php }?>

                            </select>

        </td>

	</tr>

	<tr>

		<td>Subject Name</td>

		<th><input type="text" name="subject" value="<?php echo $edit[0]['subject'];?>" class="form-control"></th>

	</tr>

	<tr>

		<td>Fee</td>

		<th><input type="text" name="fee" value="<?php echo $edit[0]['fee'];?>" class="form-control"></th>

	</tr>



	<?php }if($_GET['type']=='chapter'){ ?>

	<tr>

		<th>Course Name</th>

		<td><select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')">

                              <option disabled="" selected="">-- Select Course --</option>

                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>

                              <option <?php if($edit[0]['course_name']==$allcourses[$key]['id']){?>selected='selected'<?php }?> value="<?php echo $allcourses[$key]['id'];?>">

                              	<?php echo $allcourses[$key]['course_name'];?>

                              </option>  

                            <?php }?>

                            </select>

        </td>

	</tr>

	<tr>

		<th>Subject Name</th>

		<td>

			<select class="form-control" name="subject" id="subject">

             <option disabled="">-- Select ---</option>

             <?php $allsubject = $course->viewall_subject(); foreach($allsubject as $key =>$value) {?>

             	<option <?php if($edit[0]['subject']==$allsubject[$key]['id']){?>selected='selected'<?php }?> value="<?php echo $allsubject[$key]['id'];?>"><?php echo $allsubject[$key]['subject'];?></option>

             <?php }?>	

            </select>

		</td>

	</tr>

		

	<tr>

		<td>Chapter Name</td>

		<th><input type="text" name="chapter" value="<?php echo $edit[0]['chapter'];?>" class="form-control"></th>

	</tr>

	

	<?php }?>

	<tr>

		<td></td>

		<td><input type="button" onclick="form_submit('edit_course')" name="submit" value="Edit" class="btn btn-md btn-info"></td>

	</tr>



</table>

</form>



