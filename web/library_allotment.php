<div class="card-header"><h4>Library Book Allotment (Teacher)</h4></div>


<div class="card-body">

	<div class="content">
		<div id="msgbook_allotment"></div>
		
		<form name="book_allotment" id="book_allotment" action="<?php echo $base_url.'index.php?action=library&query=add_book_allotment';?>" method="post">
		<div class="col-sm-12">

        <div class="col-md-3">
                          <label>Course</label>
                           <select class="form-control" id="courseid" name="course_name" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  
							  foreach ($allcourses as $key => $value) {?>
								<option value="<?php echo $allcourses[$key]['id'];?>">
								<?php echo $allcourses[$key]['course_name'];?></option>  
								<?php }?>
                            </select>
                    </div>

                    <div class="col-md-3">
                          <label>Subject</label>
                    
                            <select class="form-control" name="subject" id="subject" onchange="drop_down_populate('library_details','library_books','book','subject')">
                             <option disabled="">-- Select ---</option>
                            </select>
                    </div>


			<div class="col-sm-3">
				<label>Book</label>
				<select class='form-control' name="book" id="book" onchange="drop_down_populate('library_details','library_book_qty','nu_of_books','book')">
                    <option disabled="disabled" selected="selected">-- Select --</option>
                    
                </select>
			</div>

            <div class="col-sm-3">
				<label>Nu of Copies</label>
				<input type="number" class="form-control" name="copies" value="">
				<span id="nu_of_books" style="color:red;"></span>
			</div>

            <div class="col-sm-3">
				<label>Allotment Date</label>
				<input type="date" value="<?php echo date('d-m-yyy'); ?>" class="form-control" name="alloted_date">
			</div>

			<div class="col-sm-3">
				<label>Schedule Return Date</label>
				<input type="date" value="" class="form-control" name="schedule_return_date">
			</div>

            <div class="col-sm-3">
				<label>Teacher Name</label>
				<input type="hidden" name="user_type" value="2"/>
				<select class='form-control js-states' name="user_id">
                    <option disabled="disabled" selected="selected">-- Select --</option>
                    <?php 
                        $teacher=$admin->getonetype_user('2');
                        foreach($teacher as $row=>$value)
                        {
                          
                            echo "<option value='".$teacher[$row]['id']."'>".$teacher[$row]['uname']."</option>";
                        }
                    ?>
                </select>
				
				
			</div>
			
			<div class="col-sm-2"><br>
				<input onclick="form_submit('book_allotment')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>

	</div>
<hr>
		
	<div class="row">
		<div class="col-sm-12">
			
		</div>
	</div>

</div>

<?php include('footer2.php');?>