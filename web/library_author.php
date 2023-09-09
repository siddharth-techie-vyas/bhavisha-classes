
<div class="card-header"><h4>Add Author(s) For Library Books</h4></div>


<div class="card-body">

	<div class="content">
		<div id="msgauthor"></div>
		
		<form name="author" id="author" action="<?php echo $base_url.'index.php?action=library&query=add_author';?>" method="post">
		<div class="col-sm-12">
			<div class="col-sm-3">
				<label>Author Name</label>
				<input type="text" class="form-control" name="author_name" value="">
			</div>
			
			<div class="col-sm-2"><br>
				<input onclick="form_submit('author')" type="button" name="submit" value="Save" class="btn btn-success btn-md">
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
						<th>Author Name</th>
						<th>Utility</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$counter=1;
						$viewall = $library->viewall_author();
						foreach($viewall as $row => $value)
						{
							echo "<tr id='".$viewall[$row]['id']."'>";
							echo "<th>".$counter++."</th>";
							echo "<td>".$viewall[$row]['author']."</td>";?>
							<td><i class='btn-xs fa fa-trash' onclick="deleteme('library','delete_author','<?php echo $viewall[$row]['id'];?>')"></td>
							<?php echo "<tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php include('footer2.php');?>