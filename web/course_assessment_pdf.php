

<?php   $asses = $course->get_assessment_details_papers($_GET['id']);
$details = $course->viewone_course($_GET['id']);
$sub_details = $course->viewone_course($details[0]['subject']);
?>

<input type="button" onclick="getpdf()" id="save_pdf" name="Download PDF" class="no-print btn btn-mini btn-info" value="Download PDF">

<input type="button" name="print" value="Download Anwer Key" class="no-print btn btn-mini btn-success"> 

<input type="button" name="edit" value="Edit" class="no-print btn btn-mini btn-primary"> 

<input type="button" name="edit" value="Delete" class="no-print btn btn-mini btn-danger"> 


<div id="canvas_div_pdf" style="padding:20px 10px 20px 10px;">
<div class="row" >
	<div class="col-sm-12">
		<div class="col-sm-5">
		<?php 
			$item = 'theme/images/logo.png';
			$type = pathinfo($item, PATHINFO_EXTENSION);
			$data = file_get_contents($item);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
		?>
			<img src="<?php echo $base64;?>"/>
		</div>
		<div class="col-sm-7">
			<h4>Bhavisha - The Commerce & Law Institute</h4>
			<p>410 - Nandanwan Nagar, Aakhalia Circle, Chopasani Road, Jodhpur (Raj.)</p>
			<p>Contact : 0291-2760178, 9810060308, 9829524103</p>
		</div>	
	</div>
</div>
<hr>
<!--header-->

<div class="row">
	<center>
		<h2><?php echo $details[0]['assessment'];?></h2>
		<h4><?php $subjects = explode(',', $details[0]['subject']); 

									echo "( ";
                                    for($i=0; $i<count($subjects); $i++)
                                    {
                                      $sname = $course->get_one($subjects[$i],'id'); 
                                      echo $sname[0]['subject'].',';
                                      //echo $sname.', ';
                                    };
                                    echo ") ";
                                    ?>
                                    	
        </h4>
	</center>
	<hr>
	<div class="col-sm-12">
		<div class="col-sm-4">
			<h4>Name ....................</h4>

		</div>
		<div class="col-sm-4">
			<h4>Time Allowed : <?php echo $asses[0]['hours'].' Hours '.$asses[0]['minutes'].' Minutes'; ?></h4>
		</div>
		<div class="col-sm-4">
			<h4>Max. Marks : <?php echo $asses[0]['max_marks'];?></h4>
			<h4>Negative Marks (Per Question) : <?php echo $asses[0]['neg_marks'];?></h4>
		</div>
	</div>

	<?php $questions = $asses[0]['qids']; 
			$mcq = $course->get_pdf_questions($questions,'2');
			$fill = $course->get_pdf_questions($questions,'1');
			$long = $course->get_pdf_questions($questions,'4');
			$short = $course->get_pdf_questions($questions,'3');
	?>

	<!--- mcq--->
	<?php $mcq_count = count($mcq); $count=1; if(!empty($mcq_count)){?>
	<div class="col-sm-12">
		<table class="table">
			<tr>
				<th colspan="4" class="text-center alert alert-danger">Multiple Choice Questions (<?php echo count($mcq).' Questions';?>) </th>
			</tr>
			<?php 
			foreach ($mcq as $key => $value) {
				echo "<tr><th>".$count++."</th>";
				echo "<th colspan='2'>".$mcq[$key]['part1']."</th>";
				echo "<th>(Marks : ".$mcq[$key]['marks']." )</th>";
				echo "</tr>";

				echo "<tr><td> (A) ".$mcq[$key]['opt1']."</td>";
				echo "<td> (B) ".$mcq[$key]['opt2']."</td>";
				echo "<td> (C) ".$mcq[$key]['opt3']."</td>";
				echo "<td> (D) ".$mcq[$key]['opt4']."</td>";
				echo "</tr>";
 			}
			?>
		</table>
	</div>
	<?php }?>


	<!--- fill--->
	<?php $fill_count = count($fill); $count=1; if(!empty($fill_count)){?>
	<div class="col-sm-12">
		<table class="table">
			<tr>
				<th colspan="5" class="text-center alert alert-success">Fill In The Blanks (<?php echo count($fill).' Questions';?>) </th>
			</tr>
			<?php 
			foreach ($fill as $key => $value) {
				echo "<tr><th>".$count++."</th>";
				if($fill[$key]['part1'] !='')
				{echo "<td>".$fill[$key]['part1']."</td>";}
				else
				{echo "<td>...............................................</td>";}	
				if($fill[$key]['part2'] !='')
				{echo "<td>".$fill[$key]['part2']."</td>";}
				else
				{echo "<td>................................................</td>";}
				echo "<th>(Marks : ".$fill[$key]['marks']." )</th>";
				echo "</tr>";
 			}
			?>
		</table>
	</div>
	<?php }?>



	<!--- short --->
	<?php $short_count = count($short); $count=1; if(!empty($short_count)){?>
	<div class="col-sm-12">
		<table class="table">
			<tr>
				<th colspan="3" class="text-center alert alert-warning">Short Questions (<?php echo count($short).' Questions';?>) </th>
			</tr>
			<?php 
			foreach ($short as $key => $value) {
				echo "<tr><th>".$count++."</th>";
				echo "<td width='70%'>".$short[$key]['part1']."</td>";
				echo "<th>(Marks : ".$short[$key]['marks']." )</th>";
				echo "</tr>";
 			}
			?>
		</table>
	</div>
	<?php }?>



	<!--- long --->
	<?php $long_count = count($long); $count=1; if(!empty($long_count)){?>
	<div class="col-sm-12">
		<table class="table">
			<tr>
				<th colspan="3" class="text-center alert alert-info">Long Questions (<?php echo count($long).' Questions';?>) </th>
			</tr>
			<?php 
			foreach ($long as $key => $value) {
				echo "<tr><th>".$count++."</th>";
				echo "<td width='70%'>".$long[$key]['part1']."</td>";
				echo "<th>(Marks : ".$long[$key]['marks']." )</th>";
				echo "</tr>";
 			}
			?>
		</table>
	</div>
	<?php }?>


	<!--- answer sheet--->
	<div class="col-sm-12">
		<hr>
		<h4>Answer Sheet</h4>
		<hr>
		<?php 
			$qcount = $questions;
			$qcount_array = explode(",", $qcount);
			$qcount = count($qcount_array);

			for($i=0; $i<$qcount; $i++) {
				$j=$i+1;
				echo "<div class='col-sm-3' style='height:30px; border:1px solid #000'>Ans. ".$j." :- </div>";
			}
		?>
	</div>	



</div>






<!--- footer--->
<hr>
<div class="row">
	<div class="col-sm-12 text-center">
		<p>WITH BEST WISHES FROM BHAVISHA INSTITUTE</p>
	</div>	
</div>	

<div id="editor"></div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
<script>
function getpdf()
{
 var element = document.getElementById('canvas_div_pdf');
 html2pdf(element);
}

</script>