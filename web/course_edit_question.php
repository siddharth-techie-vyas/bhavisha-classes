<div class='card-header'><h4>Edit Question</h4></div>
<?php $question=$course->get_question_single($_GET['id']); 
$qtype = $question[0]['qtype'];
$level = $admin->getonetype_meta_data('topic_level');
      $qused = $admin->getonetype_meta_data('question_used');
?>
<div class="card-body">
<div id="msgedit_question0"></div>
<form class="form-control" name="edit_question" action="<?php echo $base_url.'index.php?action=course&query=edit_question';?>" method="post" id="edit_question0">

	<input type="hidden" name="tid" value="<?php echo $question[0]['id'];?>">
	<input type="hidden" name="qtype" value="<?php echo $question[0]['qtype'];?>">

<div class="row">
	<div class="col-sm-12">
		
		<div class="col-sm-6">
			<label>Question / Part 1</label>
			<input type="text" value="<?php echo $question[0]['part1'];?>" class="form-control" name="part1">
		</div>
		<?php if($qtype == '1'){ ?>
		<div class="col-sm-6">
			<label>Part 2</label> 
			<input type="text" value="<?php echo $question[0]['part2'];?>" class="form-control" name="part2">
		</div>
		<?php }if($qtype == '2'){ ?>
		<div class="col-sm-6">
			<label>Option 1</label>
			<input type="text" value="<?php echo $question[0]['opt1'];?>" class="form-control" name="opt1">
		</div>
		<div class="col-sm-6">
			<label>Option 2</label>
			<input type="text" value="<?php echo $question[0]['opt2'];?>" class="form-control" name="opt2">
		</div>
		<div class="col-sm-6">
			<label>Option 3</label>
			<input type="text" value="<?php echo $question[0]['opt3'];?>" class="form-control" name="opt3">
		</div>
		<div class="col-sm-6">
			<label>Option 4</label>
			<input type="text" value="<?php echo $question[0]['opt4'];?>" class="form-control" name="opt4">
		</div>
		<?php } ?>
		<div class="col-sm-6">
			<label>Level</label>
			<select class="form-control" name="level">
				<option disabled="" selected="">--Select--</option>
				<?php foreach ($level as $key => $value) { ?>
					<option value="<?php echo $level[$key]['meta_value2'];?>" <?php if($question[0]['level']==$level[$key]['meta_value2']){?>selected="selected"<?php }?> >
						<?php echo $level[$key]['meta_value1'];?>
					</option>
				<?php } ?>
			</select>
		</div>
		<div class="col-sm-6">
			<label>Question Used For</label>
			<select class="form-control" name="qused">
				<option disabled="" selected="">--Select--</option>
				<?php foreach ($level as $key => $value) { ?>
					<option value="<?php echo $qused[$key]['meta_value2'];?>" <?php if($question[0]['qused']==$qused[$key]['meta_value2']){?>selected="selected"<?php }?> >
						<?php echo $qused[$key]['meta_value1'];?>
					</option>
				<?php } ?>
			</select>
		</div>
		<div class="col-sm-6">
			<label>Marks</label>
			<input type="text" value="<?php echo $question[0]['marks'];?>" class="form-control" name="marks">
		</div>
		<div class="col-sm-6">
			<label>Solution / Answer</label>
			<input type="text" value="<?php echo $question[0]['solution'];?>" class="form-control" name="solution">
		</div>
		<div class="col-sm-6">
			<label>Explaination</label>
			<input type="text" value="<?php echo $question[0]['explanation'];?>" class="form-control" name="explanation">
		</div>
		<div class="col-sm-12"><br><input type="submit" class="btn btn-success btn-md" name="edit" value="Edit" onclick="form_submit('edit_question0')"></div>

	</div>	
</div>	
</form>
</div>

<?php include('footer2.php'); ?>