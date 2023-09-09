
<div class="card-header"><h4>Add Library Books</h4></div>


<div class="card-body">

	<div class="content">
		<div id="msgbook"></div>
		
		<form name="book" id="book" action="<?php echo $base_url.'index.php?action=library&query=add_book';?>" method="post">
		<div class="col-sm-12">
			<div class="col-sm-3">
				<label>Book Name</label>
				<input type="text" class="form-control" name="book_name" value="">
			</div>

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
                    
                            <select class="form-control" name="subject" id="subject" onchange="get_details('subject','subject','chapter')">
                             <option disabled="">-- Select ---</option>
                            </select>
                    </div>


            <div class="col-sm-3">
				<label>Nu of Copies</label>
				<input type="number" class="form-control" name="copies" value="">
			</div>

            <div class="col-sm-3">
				<label>Author</label>
				<select class='form-control' name="author">
                    <option disabled="disabled" selected="selected">-- Select --</option>
                    <?php 
                        $author=$library->viewall_author();
                        foreach($author as $row=>$value)
                        {
                            echo "<option value='".$author[$row]['id']."'>".$author[$row]['author']."</option>";
                        }
                    ?>
                </select>
			</div>

			<div class="col-sm-3">
				<label>Publication</label>
				<select class='form-control' name="publication">
                    <option disabled="disabled" selected="selected">-- Select --</option>
                    <?php 
                        $publication=$library->viewall_publication();
                        foreach($publication as $row=>$value)
                        {
                            echo "<option value='".$publication[$row]['id']."'>".$publication[$row]['publication']."</option>";
                        }
                    ?>
                </select>
			</div>

            <div class="col-sm-3">
				<label>Location</label>
				<select class='form-control' name="location">
                    <option disabled="disabled" selected="selected">-- Select --</option>
                    <?php 
                        $location=$library->viewall_location();
                        foreach($location as $row=>$value)
                        {
                            echo "<option value='".$location[$row]['id']."'>".$location[$row]['location']."</option>";
                        }
                    ?>
                </select>
			</div>

			<div class="col-sm-3">
				<label>Edition</label>
				
				<select class='form-control' name="edition">
                    <option disabled="disabled" selected="selected">-- Select --</option>
                    <?php 
                        
						for ($i=15; $i<=date('y'); $i++) {
							$j = $i;
							$k = $j+1;
							$l=$j.' - '.$k;
							
							echo "<option value='20".$l."'>20".$l."</option>";
						}
                            
                    ?>
                </select>
			</div>

			<div class="col-md-3">
				<label>Remark</label>
				<textarea col="5" row="1" class="form-control" name="remark"></textarea>
			</div>	
			<div class="col-sm-2"><br>
				<input onclick="form_submit('book')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="Reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>

	</div>
<hr>
		
	<div class="row">
		<div class="col-sm-12">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Book Name</th>
						<th>Course & Subject</th>
						<th>Publication</th>
                        <th>Author</th>
                        <th>Location</th>
						<th>UPC</th>
                        <th>Total Copies</th>
                        <th>Alloted</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$counter=1;
						$viewall = $library->viewall_books();
						foreach($viewall as $row => $value)
						{
							echo "<tr id='".$viewall[$row]['id']."'>";
							echo "<th>BIB00".$viewall[$row]['id']."</th>";
							echo "<td>".$viewall[$row]['book_name']."</td>"; 
							echo "<td>";
								$course_name = $course->get_one($viewall[$row]['course'],'id');
								echo $course_name[0]['course_name'];
								echo " >> ";
								$subject = $course->get_one($viewall[$row]['subject'],'id');
								echo $subject[0]['subject'];

							echo "</td>"; 
							echo "<td>";
								$publication = $library->get_publication_one($viewall[$row]['publication']);
								echo $publication[0]['publication'];
                            echo "</td>";
							
							echo "<td>";
                            $author = $library->get_author_one($viewall[$row]['author']);
                            echo $author[0]['author'];
                            echo "</td>";
                            
                            echo "<td>";
                            $location = $library->get_location_one($viewall[$row]['location']);
                            echo $location[0]['location'];
                            echo "</td>";

							echo "<td>".$viewall[$row]['upc']."</td>";
                            echo "<td>".$viewall[$row]['copies']."</td>";
                            echo "<td>".$viewall[$row]['alloted']."</td>";
                            ?>
							<td><i class='fa fa-trash' onclick="deleteme('library','delete_book','<?php echo $viewall[$row]['id'];?>')"></td>
							<?php echo "<tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php include('footer2.php');?>