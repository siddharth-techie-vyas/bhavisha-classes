
<div class="card-header"><h4>Add Publication(s) For Library Books</h4></div>


<div class="card-body">

	<div class="content">
		<div id="msgpublication"></div>
		
		<form name="publication" id="publication" action="<?php echo $base_url.'index.php?action=library&query=add_publication';?>" method="post">
		<div class="col-sm-12">
			<div class="col-sm-3">
				<label>Publication Name</label>
				<input type="text" class="form-control" name="publication" value="">
			</div>
			
			<div class="col-sm-2"><br>
				<input onclick="form_submit('publication')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
				<input type="reset" name="reset" value="reset" class="btn btn-warning btn-md">
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
						<th>S.No.</th>
						<th>Publication Name</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$counter=1;
						$viewall = $library->viewall_publication();
						foreach($viewall as $row => $value)
						{
							echo "<tr id='".$viewall[$row]['id']."'>";
							echo "<th>".$counter++."</th>";
							echo "<td>".$viewall[$row]['publication']."</td>";?>
							<td><i class='btn-xs fa fa-trash' onclick="deleteme('library','delete_publication','<?php echo $viewall[$row]['id'];?>')"></td>
							<?php echo "<tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php include('footer2.php');?>