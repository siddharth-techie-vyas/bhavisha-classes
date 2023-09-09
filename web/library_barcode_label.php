<style>
@import url('https://fonts.googleapis.com/css2?family=Libre+Barcode+EAN13+Text&display=swap');
  .barcode{font-family: 'Libre Barcode EAN13 Text', cursive; font-size:75px; text-align:center; margin:0;}
  
  .page {
        width: 21cm;
        min-height: 29.7cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 237mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<div class="card-header"><h4>Print UPC Label(s)</h4></div>


<div class="card-body">

	<div class="content">
		
		
		<form name="barcode" id="barcode" action="<?php echo $base_url.'submission/library.php';?>" method="get">
		<div class="col-sm-12">
			<input type="hidden" name="page" value="barcode_label"/>

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

			
			<div class="col-sm-2"><br>
				<input  onclick="form_result('barcode')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="Reset" class="btn btn-warning btn-md">
			</div>	
		</div>
		</form>

	</div>
<hr>
		
	<div class="row">
	    
    <div id="msgbarcode" >
	</div>
	</div>

</div>

<?php include('footer2.php');?>