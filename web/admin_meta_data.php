<div class='card-header'>
                        <h4>Meta Data</h4>
</div>
<div class="content">
              <div class="card">
                <div class="card-body">

<div class="season_tabs">
    
  
  <?php $tabs = $admin->get_all_type_meta_type();
   $counter=1;
  foreach ($tabs as $key => $value) {
    $tab_name = str_replace("_", " " , $tabs[$key]['meta_name']);
  ?>

   <div class="season_tab">
       <input type="radio" id="<?php echo $tabs[$key]['meta_name'];?>" name="tab-group-1" checked>
       <label for="<?php echo $tabs[$key]['meta_name'];?>"><?php echo $tab_name;?></label>
       
       <div class="season_content">
        <h3><?php echo  $tab_name;?> Add / Edit</h3>
           <table class="table">
            <thead>
              <th>#</th>
              <th>Name</th>
              <th>Value</th>
              <th>Utility</th>
            </thead>
            
           <?php $meta_list = $admin->getonetype_meta_data($tabs[$key]['meta_name']);
                  $counter0=1;
                  foreach ($meta_list as $key => $value) {
            ?>
            <div id="msg<?php echo $meta_list[$key]['meta_value1'];?>"></div>
            <form name="<?php echo $meta_list[$key]['meta_value1'];?>form" method="post" action="<?php  echo $base_url.'index.php?action=admin&utility=edit_meta_data' ?>" id="<?php echo $meta_list[$key]['meta_value1'];?>id">
            <tr>
              <td><?php echo $counter0++;?>
                <input type="hidden" name="id[]" value="<?php echo $meta_list[$key]['id'];?>">
              </td>
              <td><input type="text"  class="form-control" value="<?php echo $meta_list[$key]['meta_value1'];?>" name="meta_value1[]" ></td>
              <td><input type="text"  class="form-control" value="<?php echo $meta_list[$key]['meta_value2'];?>" name="meta_value2[]" ></td>
              <td>
                <button type="button" name="edit"  class="btn btn-info" onclick="form_submit('<?php echo $meta_list[$key]['meta_value1'];?>id')"><i class="fa fa-pencil"></i></button>
                <button type="button" name="edit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
          </form>
          <?php }?>
          </tbody>
          </table>
       </div> 
   </div>
    
  <?php }?>
    
</div>


</div>
</div>
</div>
<script type="text/javascript">
  $( document ).ready(function() {
  $(".form-control").attr('disabled','disabled'); 
});
</script>
