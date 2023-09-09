<div class="card-header"><h4>Class Calender</h4></div>


<div class="card-body">

	<div class="row">
<div id="msgholiday"></div>

<div class="row">
		<div class="col-sm-12">
			<?php $classes = $teacher -> get_all_classes_schedule();

					foreach ($classes as $key => $value) {
						?>

				<div class="col-sm-6">
					<h3 class="alert alert-success">
						<?php //echo $classes[$key]['courseid']; 
								$cls = $course->get_one($classes[$key]['courseid'],'id'); 
                                    echo $cls[0]['course_name'];
                                    echo '&nbsp'.$classes[$key]['timing'];
						?>
					</h3>
					<h4>
						<?php $sub = $course->get_one($classes[$key]['subjectid'],'id'); 
                                    echo $sub[0]['subject']; ?>
					</h4>
					<h5><?php $tname = $admin->getone_user($classes[$key]['teacherid']); 
                                    echo $tname[0]['uname']; ?></h5>
					<h6><?php echo $classes[$key]['duration'].' Minutes'; ?></h6>
				</div>		

			<?php } ?>			


		</div>
</div>

</div>				
					
	