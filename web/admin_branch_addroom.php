<?php $branch_details = $admin->get_branch_one($_GET['id']); 
$room= $admin->branch_getrooms($_GET['id']);
$counter=1;
?>
<div class="card-header"><h4>Create Rooms</h4></div>
<h4>Branch : <?php echo $branch_details[0]['branch_name']; ?></h4>


<div id="msgbranch_addroom"></div>
	<form name="branch" id="branch_room" method="post" action="<?php echo $base_url.'index.php?action=admin&utility=branch_addroom';?>">
		<input type="hidden" value="<?php echo $_GET['id'] ?>" name="branchid">

	<div class="card-body">
		<div class="col-sm-12">
			
			<div id="addmore"></div>
                                  <input type="button" name="btn"  class="btn btn-xs btn-info" value="Add Rooms & Seating" id="btn">

                                  <input type="button" name="save" onclick="form_submit('branch_room')" class="btn btn-xs btn-success" value="Create Rooms" id="btn">

		</div>
	</div>
	</form>
</div>

<table class="table">
	<thead>
		<tr>
			<th>S.No.</th>
			<th>Room #</th>
			<th>Total Seats</th>
			<th>Utility</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($room as $k => $value) {
			?>
		<tr id="<?php echo $room[$k]['id'];?>">
			<td><?php echo $counter++;?></td>
			<td><?php echo $room[$k]['room'];?></td>
			<td><?php echo $room[$k]['nu_seats'];?>
				<div class="col-sm-12">
				<div id='msgedit_room<?php echo $room[$k]['id'];?>'>	
				<form name="edit_room" id="edit_room<?php echo $room[$k]['id'];?>" action="<?php echo $base_url.'index.php?action=admin&query=edit_room'?>" method="post" style="display: none;">
					<input type="hidden" name="id" value="<?php echo $room[$k]['id'];?>">
					<div class="col-sm-7">
					<input type="number" class="form-control" name="nu_seats" value="<?php echo $room[$k]['nu_seats'];?>">
					</div>
					<div class="col-sm-3">
					<i class="fa fa-checked btn btn-sucess btn-info" onclick="form_submit('edit_room<?php echo $room[$k]['id'];?>')"></i>
					</div>
				</form>
				</div>
			</td>
			<td> <i class="fa fa-trash" onclick="deleteme('admin','delete_room','<?php echo $room[$k]['id'];?>')"></i> 
				<i class="fa fa-pencil" id="edit<?php echo $room[$k]['nu_id'];?>" onclick="show_edit('edit_room<?php echo $room[$k]['id'];?>')"></i>
				
			</td>
		</tr>
	<?php }?>
	</tbody>
</table>

<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore"); //Fields wrapper
var add_button      =  $("#btn"); //Add button ID
var x = 0; //initlal text box count

        
$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore'+x+'"  class="col-sm-12"><div class="col-sm-4">Room '+x+'</div><div class="col-sm-4"><label>Seats Available</label><input type="number" class="form-control" name="seats[]"></div><div class="col-sm-2"><input type="button" onclick=removeme("addmore_fill'+x+'") class="btn btn-xs btn-danger" value="X"></div></div>'); 

        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});


</script>	
		