

<?php   $asses = $course->get_assessment_details_papers($_GET['id']);
$details = $course->viewone_course($_GET['id']);
$sub_details = $course->viewone_course($details[0]['subject']);
$answers=array();
$special_char=array('\r','\n');
?>

<input type="button" onclick="htmlget('canvas_div_pdf','Assessment - <?php echo $details[0]['assessment'];?>')" id="save_pdf" name="Download PDF" class="no-print btn btn-mini btn-info" value="Download PDF">

<input type="button" name="print" value="Download Anwer Key" class="no-print btn btn-mini btn-success" onclick="htmlget('answer_sheet','Assessment - Answer Sheet - <?php echo $details[0]['assessment'];?>')"> 

<!-- <a href="" name="edit" value="Edit" class="no-print btn btn-mini btn-primary">Edit</a> -->

<input type="button" name="edit" value="Delete" class="no-print btn btn-mini btn-danger"> 

<div id="pdf_editor"></div>

<div id="canvas_div_pdf">

<div style="border:1px solid #0000;">


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
				echo "<th colspan='2'>".str_replace($special_char," ",$mcq[$key]['part1'])."</th>";
				echo "<th>(Marks : ".str_replace($special_char," ",$mcq[$key]['marks'])." )</th>";
				echo "</tr>";

				echo "<tr><td> (A) ".str_replace($special_char," ",$mcq[$key]['opt1'])."</td>";
				echo "<td> (B) ".str_replace($special_char," ",$mcq[$key]['opt2'])."</td>";
				echo "<td> (C) ".str_replace($special_char," ",$mcq[$key]['opt3'])."</td>";
				echo "<td> (D) ".str_replace($special_char," ",$mcq[$key]['opt4'])."</td>";
				echo "</tr>";

				//-- add answer into array 
				array_push($answers,$mcq[$key]['solution']);
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
				{echo "<td>".str_replace($special_char," ",$fill[$key]['part1'])."</td>";}
				else
				{echo "<td>...............................................</td>";}	
				if($fill[$key]['part2'] !='')
				{echo "<td>".str_replace($special_char," ",$fill[$key]['part2'])."</td>";}
				else
				{echo "<td>................................................</td>";}
				echo "<th>(Marks : ".$fill[$key]['marks']." )</th>";
				echo "</tr>";

				//-- add answer into array 				
				array_push($answers,$fill[$key]['solution']);
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
				echo "<td width='70%'>".str_replace($special_char," ",$short[$key]['part1'])."</td>";
				echo "<th>(Marks : ".str_replace($special_char," ",$short[$key]['marks'])." )</th>";
				echo "</tr>";

				//-- add answer into array 
				array_push($answers,$short[$key]['solution']);
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
				echo "<td width='70%'>".str_replace($special_char," ",$long[$key]['part1'])."</td>";
				echo "<th>(Marks : ".str_replace($special_char," ",$long[$key]['marks'])." )</th>";
				echo "</tr>";

				//-- add answer into array 
				array_push($answers,$long[$key]['solution']);
 			}
			?>
		</table>
	</div>
	<?php }?>


		



</div>

<!--- footer--->
<hr>
<div class="row">
	<div class="col-sm-12 text-center">
		<p>WITH BEST WISHES FROM BHAVISHA INSTITUTE</p>
	</div>	
</div>	


</div>

</div>


<!--- answer sheet--->
<hr>
<div class="col-sm-12" id="answer_sheet">
<h2><?php echo $details[0]['assessment'];?></h2>
<h3><?php $subjects = explode(',', $details[0]['subject']); ?></h3>
<h4>Answer Sheet</h4>
		<hr>
		<?php 
			//print_r($answers);
			$qcount_array = $answers;
			echo "<table border='1' style='width:100%;' cellpadding='5'>";
			//$qcount_array = explode(",", $qcount);
			$qcount = count($qcount_array);
			$tr='1';
			for($i=0; $i<$qcount; $i++) {
				$j=$i+1;
				$tr++;
				if($tr=='0')
				{echo "<tr>";}
				echo "<td valign='top'><b>Ans. ".$j." :- </b><hr>".str_replace($special_char," ",$qcount_array[$i])."</td>";
				if($tr=='4')
				{echo "</tr>"; $tr='0';}
				
			}
			echo "</table>";
		?>
	</div>
