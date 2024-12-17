<div class="card-header"><h4>Close A Batch</h4></div>

<?php $batchd=$teacher->get_one_batch($_GET['id']);
//-- course details
$coursed=$course->viewone_course($batchd[0]['course']);
$session=$admin->get_session_year_one($batchd[0]['session']);
$scount=$teacher->get_student_count_in_batch($_GET['id']);
$scount2=$teacher->get_student_count_in_batch2($_GET['id']);
?>
<div class="card-body">

		
	<form name="closebatch" id="closebatch" action="<?php echo $base_url.'submission/teacher.php?page=close_batch';?>" method="post">	
	   
	   <div class="row">
	    <div class="col-sm-3">
	        <label>Batch Name : </label>
	        <?php echo $batchd[0]['batch_name'];?>
	   </div>
	   
	   <div class="col-sm-3">
	        <label>Course : </label>
	        <?php echo $coursed[0]['course_name'];?>
	   </div>
	   
	   <div class="col-sm-2">
	        <label>Session : </label>
	        <?php echo $session[0]['syear'];?>
	   </div>
	   
	   <div class="col-sm-2">
	        <label>Number of Student : </label><br>
	        <?php echo 'Batch 1 :- '.$scount[0]['stu_count'];?><br>
	        <?php echo 'Batch 2 :- '.$scount2[0]['stu_count'];?>
	   </div>
	
	    <div class="col-sm-2">
	        <label>Start Date : </label>
	        <?php echo $batchd[0]['start_date'];?>
	   </div>
	   
	   </div>
	   
	   <div class="row">
	    
	        <div class="col-sm-2">
	            <input type="hidden" name="id" value="<?php echo $batchd[0]['id'];?>">
	            <input type="button" class="btn btn-md btn-info" onclick="form_result('closebatch')" value="Process to Close">
	        </div>
	       
	   </div>
	   
	   
	   
	</form>


</div>

<div class="card">
	<div class="card-body">
	<div class="row">
		<div class="col-sm-12" id='msgclosebatch'>
		</div>
	</div>
</div>

</div>

</div>
<?php include('footer.php');?>