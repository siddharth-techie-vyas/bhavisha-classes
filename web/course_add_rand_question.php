<?php
		$level = $admin->getonetype_meta_data('topic_level');
      
 ?>
<div class='card-header'>
	<h4>Generate Random Number of Question(s)</h4>
</div>
<div class="row">
	<div class="col-sm-12">
		<?php foreach ($level as $k => $value) {?>
		<div class="col-sm-3">
			<input type="hidden" name="rand_question" value="1">
			<label><?php echo $level[$k]['meta_value1'] ?></label>
			<input type="number" value="0" min="0" max="15" name="<?php echo $level[$k]['meta_value2'] ?>" class="form-control">
		</div>
		<?php }?>
	</div>


		
	

</div>
<div class="col-sm-12"><hr>
		<button type="button" class="btn btn-info" data-dismiss="modal" onclick="get_rand_question()">Generate Random Question</button>
	</div>
